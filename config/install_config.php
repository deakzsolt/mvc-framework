<?php
/**
 * Installation/Upgrade Configuration Variables
 **/

if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['SERVER_PORT'] == 443) {
    $base_path = 'https://' . $_SERVER['HTTP_HOST'] . rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');
} else {
    $base_path = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');
} // if

define('BASE_PATH',$base_path);
const INSTALL_UPGRADE = true;
// const IN_DEBUG_MODE = true;
const ASSETS_PATH = 'img/';

defined('CONFIG_PATH') or define('CONFIG_PATH', dirname(__FILE__));

require_once CONFIG_PATH . '/version.php';
require_once CONFIG_PATH . '/license.php';