<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 21.
 * Time: 21:35
 */

class ExampleController extends Controller {

	function view() {
		$this->set('title','Example');

		$model = new ExampleModel();
//		$this->set('example_query',$model->example_query());
	} // view

	function show_some_db_data() {
		$model = new ExampleModel();

		$result = $model->example_query();
	} // show_some_db_data
}