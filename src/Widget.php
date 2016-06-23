<?php

namespace Chevron\Widgets;
/**
 * implements a widget
 *
 * @package Chevron\Widgets
 */
class Widget extends AbstractWidget {
	/**
	 * The file that the widget will load
	 */
	protected $file;

	/**
	 * Set the file and data map for the Widget
	 * @param string $file The file to render
	 * @param array $data An array of key to value to use in rendering the file
	 * @return object
	 */
	function __construct($file, array $data = array()){
		$this->setFile($file);

		if(!empty($data)){
			$this->setMany($data);
		}
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
	 * change the base layout
	 */
	protected function setFile($file){
		if( file_exists($file) ){
			$this->file = $file;
		}else{
			throw new WidgetException(__CLASS__ . " cannot render an empty file.");
		}
	}

}
