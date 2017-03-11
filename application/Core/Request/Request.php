<?php
namespace Core\Request;

class Request
{

    public function post($key, $clean = true)
    {
        if (isset($_POST[$key])) {
            return ($clean) ? $this->XSSFilter(trim(strip_tags($_POST[$key]))) : $_POST[$key];
        }
        return false;
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

    public function file($key)
    {
        if (isset($_FILES[$key])) {
            return $_FILES[$key];
        }
    }

    public function cookie($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
    }

    public function XSSFilter($value)
    {
        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        return $value;
    }

}
