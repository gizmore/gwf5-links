<?php $link instanceof GWF_Link; $user = GWF_User::current(); $creator = $link->getCreator(); ?>
<?php
$username = $creator->displayNameLabel();
$date = $link->getCreated();
$age = GWF_Time::displayAge($date);
$views = $link->getViews();
$votes = $link->getVoteCount();
$rating = $link->getVoteRating();

?>
<md-list-item class="md-3-line">
  <div class="md-list-item-text" layout="column">
    <h3><?= GWF_HTML::anchor(href('Links', 'Visit', '&id='.$link->getID()), htmle($link->getTitle())); ?></h3>
    <h4><?= t('li_link2', [$username, $age]); ?></h4>
    <span layout="row" flex layout-align="space-around center"><?= t('li_link3', [$link->gdoColumn('link_votes')->renderCell(), GDO_VoteSelection::make()->gdo($link)->renderCell(), $link->gdoColumn('link_rating')->renderCell()]) ?></span>
  </div>

  <?= GDO_Icon::iconS('arrow_right'); ?>
      
</md-list-item>
