<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 22.
 * Time: 21:54
 */

class InstallController extends Controller {

	function view() {
		$this->set('title','Installation');
		$this->set('style_path','/os/'.APPLICATION_VERSION.'/'.$this->_module.'/template/style/install.css');
		$this->set('error_report','');
	} // view
}