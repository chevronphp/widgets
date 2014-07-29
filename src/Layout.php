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
	protected $view;

	/**
	 * assign a widget as the view to be injected
	 * @param Widget $view The view
	 */
	function setView( Widget $view ){
		$this->view = $view;
	}

	/**
	 * get the view, mostly for internal use
	 * @return Widget
	 */
	function getView(){
		return $this->view;
	}

}