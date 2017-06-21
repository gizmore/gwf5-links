<?php
final class GWF_Link extends GDO
{
	use GWF_TaggedObject;
	
	public function gdoColumns()
	{
		return array(
			GDO_AutoInc::make('link_id'),
			GDO_Url::make('link_url')->notNull(),
			GDO_DateTime::make('link_checked_at'),
			GDO_CreatedBy::make('link_created_by'),
			GDO_CreatedAt::make('link_created_at'),
		);
	}
}
