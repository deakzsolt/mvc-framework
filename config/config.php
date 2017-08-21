<?php

const BASE_PATH = 'http://osiris.dev/public';
const LOCAL_PATH = '/Library/WebServer/Documents/osiris/';

const DB_HOST = '127.0.0.1';
const DB_NAME = 'devdashboard';
const DB_USER = 'root';
const DB_PASSWORD = 'dzs5274';
const TABLE_PREFIX = '4ch_';
const ADMIN_EMAIL = 'deakzolt@gmail.com';
const ASSETS_PATH = 'img/';
const IN_DEBUG_MODE = true;
//const MAINTENANCE_MESSAGE = true;

defined('CONFIG_PATH') or define('CONFIG_PATH', dirname(__FILE__));

require_once CONFIG_PATH . '/version.php';
require_once CONFIG_PATH . '/license.php';