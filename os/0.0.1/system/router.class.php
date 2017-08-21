<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:46
 */

class Router {


	/**
	 * Store action from the url if not set then it is default view
	 *
	 * @var
	 */
	private $action;


	/**
	 * Set module name what is the folder name
	 *
	 * @var
	 */
	private $module;


	/**
	 * Model is for the mysqli database connection
	 *
	 * @var string
	 */
	private $model;


	/**
	 * Set Module class name
	 *
	 * @var string
	 */
	private $model_class_name;


	/**
	 * Set controller
	 *
	 * @var string
	 */
	private $controller;


	/**
	 * Set Controller class name
	 *
	 * @var string
	 */
	private $controller_class_name;


	function __construct() {

		$_module = 'example';
		$_action = 'view';

		if (isset($_GET['url'])) {
			$get_url = explode('/',$_GET['url']);

			$_module = $get_url[0];
			$_action = $get_url[1];
		} // if

		$this->module = $_module;
		$this->action = $_action;

		$this->model = $_module.'.model';
		$this->model_class_name = ucfirst($_module).'Model';

		$this->controller = $_module.'.controller';
		$this->controller_class_name = ucfirst($_module).'Controller';

	} // constructor


	/**
	 * Check if environment is development and display errors
	 *
	 * set custom path for the logs to easy access them
	 */
	function setReporting() {
		defined('IN_DEBUG_MODE') or define('IN_DEBUG_MODE', false);
		if (IN_DEBUG_MODE == true) {
			error_reporting(E_ALL);
			ini_set('display_errors','On');
			ini_set('log_errors', 'On');
			ini_set('error_log', ROOT.'/logs/error-log.txt');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
		} // if
	} // setReporting

	/**
	 * Check for Magic Quotes and remove them
	 *
	 * @param $value
	 * @return array|string
	 */
	function stripSlashesDeep($value) {
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	} // stripSlashesDeep

	function removeMagicQuotes() {
		if ( get_magic_quotes_gpc() ) {
			$_GET    = self::stripSlashesDeep($_GET   );
			$_POST   = self::stripSlashesDeep($_POST  );
			$_COOKIE = self::stripSlashesDeep($_COOKIE);
		} // if
	} // removeMagicQuotes

	/**
	 * Check register globals and remove them
	 **/
	function unregisterGlobals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					} // if
				} // foreach
			} // foreach
		} // if
	} // unregisterGlobals

	/**
	 * Include Module Controller and Model
	 */
	function module_includes() {
		require_once OS_PATH.DIRECTORY_SEPARATOR.$this->module.'/controllers/'.$this->controller.'.php';
		require_once OS_PATH.DIRECTORY_SEPARATOR.$this->module.'/models/'.$this->model.'.php';
	} // module_includes

	function init() {
		self::setReporting();
		self::removeMagicQuotes();
		self::unregisterGlobals();
		self::module_includes();

//		TODO double check this part will work properly in future
		$dispatch = new $this->controller_class_name($this->module,$this->action,$this->model,$this->model_class_name,$this->controller);
		$queryString = array($this->module.$this->action);

		if (method_exists($this->controller_class_name, $this->action)) {
			call_user_func_array(array($dispatch,$this->action),$queryString);
		} // if
	} // init

}
