<?php

namespace Chevron\Widgets\Interfaces;
/**
 * interface for widgets -- being a way to include files with scoped data
 *
 * useful for HTML and templating
 *
 * @package Chevron\Widgets
 */
interface WidgetInterface {

	/**
	 * Method to set a single value in the registry
	 * @param scalar $key The key at which to store the value
	 * @param mixed $value The value to store
	 * @return
	 */
	function set($key, $value);

	/**
	 * Method to set many values in the registry
	 * @param array $map The map of key => values
	 * @return
	 */
	function setMany(array $data);

	/**
	 * Require, and thus render, a file
	 */
	function render();

	/**
	 * Method to make this class callable
	 * @return
	 */
	function __invoke();

	/**
	 * Get the value stored at $key
	 * @param string $key The key of the value to get
	 * @return mixed
	 */
	function __get($key);

}