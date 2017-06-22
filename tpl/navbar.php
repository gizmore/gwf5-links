<?php
$navbar instanceof GWF_Navbar;

if ($navbar->isLeft())
{
	$navbar->addField(GDO_Link::make('links')->href(href('Links', 'Overview')));
}
