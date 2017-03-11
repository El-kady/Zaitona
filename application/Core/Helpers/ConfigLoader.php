<?php

namespace Core\Helpers;

use Core\Service\Service;

class ConfigLoader
{
    private $directives = array();

    function __construct($bootstrap_directives = array())
    {

        if (count($bootstrap_directives) > 0) {
            foreach ($bootstrap_directives as $key => $value) {
                $this->directives[$key] = $value;
            }
        }

        $directives = Service::getDatabase()->fetchAll("SELECT * FROM `configs` ");
        if (count($directives) > 0) {
            foreach ($directives as $directive) {
                switch ($directive["type"]) {
                    case 'json';
                        $this->directives[$directive["name"]] = json_decode($directive["value"], true);
                        break;
                    case 'string';
                    default:
                        $this->directives[$directive["name"]] = $directive["value"];
                }
            }
        }
    }

    public function get($key, $default = "")
    {
        return (isset($this->directives[$key])) ? $this->directives[$key] : $default;
    }

    public function getAll()
    {
        return $this->directives;
    }

}