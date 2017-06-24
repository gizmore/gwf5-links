<?php
final class Links_Visit extends GWF_Method
{
	public function execute()
	{
		$link = GWF_Link::table()->find(Common::getRequestInt('id'));
		$user = GWF_User::current();
		$level = $link->getLevel();
		if ($level > $user->getLevel())
		{
			return $this->error('err_link_level', [$level]);
		}
		
		$link->increase('link_views');
		
		return GWF_Website::redirect($link->getURL());
	}
	
}