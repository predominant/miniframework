<?php
/**
 * View rendering class
 *
 * @author Graham Weldon
 */
class View {

	protected $_controller;

/**
 * Constructor
 *
 * Optionally passed a controller, so the view can access variables on the controller
 *
 * @param \Controller\Generic $controller Controller
 * @author Graham Weldon
 */
	public function __construct(\Controller\Generic $controller = null) {
		$this->_controller = $controller;
	}

/**
 * Render an element
 *
 * @param string $name Element name
 * @return void
 * @author Graham Weldon
 */
	public function element($name, $vars = array()) {
		$this->_render(BASEPATH . '/views/elements/', $name, $vars);
	}

/**
 * Render a view
 *
 * @param string $name View name
 * @return void
 * @author Graham Weldon
 */
	public function render($name, $vars = array()) {
		$this->_render(BASEPATH . '/views/', $name, $vars);
	}

/**
 * Worker method to simplify view and element rendering
 *
 * @param string $base Base Path
 * @param string $name View or Element name
 * @param string $vars Variables to include
 * @return void
 * @author Graham Weldon
 */
	protected function _render($base, $name, $vars) {
		if (isset($this->_controller)) {
			extract($this->_controller->viewVars);
		}
		extract($vars);
		include $base . $name . '.php';
	}
}
