<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 21.
 * Time: 21:36
 */

class ExampleModel extends Model {

	function example_query() {
		return $this->query("SELECT * FROM 4ch_users users");
	} // example_query
}