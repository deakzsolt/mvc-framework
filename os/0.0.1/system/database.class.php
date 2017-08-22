<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:35
 */

defined('DB_CHARSET') or define('DB_CHARSET', 'utf8');

/*
* Mysql database class - only one connection allowed
*/
class Database {

	/**
	 * Open link to the database
	 *
	 * @var MySQLi
	 */
	protected $link;


	/**
	 * Return the mysqli result
	 *
	 * @var _result
	 */
	protected $_result;


	/**
	 * Connects to database
	 **/
	function connect($address, $account, $pwd, $name) {

		$this->link = new MySQLi($address, $account, $pwd, $name);

		if($this->link->connect_errno) {
			throw new Exception('Failed to select database. Reason: ' . $this->link->connect_error);
		} // if

		$this->link->set_charset(DB_CHARSET);

	} // function connect


	/**
	 * Escapes parameters before sending SQL query
	 *
	 * @param $data
	 * @return string
	 */
	public function sanitise($data) {
		$data = $this->link->real_escape_string($data);
		return $data;
	} // sanitise

	/**
	 * Escapes parameters in array before sending SQL query
	 *
	 * @param $data
	 * @return mixed
	 */
	public function sanitise_array($data) {
		foreach($data as $key => $value) {
			$data[$key] = $this->link->real_escape_string($value);
		} // foreach
		return $data;
	} // sanitise_array

	/**
	 * Custom SQL Query
	 *
	 **/
	function query($query,$limit=0) {
		$this->_result = $this->link->query($query);
		self::disconnect();
		return $this->_result;
	} // function query

	/**
	 * Disconnects from database
	 **/
	function disconnect() {
		if($this->link instanceof MySQLi) {
			$this->link->close();
		} // if
	} // function disconnect

	/**
	 * @param $query
	 *
	 * @return bool
	 * @throws Exception
	 */
	function createTable($query) {
		$this->_result = mysqli_query($this->link,$query);
		if ($this->_result) {
			return true;
		} else {
			throw new Exception("MySQLi error $this->error <br> Query:<br> $query", $this->errno);
		} // if
	} // createTable


	/**
	 * Get number of rows
	 *
	 * @return int
	 */
//	function getNumRows() {
//		return mysqli_num_rows($this->_result);
//	}


	/**
	 * Free resources allocated by a query
	 **/
//	function freeResult() {
//		mysqli_free_result($this->_result);
//	}


	/**
	 * Magic method clone is empty to prevent duplication of connection
	 */
//	private function __clone() { }

}