<?php

use \Chevron\Widgets\Dispatcher;

class DispatcherTest extends PHPUnit_Framework_TestCase {

	/**
	 * @expectedException \Chevron\Widgets\WidgetException
	 */
	function test___construct_exception(){

		$dispatcher = new Dispatcher(__DIR__ . "/NOTdir");

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

	function test_get(){

		$dispatcher = new Dispatcher(__DIR__);

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

}