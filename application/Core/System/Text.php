<?php

namespace Core\System;

class Text
{
    private $lang = "en";
    private $texts;

    function __construct($lang)
    {
        $this->lang = $lang;
    }

    public function get($key, $data = null)
    {
        $key = strtoupper($key);
        // if not $key
        if (!$key) {
            return null;
        }

        if ($data) {
            foreach ($data as $var => $value) {
                ${$var} = $value;
            }
        }

        if (!$this->texts) {
            $this->texts = require(dirname(__DIR__).'/Langs/' . $this->lang . '.php');
        }

        if (array_key_exists($key, $this->texts)) {
            return $this->texts[$key];
        }

        return $key;
    }
}