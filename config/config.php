<?php

const BASE_PATH = 'http://osiris.dev/public';
const LOCAL_PATH = '/Library/WebServer/Documents/osiris/';

const DB_HOST = 'localhost';
const DB_NAME = 'db_name';
const DB_USER = 'db_user';
const DB_PASSWORD = 'db_pass';
const TABLE_PREFIX = 'table_prefix';
const ADMIN_EMAIL = 'admin@email.com';
const ASSETS_PATH = 'img/';
const IN_DEBUG_MODE = true;
//const MAINTENANCE_MESSAGE = true;

defined('CONFIG_PATH') or define('CONFIG_PATH', dirname(__FILE__));

require_once CONFIG_PATH . '/version.php';
require_once CONFIG_PATH . '/license.php';