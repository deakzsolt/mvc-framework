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
	die('<p>WARNING: Application is missing the config.php file!</p><p>In future I might ad in autodeploy for the config file!</p>');
//	require_once (ROOT.'/config/install_config.php');
//	require_once (ROOT.'/os/'.APPLICATION_VERSION.'/system/bootstrap.php');
} // if