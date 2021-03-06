<?php
/**
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @file
 */

/** Tests for MediaWiki languages/classes/LanguageRo.php */
class LanguageRoTest extends LanguageClassesTestCase {
	/** @dataProvider providePlural */
	function testPlural( $result, $value ) {
		$forms = array( 'one', 'few', 'other' );
		$this->assertEquals( $result, $this->getLang()->convertPlural( $value, $forms ) );
	}

	/** @dataProvider providePlural */
	function testGetPluralRuleType( $result, $value ) {
		$this->assertEquals( $result, $this->getLang()->getPluralRuleType( $value ) );
	}

	public static function providePlural() {
		return array(
			array( 'few', 0 ),
			array( 'one', 1 ),
			array( 'few', 2 ),
			array( 'few', 19 ),
			array( 'other', 20 ),
			array( 'other', 99 ),
			array( 'other', 100 ),
			array( 'few', 101 ),
			array( 'few', 119 ),
			array( 'other', 120 ),
			array( 'other', 200 ),
			array( 'few', 201 ),
			array( 'few', 219 ),
			array( 'other', 220 ),
		);
	}
}
