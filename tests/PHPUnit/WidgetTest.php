<?php

use \Chevron\Widgets\Widget;

class WidgetTest extends PHPUnit_Framework_TestCase {

	function test___construct(){
		$widget = new Widget(__DIR__."/exampleView.php");
		$this->assertTrue(($widget InstanceOf Widget));
	}

	function test___get(){
		$widget = new Widget(__DIR__."/exampleView.php", ["test" => "data"]);
		$this->assertEquals("data", $widget->test);
	}

	function test___isset(){
		$widget = new Widget(__DIR__."/exampleView.php", ["test" => "data"]);
		$this->assertTrue(isset($widget->test));
		$this->assertFalse(isset($widget->notThere));
	}

	function test_setMany(){
		$widget = new Widget(__DIR__."/exampleView.php");
		$widget->setMany(["test" => "data"]);
		$this->assertTrue(isset($widget->test));
		$this->assertFalse(isset($widget->notThere));
	}

	function test___invoke(){

		$expected = __DIR__."/exampleView.php";

		$widget = new Widget($expected);
		// "require" return true/false unless a value is returned (not echoed)

		ob_start();
		$widget();
		$result = ob_get_clean();

		$this->assertEquals($expected, $result);
	}

	function test___toString(){
		$widget = new Widget(__DIR__."/exampleView.php");
		$this->assertEquals(__DIR__."/exampleView.php", (string)$widget);
	}

}



