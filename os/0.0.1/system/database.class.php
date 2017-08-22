<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:35
 */

/*
* Mysql database class - only one connection alowed
*/
class Database {

	/**
	 * MySqli connection
	 *
	 * @var mysqli
	 */
	private $_connection;


	/**
	 * Creates only single connection
	 *
	 * @var
	 */
	private static $_instance;

	/**
	 * Get an instance of the Database
	 *
	 * @return Database
	 */
	public static function getInstance() {
		// If no instance then make one
		if(!self::$_instance) {
			self::$_instance = new self();
		} // if
		return self::$_instance;
	} // getInstance

	private function __construct() {
		$this->_connection = new mysqli(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME);

		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to to MySQL: " . mysqli_connect_error(),
				E_USER_ERROR);
		} // if
	} // constructor

	/**
	 * Magic method clone is empty to prevent duplication of connection
	 */
	private function __clone() { }

	/**
	 * Return MySqli connection
	 *
	 * @return mysqli
	 */
	public function getConnection() {
		return $this->_connection;
	} // getConnection
}