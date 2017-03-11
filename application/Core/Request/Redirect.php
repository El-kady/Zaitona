<?php
namespace Core\Request;

use Core\Service\Service;

class Redirect
{

    public function toPreviousViewedPageAfterLogin($path)
    {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/' . $path);
    }

    public function home()
    {
        header("location: " . Service::getConfig()->get('URL'));
    }

    public function to($path)
    {
        header("location: " . Service::getConfig()->get('URL') . $path);
    }

    public function absolute($url)
    {
        header("location: " . $url);
    }
}
