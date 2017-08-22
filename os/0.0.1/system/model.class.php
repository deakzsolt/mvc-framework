<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 14:20
 */

class Model extends Database {

	/**
	 * Stores Model class
	 *
	 * @var string
	 */
	protected $_model;

	function __construct() {
		if (defined('DB_HOST')) {
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
		} // if
	}

	function __destruct() {
	}
}