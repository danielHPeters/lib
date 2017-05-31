<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\util\io;

/**
 * Description of System
 *
 * @author d.peters
 */
abstract class System {

    public static final function printVar($var, $return = false) {
        print_r($var, $return);
    }

    public static final function dumpVar($var) {
        var_dump($var);
    }

    public static final function echoStr(string $str) {
        echo $str;
    }

    public static final function echoLn($str) {
        echo $str . '<br>';
    }

    /**
     * 
     * @param string $str
     */
    public static final function doPrintf(string $str, $args = null) {
        printf($str, $args);
    }

    /**
     * 
     */
    public static final function flush() {
        flush();
    }

}
