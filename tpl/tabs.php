<?php
$tabs = GDO_Bar::make();
$tabs->addField(GDO_Link::make('links')->href(href('Links', 'Overview')));
$tabs->addField(GDO_Link::make('add')->href(href('Links', 'Add')));
echo $tabs->renderCell();
