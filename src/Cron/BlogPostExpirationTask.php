<?php

namespace Logicbrush\BlogUtils\Cron;

use DateTime;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CronTask\Interfaces\CronTask;
use SilverStripe\ORM\FieldType\DBDatetime;

class BlogPostExpirationTask implements CronTask {

	/**
	 *
	 * @Metrics( crap = 2, uncovered = true )
	 */


	public function getSchedule() {
		return "*/2 * * * *";
	}


	/**
	 *
	 * @Metrics( crap = 2 )
	 */
	public function process() {
		$now = DBDatetime::now();
		$posts = BlogPost::get()->filter( [
				'ExpirationDate:LessThan' => $now,
			] );
		foreach ( $posts as $post ) {
			$post->doArchive();
		}
	}


}
