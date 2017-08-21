<?php
/**
 * Created by PhpStorm.
 * User: deakzsolt
 * Date: 2017. 08. 20.
 * Time: 13:48
 */
/**
 * Make sure that all requests are routed through /public/index.php
 */

header('HTTP/1.1 302 Found');
if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['SERVER_PORT'] == 443) {
	header('Location: https://' . $_SERVER['HTTP_HOST'] . rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/') . '/public/index.php');
} else {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/') . '/public/index.php');
} // if