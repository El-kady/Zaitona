<?php

namespace Core\Helpers;

use \Core\Service\Service;

class Form
{
    private $name;
    private $data;

    public function open($name, $action, $attrs = [])
    {
        $this->name = $this->formName($name);

        $_attrs = [];
        foreach ($attrs as $key => $value) {
            $_attrs[] = sprintf('%s="%s"', $key, $value);
        }

        return sprintf('<form method="post" action="%s" %s>', $action, implode(" ", $_attrs));
    }

    public function close()
    {
        Service::getSession()->set($this->name, []);
        return "</form>";
    }

    public function fillTmp($name, array $data)
    {
        Service::getSession()->set($this->formName($name), $data);
    }

    public function fillData($name, array $data)
    {
        $this->data[$this->formName($name)] = $data;
    }

    private function formName($name)
    {
        return "Form" . $name;
    }

    public function valueOf($name,$default = "")
    {
        $tmp = Service::getSession()->get($this->name);

        if (isset($tmp[$name])) {
            return $tmp[$name];
        } elseif (isset($this->data[$this->name][$name])) {
            return $this->data[$this->name][$name];
        }

        return $default;
    }
}