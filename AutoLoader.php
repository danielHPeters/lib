<?php

namespace rafisa\lib;

/**
 * Description of AutoLoader
 *
 * @author d.peters
 * @version 1.0
 */
abstract class AutoLoader
{

    /**
     * Autoload Classes
     */
    public static function register()
    {
        spl_autoload_register(
            function ($class) {
                $file = str_replace('\\', '/', $class);
                $file = str_replace('rafisa/', '/', $file);
                $file = str_replace('rio/', '../', $file);
                $relativeUrl = dirname(__FILE__) . '/../' . $file . '.php';
                if (file_exists($relativeUrl)) {
                    require_once $relativeUrl;
                }
            }
        );
    }
}
