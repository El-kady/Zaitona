<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

require APP . 'Config/Database.php';
require APP . 'autoload.php';

$autoload = new Autoload();
$autoload->register();

use Zaitona\Bootstrap\App;

$app = new App();

