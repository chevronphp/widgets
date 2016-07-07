<?php

use \Chevron\Widgets\Dispatcher;

class DispatcherTest extends PHPUnit_Framework_TestCase {

	/**
	 * @expectedException \InvalidArgumentException
	 */
	function test___construct_exception(){

		$dispatcher = new Dispatcher(__DIR__ . "/NOTdir");

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

	function test_get(){

		$dispatcher = new Dispatcher(__DIR__, Chevron\Widgets\Widget::class);

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

	/**
	 * @expectedException \DomainException
	 */
	function test_get_exception(){

		$dispatcher = new Dispatcher(__DIR__, "Chevron\\Kernel\\Blah");

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

}
