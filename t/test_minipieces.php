<?php
require_once('../lib/minipieces.php');

class minipieceTest extends PHPUnit_Framework_TestCase {
	
	protected $template;

	protected function setUp() {
		$basefile = fopen('base.tpl', 'w');
		fwrite($basefile, 'Hello <?=$name?>, this is a simple template!');
		fclose($basefile);
		$this->template = new minipiece('base.tpl');
	}

	protected function tearDown() {
		unlink('base.tpl');
	}

	public function testCreation() {
		$this->assertTrue(is_object($this->template));
	}

	/* @depends testCreation */
	public function testSetVariable() {
		$this->template->set('name','Alex');
		$this->assertFalse($this->template->is_set('surname'));
		$this->assertTrue($this->template->is_set('name'));
	}

	/* @depends testCreation */
	public function testFailedCreation() {
		$message = FALSE;
		try {
			$template = new minipiece('false.tpl');
		} catch (Exception $e) { $message = $e->getMessage(); }
		$this->assertEquals($message, "Template false.tpl is unavailable.");
	}

	/* @depends testSetVariable */
	public function testRendering() {
		$this->template->set('name','Alex');
		$this->assertEquals($this->template->render(), "Hello Alex, this is a simple template!");
	}

	/* @depens testCreation
	 * @depends testSetVariable
	 * @depends testRendering
	 */

	public function testNestedTemplate() {
		$blockfile = fopen('block.tpl', 'w');
		fwrite($blockfile, '<?=$firstname?> <?=$surname?>');
		fclose($blockfile);
		$block = new minipiece('block.tpl');
		$block->set('firstname', 'John');
		$block->set('surname', 'Doe');
		$this->template->set('name', $block);
		$this->assertEquals($this->template->render(), "Hello John Doe, this is a simple template!");
		unlink('block.tpl');
	}
}
?>
