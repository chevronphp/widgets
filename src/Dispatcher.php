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
	 * Set the base directory from which to load Widgets
	 * @param string $dir The source dir
	 * @return
	 */
	function __construct($dir){
		if( !is_dir($dir) ){
			throw new Exceptions\WidgetException(__CLASS__ . " requires a valid source directory.");
		}

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
		return new Widget($file, $data);
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
