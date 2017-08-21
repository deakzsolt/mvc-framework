<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 15:03
 */

/** Autoload any classes that are required **/
spl_autoload_register(function ($class) {
	require_once $class.'.class.php';
});

$start = new Router();
$start->init();