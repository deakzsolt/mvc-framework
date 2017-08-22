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

	/**
	 * Store Users Session key
	 *
	 * @var
	 */
	protected $_session_key;

	function __construct() {
		if (defined('DB_HOST')) {
			$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		} // if
	}

	function __destruct() { }
}