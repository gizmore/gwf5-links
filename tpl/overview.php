<?php
$user = GWF_User::current();

# Render Navtabs
echo Module_Links::instance()->renderTabs();

# Query
$gdo = GWF_Link::table();
$votes = $gdo->gdoVoteTable();
$query = $gdo->select('*')->join("LEFT JOIN {$votes->gdoTableIdentifier()} ON vote_object=link_id AND vote_user={$user->getID()}");

# Cloud
$cloud = GDO_TagCloud::make('cloud')->table($gdo);
$cloud->filterQuery($query);
echo $cloud->render();

# Table
$table = GDO_List::make();
$table->listMode(GDO_List::MODE_LIST);
$table->gdo($gdo);
$table->href(href('Links', 'Overview'));
$table->addFields($gdo->getGDOColumns(['link_id', 'link_title', 'link_views', 'link_url', 'link_votes', 'link_rating']));
$table->addField(GDO_VoteSelection::make('link_vote'));
$table->addField(GDO_Button::make('visit'));
$table->paginateDefault();
$table->filtered();
$table->ordered();
$table->query($query);
$table->label('list_title_links_overview', [sitename(), $table->countItems()]);
echo $table->render();
