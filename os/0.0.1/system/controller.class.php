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


	function __construct($module, $action, $model, $model_class_name, $controller) {

		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;

		$this->$model = new $model_class_name;

		$this->_template = new Template($controller, $module, $action);
	} // constructor

	/**
	 * Setup php variables what can be used in the view
	 *
	 * @param $name
	 * @param $value
	 */
	function set($name,$value) {
		$this->_template->set($name,$value);
	} // set

	/**
	 * TODO read abut the destructor
	 */
	function __destruct() {
		$this->_template->render();
	}
}