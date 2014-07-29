<?php

use \Chevron\Widgets\Widget;
use \Chevron\Widgets\Layout;

class LayoutTest extends PHPUnit_Framework_TestCase {

	function test_view(){
		$widget = new Widget(__DIR__."/exampleView.php");

		$layout = new Layout(__DIR__."/exampleLayout.php");

		$layout->setView($widget);

		$result = $layout->getView();

		$this->assertTrue(($result InstanceOf Widget));
	}

}



