<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

ini_set('session.cookie_httponly', 1);

$isSecureRequest = ((isset ($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') || $_SERVER['SERVER_PORT'] == 443);
$url_scheme=  $isSecureRequest ? 'https://' : 'http://';

$config = array(
    'URL' => $url_scheme . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']),

    'DB_TYPE' => 'mysql',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',

    'PATH_ROOT' => ROOT,
    'PATH_UPLOADS' => ROOT . 'uploads' . DS
);

if ($_SERVER["HTTP_HOST"] == "localhost") {
    $config["DB_HOST"] = "localhost";
    $config["DB_NAME"] = "zaitona";
    $config["DB_USER"] = "zaitona";
    $config["DB_PASS"] = "12345";
}else{
    $config["DB_HOST"] = "us-cdbr-iron-east-03.cleardb.net";
    $config["DB_NAME"] = "heroku_6f7f0b423011b15";
    $config["DB_USER"] = "b10794dc0f9543";
    $config["DB_PASS"] = "9838df15";

}

return $config;

