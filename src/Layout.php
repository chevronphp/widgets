<?php

namespace Chevron\Widgets;
/**
 * adds a little spice to the widget to make it more friendly to a template/layout/view
 * system
 *
 * @package Chevron\Widgets
 */
class Layout extends Widget {

	/**
	 * set the view to inject into the layout
	 */
	protected $__view;

	/**
	 * assign a widget as the view to be injected
	 * @param Widget $view The view
	 */
	function setView( callable $view ){
		$this->__view = $view;
	}

	/**
	 * get the view, mostly for internal use
	 * @return Widget
	 */
	function getView(){
		return $this->__view;
	}

	/**
	 * change the base layout
	 */
	function setLayout($file){
		$this->setFile($file);
	}

}
