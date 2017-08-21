<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:54
 */

class Template {

	/**
	 * Store variables in this case it is from set function
	 *
	 * @var array
	 */
	protected $variables = array();


	/**
	 * Set module name what is the folder name
	 *
	 * @var
	 */
	protected $_module;


	/**
	 * Set action if not will use default as view
	 *
	 * @var
	 */
	protected $_action;


	/**
	 * Store Controller
	 *
	 * @var
	 */
	protected $_controller;


	function __construct($controller, $module, $action) {
		$this->_module = $module;
		$this->_action = $action;
		$this->_controller = $controller;
	} // constructor

	/**
	 * Set php variables for view usage
	 *
	 * @param $name
	 * @param $value
	 */
	function set($name,$value) {
		$this->variables[$name] = $value;
	} // set

	/**
	 * Display Template
	 *
	 **/
	function render() {

		extract($this->variables);
		define ('DS', DIRECTORY_SEPARATOR);

//		TODO check is the controller needed here
		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_controller.DS.'header.php')) {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_controller.DS.'header.php');
		} else {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.'header.php');
		} // if

		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_action.'.php')){
			require_once(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_action.'.php');
		} else {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.'view.php');
		} // if

//		TODO check is the controller needed here
		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_controller.DS.'footer.php')) {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_controller.DS.'footer.php');
		} else {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.'footer.php');
		} // if
	} // render
}