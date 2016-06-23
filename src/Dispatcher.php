<?php

namespace Chevron\Widgets;
/**
 * dispatches Widgets based on a given source __DIR__
 * @package Chevron\Widgets
 */
class Dispatcher {
	/**
	 * The source dir
	 */
	protected $sourceDir;

	/**
	 * The source dir
	 */
	protected $type;

	/**
	 * Set the base directory from which to load Widgets
	 * @param string $dir The source dir
	 * @return
	 */
	function __construct($dir, $type = Widget::class){
		if( !is_dir($dir) ){
			throw new WidgetException(__CLASS__ . " requires a valid source directory.");
		}

		if( strpos($type, __NAMESPACE__) !== 0 ){
			throw new WidgetException("Wrong Namespace. Unknown widget type.");
		}

		if(!class_exists($type)){
			throw new WidgetException("Unknown widget type: {$type}.");
		}

		$this->type = $type;
		$this->sourceDir = trim($dir);
	}

	/**
	 * dispatcher method for Widgets
	 * @param string $file The file to load
	 * @param array $data The data to pass to the Widget
	 * @return Chevron\Widgets\Widget
	 */
	function __invoke($file, array $data = array()){
		$file = sprintf("%s/%s", rtrim($this->sourceDir, DIRECTORY_SEPARATOR), ltrim($file, DIRECTORY_SEPARATOR) );
		return new $this->type($file, $data);
	}

	/**
	 * external (non-magic) method for dispatching Widgets
	 * @param string $file The file to load
	 * @param array $data The data to pass to the Widget
	 * @return Chevron\Widgets\Widget
	 */
	function get($file, array $data = array()){
		return $this->__invoke($file, $data);
	}

}
