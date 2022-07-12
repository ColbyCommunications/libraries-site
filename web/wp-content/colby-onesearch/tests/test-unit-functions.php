<?php
/**
 * Class FunctionsTest
 *
 * @package colby-onesearch
 */

/**
 * Test the functions in functions.php
 */
class FunctionsTest extends PHPUnit_Framework_TestCase {

	/**
	 * onesearch_ends_with( $haystack, $needle )
	 * returns null if either is not a string, or else bool
	 */
	function test_onesearch_ends_with() {
		$this->assertTrue( onesearch_ends_with( 'dynamite', 'dynamite' ) );
		$this->assertTrue( onesearch_ends_with( 'dynamite', 'ite' ) );
		$this->assertTrue( onesearch_ends_with( 'dynamite', 'e' ) );
		$this->assertTrue( onesearch_ends_with( '0000', '0' ) );
		$this->assertTrue( onesearch_ends_with( '987654321', '321' ) );
		$this->assertTrue( onesearch_ends_with( '\'dynamite\'', '\'' ) );
		$this->assertFalse( onesearch_ends_with( 'dynamite', 'e ' ) );
		$this->assertFalse( onesearch_ends_with( 'dynamite', ' e' ) );
		$this->assertFalse( onesearch_ends_with( 'dynamite', 'E' ) );
		$this->assertFalse( onesearch_ends_with( 'dynamite', '' ) );
		$this->assertNull( onesearch_ends_with( 'dynamite', 0 ) );
		$this->assertNull( onesearch_ends_with( 0, 'te' ) );
	}

	/**
	 * onesearch_no_punctuation_list( $string, $filter = true )
	 * returns an array of the words in the string; $filter causes stopwords to be filtered out
	 */
	function test_onesearch_no_punctuation_list() {
		$this->assertEquals( [], onesearch_no_punctuation_list( '' ) );
		$this->assertEquals( [], onesearch_no_punctuation_list( '', false ) );
		$this->assertEquals( [], onesearch_no_punctuation_list( '!$*!@)$!@)@!%*.<>?/}' ) );
		$this->assertEquals( [], onesearch_no_punctuation_list( '!$*!@)$!@)@!%*.<>?/}', false ) );
		$this->assertEquals( ['lord', 'rings'], onesearch_no_punctuation_list( 'the lord of the rings' ) );
		$this->assertEquals( ['the', 'lord', 'of', 'the', 'rings'],
			onesearch_no_punctuation_list( 'the lord of the rings', false ) );
		$this->assertEquals( ['lilacs', 'last', 'dooryard', 'bloom', 'd'], 
			onesearch_no_punctuation_list( 'When Lilacs Last in the Dooryard Bloom\'d') );
		$this->assertEquals( ['when', 'lilacs', 'last', 'in', 'the', 'dooryard', 'bloom', 'd'], 
			onesearch_no_punctuation_list( 'When Lilacs, Last in: the dooryard Bloom\'d!', false) );
	}

	/**
	 * onesearch_string_match( $string1, $string2 )
	 * return an int
	 */
	function test_onesearch_string_match() {
		$this->assertEquals( 0, onesearch_string_match( 'the lord of the rings', 'game of thrones' ) );
		$this->assertEquals( onesearch_string_match( 'game of thrones', 'game of throne' ),
			onesearch_string_match( 'game of throne', 'game of thrones' ) );
		$this->assertGreaterThan( 2, onesearch_string_match( 'the lord of the rings', 'the ring' ) );
		$this->assertGreaterThan( 10, onesearch_string_match( 'game of thrones', 'game of thrones' ) );
		$this->assertGreaterThan( 5, onesearch_string_match( 'game of thrones', 'game of throne' ) );
		$this->assertGreaterThan( 5, onesearch_string_match( 'game of thrones', 'game throne' ) );
	}

	/**
	 * onesearch_trim_suffixes( $array )
	 */
	function test_onesearch_trim_suffixes() {
		$this->assertEquals( [], onesearch_trim_suffixes( '' ) );
		$this->assertEquals( [], onesearch_trim_suffixes( [] ) );
		$this->assertEquals( ['dog'], onesearch_trim_suffixes( 'dogged' ) ) ;
		$this->assertEquals( ['dog'], onesearch_trim_suffixes( ['dogging'] ) ) ;
		$this->assertEquals( ['dog', 'but'], onesearch_trim_suffixes( ['dogger', 'butter'] ) ) ;
		$this->assertEquals( ['dot', 'hour'], onesearch_trim_suffixes( ['dots', 'hourly'] ) ) ;
	}
}

