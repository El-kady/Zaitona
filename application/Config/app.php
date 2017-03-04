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
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'zaitona',
    'DB_USER' => 'root',
    'DB_PASS' => '123456',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',

    'ENCRYPTION_KEY' => '6#x0gÊìf^25cL1f$08&',
    'HMAC_SALT' => '8qk9c^4L6d#15tM8z7n0%',
);
