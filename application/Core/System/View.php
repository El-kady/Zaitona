<?php

namespace Core\System;

use Core\Service\Service;
use Core\Auth\Session;

class View
{
    private $module;
    private $controller;
    private $action;

    private $feedback_positive = array();
    private $feedback_negative = array();

    private $views_path;

    function __construct($data = array())
    {
        $this->views_path = Service::getConfig()->get("PATH_MODULE") . DS . "Views" . DS;
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function render($filename, $data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        require $this->views_path . '_templates/header.php';
        require $this->views_path . $filename . '.php';
        require $this->views_path . '_templates/footer.php';
    }

    public function renderWithoutHeaderAndFooter($filename, $data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        require $this->views_path . $filename . '.php';
    }

    public function renderJSON($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data);
    }


    public function renderFeedbackMessages()
    {
        $this->feedback_positive = Service::getSession()->get('feedback_positive');
        $this->feedback_negative = Service::getSession()->get('feedback_negative');

        require $this->views_path . '_templates/feedback.php';

        Service::getSession()->set('feedback_positive', null);
        Service::getSession()->set('feedback_negative', null);
    }

    private function get($property, $default = "")
    {
        return (property_exists($this, $property)) ? $this->$property : $default;
    }

    private function getConfig($key, $default = "")
    {
        return Service::getConfig()->get($key, $default);
    }

    private function route(array $data)
    {
        $route = array();

        if ($this->module != "Frontend") {
            $route[] = (isset($data["module"])) ? $data["module"] : $this->module;
        }

        $route[] = (isset($data["controller"])) ? $data["controller"] : $this->controller;
        $route[] = (isset($data["action"])) ? $data["action"] : $this->action;

        return $this->getConfig("URL") . "/" . implode("/", array_map("strtolower",$route));
    }

    public function encodeHTML($str)
    {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
    }

    public function loadCSSLink($filename)
    {
        return sprintf("<link rel='stylesheet' href='%s/assets/%s'>\n", Service::getConfig()->get("URL"), $filename);
    }
}
