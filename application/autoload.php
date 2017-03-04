<?php


class Autoload
{
    public function register($prepend = false)
    {
        spl_autoload_register(array($this, 'loadClass'), true, $prepend);
    }

    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    public function loadClass($class)
    {
        if ($file = $this->findFile($class)) {
            includeFile($file);
            return true;
        }
    }

    function findFile($class, $ext = '.php')
    {
        $class = str_replace('Zaitona\\', '', $class);
        $file = strtr($class, '\\', DIRECTORY_SEPARATOR) . $ext;
        if (file_exists(PATH_APP . $file)) {
            return PATH_APP . $file;
        }
        return false;
    }
}

function includeFile($file)
{
    include $file;
}