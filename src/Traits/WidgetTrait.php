<?php

namespace Chevron\Widgets\Traits;

trait WidgetTrait {

	/**
	 * property to hold the data local to the widget, available via __get()
	 */
	private $internalDataMap = array();

	/**
	 * make your widget callable
	 */
	abstract function __invoke();

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	public function get($key){
		return isset($this->internalDataMap[$key]) ? $this->internalDataMap[$key] : null;
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	public function set($key, $value){
		$this->internalDataMap[$key] = $value;
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	public function setMany(array $internalDataMap){
		foreach($internalDataMap as $key => $value){
			$this->set($key, $value);
		}
	}

	/**
	 * A means to check if a particular data point is set
	 * @param string $name The key of the data to check
	 * @return bool
	 */
	public function __isset($name){
		return array_key_exists($name, $this->internalDataMap);
	}

}