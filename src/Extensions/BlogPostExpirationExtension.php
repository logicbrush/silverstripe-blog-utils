<?php

namespace Logicbrush\BlogUtils\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Forms\DatetimeField;
use SilverStripe\Core\Extension;

/**
 *
 * @property BlogPost $owner
 */


class BlogPostExpirationExtension extends Extension {

	private static $db = [
		'ExpirationDate' => 'Datetime',
	];

	private static $indexes = [
		'ExpirationDate' => true,
	];

	/**
	 *
	 * @Metrics( crap = 2, uncovered = true )
	 */
	public function updateCMSFields( FieldList $fields ) {
		$expirationDate = DatetimeField::create( 'ExpirationDate', 'Expiration Date' );
		$fields->addFieldsToTab(
			'Root.PostOptions',
			[ $expirationDate ],
			'Categories'
		);
	}


}
