<?php
require_once('../lib/minipieces.php');

class minipieceTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		$file = fopen('base.tpl', 'w');
		fwrite($file, 'Hello <?=$name?>, this is a simple template!');
		fclose($file);
	}

	protected function tearDown() {
		unlink('base.tpl');
	}

	public function testFailedCreation() {
		$message = FALSE;
		try {
			$template = new minipiece('false.tpl');
		} catch (Exception $e) { $message = $e->getMessage(); }
		$this->assertEquals($message, "Template false.tpl is unavailable.");
	}

	public function testCreation() {
		$this->template = new minipiece('base.tpl');
		$this->assertTrue(is_object($this->template));
	}

}
?>
