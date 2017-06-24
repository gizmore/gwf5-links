<?php
final class Links_Cronjob extends GWF_MethodCronjob
{
	public function run()
	{
		$this->checkDeadLinks();
	}
	
	private function checkDeadLinks()
	{
		
	}
}
