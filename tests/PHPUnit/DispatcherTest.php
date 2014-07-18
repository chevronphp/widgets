<?php

use \Chevron\Widgets\Dispatcher;

class DispatcherTest extends PHPUnit_Framework_TestCase {

	function test_get(){

		$dispatcher = new Dispatcher(__DIR__);

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));

		$widget = $dispatcher->get("exampleView.php");
		$this->assertTrue(($widget InstanceOf \Chevron\Widgets\Widget));
	}

}