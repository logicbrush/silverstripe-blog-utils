<?php

namespace Logicbrush\BlogUtils\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Forms\DatetimeField;
use SilverStripe\ORM\DataExtension;

/**
 *
 * @property BlogPost $owner
 */


class BlogPostExpirationExtension extends DataExtension {

	private static $db = [
		'ExpirationDate' => 'Datetime',
	];

	private static $indexes = [
		'ExpirationDate' => true,
	];

	/**
	 *
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
