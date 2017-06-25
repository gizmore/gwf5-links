<?php
final class GWF_LinkVote extends GWF_VoteTable
{
	public function gdoVoteObjectTable() { return GWF_Link::table(); }
}
