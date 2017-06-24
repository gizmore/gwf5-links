<?php
final class Links_Add extends GWF_MethodForm
{
	public function isUserRequired() { return true; }
	
	/**
	 * @var GWF_Link
	 */
	private $table;
	
	public function init()
	{
		$this->table = GWF_Link::table();
	}
	
	public function createForm(GWF_Form $form)
	{
		$table = $this->table;
		$module = Module_Links::instance();

		$form->addField($table->gdoColumn('link_title'));
		$form->addField($table->gdoColumn('link_url'));
		if ($module->cfgDescriptions())
		{
			$form->addField($table->gdoColumn('link_description'));
		}
		if ($module->cfgLevels())
		{
			$form->addField($table->gdoColumn('link_level'));
		}
		$form->addField(GDO_Submit::make());
		$form->addField(GDO_AntiCSRF::make());
	}
	
	public function execute()
	{
		$response = Module_Links::instance()->renderTabs()->add($this->renderInfoBox());
		if ($allowed = Module_Links::instance()->cfgAllowed(GWF_User::current()))
		{
			$response->add(parent::execute());
		}
		return $response;
	}
	
	public function renderInfoBox()
	{
		return $this->templatePHP('add_info.php');
	}
	
	public function formValidated(GWF_Form $form)
	{
		$link = GWF_Link::blank()->setVars($form->values())->insert();
		
		return $this->message('msg_link_added')->add($this->execMethod('Overview'));
	}
}
