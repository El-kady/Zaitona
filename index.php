<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('APP', ROOT . 'application' . DS);

require APP . 'Config/app.php';
require APP . 'autoload.php';

$autoload = new Autoload();
$autoload->register();

use Bootstrap\App;

$app = new App();

