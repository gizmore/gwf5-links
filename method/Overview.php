<?php
final class Links_Overview extends GWF_MethodQueryTable
{
	public function getGDO()
	{
		return GWF_Link::table();
	}
	
	public function getHeaders()
	{
		$table = $this->getGDO();
		return array(
			GDO_Count::make(),
			$table->gdoColumn('link_url'),
			GDO_Button::make('visit'),
		);
	}
	
	public function execute()
	{
		return Module_Links::instance()->renderTabs()->add(parent::execute());
	}
}