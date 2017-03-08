<?php

namespace Core\Helpers;

use \Core\Service\Service;

class Form
{
    private $name;

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

    public function fill($name, array $data)
    {
        Service::getSession()->set($this->formName($name), $data);
    }

    private function formName($name)
    {
        return "Form" . $name;
    }

    public function valueOf($name)
    {
        $data = Service::getSession()->get($this->name);
        if (isset($data[$name])) {
            return $data[$name];
        } else {

        }
    }
}