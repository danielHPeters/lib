<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib;

/**
 * Description of AutoLoader
 *
 * @author d.peters
 */
abstract class AutoLoader
{

    /**
     * Autoload Classes
     */
    public static function register()
    {
        spl_autoload_register(function ($class) {

            $file = str_replace('\\', '/', $class);
            $relativeUrl = dirname(__FILE__) . '/../../' . $file . '.php';
            if (file_exists($relativeUrl)) {
                require_once($relativeUrl);
            }
        });
    }

}
