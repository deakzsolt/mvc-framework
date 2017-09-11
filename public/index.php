<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:51
 */

define('ROOT', dirname(dirname(__FILE__)));

if (is_file(ROOT.'/config/config.php')) {

	require_once (ROOT.'/config/config.php');

	define ('OS_PATH', ROOT.'/os/'.APPLICATION_VERSION);
	require_once (OS_PATH.'/system/init.php');


} else {

	require_once (ROOT.'/config/default_config.php');

	define ('OS_PATH', ROOT.'/os/'.APPLICATION_VERSION);
	require_once (ROOT.'/os/'.APPLICATION_VERSION.'/system/init.php');
} // if