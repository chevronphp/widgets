<?php

namespace Chevron\Widgets;

abstract class AbstractWidget {

	/**
	 * property to hold the data local to the widget, available via __get()
	 */
	private $internalDataMap = array();

	abstract function __invoke();

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function get($key){
		return isset($this->internalDataMap[$key]) ? $this->internalDataMap[$key] : null;
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function set($key, $value){
		$this->internalDataMap[$key] = $value;
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function setMany(array $internalDataMap){
		foreach($internalDataMap as $key => $value){
			$this->set($key, $value);
		}
	}

	/**
	 * A means to check if a particular data point is set
	 * @param string $name The key of the data to check
	 * @return bool
	 */
	function __isset($name){
		return array_key_exists($name, $this->internalDataMap);
	}

}