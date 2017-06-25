<?php
final class GWF_Link extends GDO
{
	############
	### Tags ###
	############
	use GWF_TaggedObject;
	public function gdoTagTable() { return GWF_LinkTag::table(); }

	##############
	### Voteds ###
	##############
	use GWF_VotedObject;
	public function gdoVoteTable() { return GWF_LinkVote::table(); }
	public function gdoVoteMin() { return 1; }
	public function gdoVoteMax() { return 5; }
	public function gdoVotesBeforeOutcome() { return 1; }
	public function gdoVoteAllowed(GWF_User $user) { return $user->getLevel() >= $this->getLevel(); }
	
	###########
	### GDO ###
	###########
	public function gdoColumns()
	{
		return array(
			GDO_AutoInc::make('link_id'),
			GDO_LinkUrl::make('link_url'),
			GDO_LinkTitle::make('link_title'),
			GDO_Language::make('link_lang'),
			GDO_Message::make('link_description')->notNull()->min(3)->max(512)->label('description'),
			GDO_Level::make('link_level')->notNull()->unsigned()->initial('0'),
			GDO_Int::make('link_views')->notNull()->unsigned()->initial('0')->label('views'),
			GDO_VoteRating::make('link_rating'),
			GDO_VoteCount::make('link_votes'),
			GDO_DateTime::make('link_checked_at'),
			GDO_CreatedBy::make('link_created_by'),
			GDO_CreatedAt::make('link_created_at'),
			GDO_DeletedAt::make('link_deleted_at'),
		);
	}

	##############
	### Getter ###
	##############
	public function getID() { return $this->getVar('link_id'); }
	public function getURL() { return $this->getVar('link_url'); }
	public function getLevel() { return $this->getVar('link_level'); }
	
	############
	### HREF ###
	############
	public function href_visit() { return href('Links', 'Visit', '&id='.$this->getID()); }
}
