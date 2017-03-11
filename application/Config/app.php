<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

ini_set('session.cookie_httponly', 1);

return array(
    'URL' => 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']),

    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'zaitona',
    'DB_USER' => 'zaitona',
    'DB_PASS' => '12345',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',

    'PATH_ROOT' => ROOT,
    'PATH_UPLOADS' => ROOT . 'uploads' . DS
);
