<?php

namespace Chevron\Widgets;
/**
 * implements a widget
 *
 * @package Chevron\Widgets
 */
class Widget implements WidgetInterface {
	/**
	 * The file that the widget will load
	 */
	protected $file;

	/**
	 * property to hold the data local to the widget, available via __get()
	 */
	protected $map  = array();

	/**
	 * Set the file and data map for the Widget
	 * @param string $file The file to render
	 * @param array $data An array of key to value to use in rendering the file
	 * @return object
	 */
	function __construct($file, array $data = array()){
		if( file_exists($file) ){
			$this->file = $file;
		}else{
			throw new WidgetException(__CLASS__ . " cannot render an empty file.");
		}

		if(!empty($data)){
			$this->setMany($data);
		}
	}

	/**
	 * A means to check if a particular data point is set
	 * @param string $name The key of the data to check
	 * @return bool
	 */
	function __isset($name){
		return array_key_exists($name, $this->map);
	}

	/**
	 * method to return the widget as a string ...
	 * @return string
	 */
	function __toString(){
		ob_start();
		$this->render();
		return ob_get_clean();
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function set($key, $value){
		$this->map[$key] = $value;
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function setMany(array $map){
		foreach($map as $key => $value){
			$this->set($key, $value);
		}
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function render(){
		return require($this->file);
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function __invoke(){
		return $this->render();
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function __get($key){
		return $this->get($key);
	}

	/**
	 * for docs, check \Chevron\Widgets\WidgetInterface
	 */
	function get($key){
		if(array_key_exists($key, $this->map)){
			return $this->map[$key];
		}
	}

}
