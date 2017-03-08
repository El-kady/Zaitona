<?php

namespace Core\Auth;

use Core\Service\Service;

class Session
{

    public function init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            return Service::getRequest()->XSSFilter($value);
        }
    }

    public function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

    public function destroy()
    {
        session_destroy();
    }
}
