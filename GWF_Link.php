<?php
final class GWF_Link extends GDO
{
	use GWF_TaggedObject;
	
	public function gdoColumns()
	{
		return array(
			GDO_AutoInc::make('link_id'),
			GDO_Url::make('link_url')->notNull(),
			GDO_String::make('link_title')->notNull()->min(3)->max(128)->label('title'),
			GDO_Message::make('link_description')->notNull()->min(3)->max(512)->label('description'),
			GDO_Level::make('link_level')->notNull()->unsigned()->initial('0'),
			GDO_Int::make('link_views')->notNull()->unsigned()->initial('0'),
			GDO_DateTime::make('link_checked_at'),
			GDO_CreatedBy::make('link_created_by'),
			GDO_CreatedAt::make('link_created_at'),
		);
	}
}
