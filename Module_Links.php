<?php
final class Module_Links extends GWF_Module
{
	public function getClasses() { return ['GWF_Link', 'GWF_LinkTag']; }
	public function onLoadLanguage() { return $this->loadLanguage('lang/links'); }
	#################
	### Templates ###
	#################
	public function renderTabs()
	{
		return $this->templatePHP('tabs.php');
	}
	
	public function onRenderFor(GWF_Navbar $navbar)
	{
		return $this->templatePHP('navbar.php', ['navbar'=>$navbar]);
	}
}
