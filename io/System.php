<?php

namespace rafisa\lib\io;

/**
 * Description of System
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class System
{
    final public static function printVar($var, $return = false)
    {
        print_r($var, $return);
    }

    final public static function dumpVar($var)
    {
        var_dump($var);
    }

    final public static function echoStr(string $str)
    {
        echo $str;
    }

    final public static function echoLn($str)
    {
        echo $str . '<br>';
    }

    /**
     * @param string $str
     * @param mixed  $args
     */
    final public static function doPrintf(string $str, $args = null)
    {
        printf($str, $args);
    }

    /**
     *
     */
    final public static function flush()
    {
        flush();
    }
}
