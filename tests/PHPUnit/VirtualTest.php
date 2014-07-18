<?php

use \Chevron\Widgets\Virtual;

class VirtualTest extends PHPUnit_Framework_TestCase {

	function test_render(){
		$widget = new Virtual(function(){
			return 999;
		});

		$expected = 999;
		$value = $widget->render();

		$this->assertEquals($expected, $value);
	}

	function test___toString(){
		$widget = new Virtual(function( $obj ){
			print($obj->placebo);
		}, ["placebo" => "effect"]);

		$expected = "effect";
		$value = (string)$widget;

		$this->assertEquals($expected, $value);
	}

}

