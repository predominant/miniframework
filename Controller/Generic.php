<?php
namespace Controller;

/**
 * Generic Controller
 *
 * All controllers should extend this controller to provide common functionality
 *
 * @package Controller
 * @author Graham Weldon
 */
class Generic {

/**
 * Array of input data
 *
 * @var array
 */
	protected $_data;

/**
 * Variables for access within the view
 *
 * @var string
 */
	public $viewVars = array();

/**
 * Model name to use
 *
 * @var string
 */
	public $name;

/**
 * Constructor
 *
 * Handles input filtering, and flow of control
 *
 * @param array $_data Input data
 * @author Graham Weldon
 */
	public function __construct($_data = array()) {
		$this->_setData($_data);
		$this->_constructModel();
	}

/**
 * Construct a model
 *
 * @return void
 * @author Graham Weldon
 */
	protected function _constructModel() {
		if ($this->name === false) {
			return;
		}
		if (empty($this->name)) {
			$class = array_reverse(explode('\\', get_class($this)));
			$class = array_shift($class);
			$this->name = $class;
		}
		$namespaced = '\\Model\\' . $class;
		$this->{$class} = new $namespaced();
	}

/**
 * Preprocess data, and assign to the current controller instance
 *
 * @param array $_data Potentially dirty user data
 * @return void
 * @author Graham Weldon
 */
	protected function _setData($_data) {
		$this->_data = $this->_sanitiseData($_data);
	}

/**
 * Cleanup input from user
 *
 * @param array $_data Potentially dirty user input
 * @return array Clean user input
 * @author Graham Weldon
 */	
	protected function _sanitiseData($_data) {
		foreach ($_data as $key => &$value) {
			$value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		return $_data;
	}

/**
 * Set an error message for display on the next page load
 *
 * @param string $message Message to display
 * @return void
 * @author Graham Weldon
 */	
	protected function _setError($message) {
		$_SESSION['_page_error'] = $message;
	}

/**
 * Set data for access on the view
 *
 * @param mixed $data Data to set on the view
 * @return void
 * @author Graham Weldon
 */
	public function set($key, $value = null) {
		if ($value === null) {
			if (is_array($key)) {
				foreach ($key as $k => $v) {
					$this->viewVars[$k] = $v;
				}
			}
		} else {
			$this->viewVars[$key] = $value;
		}
	}
}
