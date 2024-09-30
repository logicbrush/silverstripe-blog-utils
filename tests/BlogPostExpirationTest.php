<?php

namespace Logicbrush\BlogUtils\Tests;

use SilverStripe\Dev\FunctionalTest;
use Logicbrush\BlogUtils\Cron\BlogPostExpirationTask;
use SilverStripe\Blog\Model\BlogPost;

class BlogPostExpirationTest extends FunctionalTest {

	protected $usesDatabase = true;

	public function setUp() : void {
		parent::setUp();
		$this->cron = new BlogPostExpirationTask();
	}

	public function testArchivingOfExpiredBlogPosts() {
		
		$post = BlogPost::create([
			'Title' => 'Test Post #1',
			'ExpirationDate' => '2001-01-01', // expired.
		]);
		$post->write();
		$post->publishSingle();
		$this->cron->process();

		$post->refresh();

	}

}
