<?php $link instanceof GWF_Link;
$user = GWF_User::current();
$level = $link->getLevel();
if ($level > $user->getLevel())
{
	l('title_link_level', [$level]);
}
else
{
	$link->edisplay('link_title');
}
