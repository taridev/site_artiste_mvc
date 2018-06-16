<?php

namespace Core;

class Autoloader
{


    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Inclue le fichier correspondant à notre classe
     *
     * @param string $class Le nom de la classe à chager
     * @return void
     */
    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $nsp = __NAMESPACE__;
            $class = str_replace(__NAMESPACE__. '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require_once __DIR__ . '/' . $class . '.php';
        }
    }
}
