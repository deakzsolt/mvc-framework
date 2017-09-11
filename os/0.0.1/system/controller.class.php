<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:48
 */

class Controller {

	/**
	 * Set action if not will use default as view
	 *
	 * @var
	 */
	protected $_action;


	/**
	 * Setup model with Database connection
	 *
	 * @var
	 */
	protected $_model;


	/**
	 * Set module name what is the folder name
	 *
	 * @var
	 */
	protected $_module;


	/**
	 * Set Controller
	 *
	 * @var
	 */
	protected $_controller;

	/**
	 * Set template
	 *
	 * @var Template
	 */
	protected $_template;

	protected $variables = array();


	function __construct($module, $action, $model, $model_class_name, $controller) {

		$this->_controller = $controller;
		$this->_action = $action;
		$this->_module = $module;
		$this->_model = $model;

		$this->$model = new $model_class_name;

		$this->_template = new Template($controller, $module, $action);
	} // constructor

	/**
	 * Setup php variables what can be used in the header/view/footer
	 *
	 * @param $name
	 * @param $value
	 */
	function set($name,$value) {
		$this->variables[$name] = $value;
	} // set

	/**
	 * Show the collected data as render
	 *
	 * transfer the variables to the render function
	 */
	function __destruct() {
		echo $this->_template->render($this->variables);
	} // destructor
}