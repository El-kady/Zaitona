<?php

namespace Modules\Frontend\Controllers;

use \Helpers\Service\Service;

class HomeController
{

    public function index()
    {
        foreach (Service::getDatabase()->fetchAll("SELECT * FROM `users` ") as $user) {
            echo $user['id']."<br>";
        }
        echo 'hello from frontend home';
    }

}
