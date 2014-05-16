<?php

require_once "vendor/autoload.php";

use \Chevron\Widgets\Dispatcher;

FUnit::test("Dispatcher::get()", function(){

	$dispatcher = new Dispatcher(__DIR__);

	$widget = $dispatcher->get("exampleView.php");
	FUnit::ok(($widget InstanceOf \Chevron\Widgets\Widget));

	$widget = $dispatcher->get("exampleView.php");
	FUnit::ok(($widget InstanceOf \Chevron\Widgets\Widget));
});