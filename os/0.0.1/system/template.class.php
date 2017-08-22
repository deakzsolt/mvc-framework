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
	 * Replaces php variables in header/view/footer
	 *
	 * @param $file
	 * @param null $var
	 * @return mixed|string
	 */
	function load_template($file,$var=null) {
		$template_content = file_get_contents($file);
		$match = '/\{([$a-zA-Z0-9_]+)\}/';

		foreach($var as $variable => $content) {
			$template_content = str_replace('{'.$variable.'}', $content, $template_content);
		} // foreach

		if ($var == null) {
			if (preg_match($match, $template_content)) {
				$template_content = preg_replace($match, '', $template_content);
			} // if
		} // if

		return $template_content;
	} // load_template

	/**
	 * Include the template files and send trough the variables
	 *
	 * @param $var
	 */
	function render($var) {

		define ('DS', DIRECTORY_SEPARATOR);
		$data = '';

		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.'header.php')) {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.'header.php');
		} else {
			$file = OS_PATH.DS.$this->_module.DS.'template'.DS.'header.html';
			$data .= self::load_template($file,$var);
		} // if

		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_action.'.php')){
			require_once(OS_PATH.DS.$this->_module.DS.'template'.DS.$this->_action.'.php');
		} else {
			$file = OS_PATH.DS.$this->_module.DS.'template'.DS.'view.html';
			$data .= self::load_template($file,$var);
		} // if


		if (file_exists(OS_PATH.DS.$this->_module.DS.'template'.DS.'footer.php')) {
			require_once (OS_PATH.DS.$this->_module.DS.'template'.DS.'footer.php');
		} else {
			$file = OS_PATH.DS.$this->_module.DS.'template'.DS.'footer.html';
			$data .= self::load_template($file,$var);
		} // if

		return $data;
	} // render
}