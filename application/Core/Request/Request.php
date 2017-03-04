<?php
namespace Core\Request;

class Request
{

    public function post($key, $clean = false)
    {
        if (isset($_POST[$key])) {
            return ($clean) ? trim(strip_tags($_POST[$key])) : $_POST[$key];
        }
    }

    public function postCheckbox($key)
    {
        return isset($_POST[$key]) ? 1 : NULL;
    }

    public function get($key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
    }

    public function cookie($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
    }

    public function XSSFilter(&$value)
    {
        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return $value;
    }

}
