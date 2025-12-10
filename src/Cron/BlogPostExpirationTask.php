<?php

namespace Logicbrush\BlogUtils\Cron;

use Override;
use DateTime;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CronTask\Interfaces\CronTask;
use SilverStripe\ORM\FieldType\DBDatetime;

class BlogPostExpirationTask implements CronTask {

	/**
	 *
	 * @Metrics( crap = 2, uncovered = true )
	 */


	#[Override]

/**
 *
 */
public function getSchedule() {
	return "*/2 * * * *";
}


/**
 *
 * @Metrics( crap = 2 )
 */
#[Override]

/**
 *
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
