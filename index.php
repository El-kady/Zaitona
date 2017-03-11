<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('PATH_APP', ROOT . 'application' . DS);

require PATH_APP . 'autoload.php';

$autoload = new Autoload();
$autoload->register();

use Bootstrap\App;

$app = new App();

