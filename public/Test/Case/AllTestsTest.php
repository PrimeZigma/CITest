
<?php
class AllTestsTest extends CakeTestSuite {
/**
* Suite
*
*
**/
	public static function suite(){
		$suite = new CakeTestSuite ('All tests');
		$suite->addTestDirectoryRecursive(TESTS . 'Case');
		return $suite;
	}
}
