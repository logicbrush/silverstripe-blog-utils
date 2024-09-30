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
		error_log( "Running " . self::class . "." );
		$now = DBDatetime::now();
		$posts = BlogPost::get()->filter( [
				'ExpirationDate:LessThan' => $now,
			] );
		foreach ($posts as $post ) {
			error_log( " - Archiving Post {$post->ID}." );
			$post->doArchive();
		}
		error_log( "Done." );

	}


}
