<?php
/**
 * Class [library-search] shortcode.
 *
 * @package colby-libraries
 */

namespace Colby_Libraries\Shortcodes;

class Library_Search {
	public $shortcode = 'librarysearch';

	public function run( $atts ) {
		ob_start();
		$this->draw();
		return ob_get_clean();
	}

	private function draw() {
		global $colby_libraries;
		include "{$colby_libraries->path}templates/library-search.php";
	}
}
