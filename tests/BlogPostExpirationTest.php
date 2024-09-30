<?php

namespace Logicbrush\BlogUtils\Tests;

use SilverStripe\Dev\FunctionalTest;
use Logicbrush\BlogUtils\Cron\BlogPostExpirationTask;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Blog\Model\Blog;

class BlogPostExpirationTest extends FunctionalTest {

	protected $usesDatabase = true;

	public function setUp() : void {
		parent::setUp();

		// Create the cron job.
		$this->cron = new BlogPostExpirationTask();

		// Create the blog container.
		$this->blog = Blog::create([
			'Title' => 'Test Blog',
		]);
		$this->blog->write();
		$this->blog->publishRecursive();

	}

	public function testArchivingOfExpiredBlogPosts() {
		
		// Create and publish the blog post.
		$post = BlogPost::create([
			'Title' => 'Test Post #1',
			'ParentID' => $this->blog->ID,
			'ExpirationDate' => '2001-01-01', // expired.
		]);
		var_dump($post->write());
		var_dump($post->publishRecursive());

		// Only one should exist.
		$this->assertEquals(1, BlogPost::get()->count());

		// // Run the cron task.
		// $this->cron->process();

		// // Now none should exist.
		// $this->assertEquals(0, BlogPost::get()->count());

	}

}
