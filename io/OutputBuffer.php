<?php

namespace rafisa\lib\io;

use Exception;

/**
 * Description of OutputBuffer
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class OutputBuffer
{

    /**
     *
     */
    final public static function start()
    {
        ob_start();
    }

    /**
     *
     * @return string
     * @throws Exception
     */
    final public static function getContents(): string
    {

        $cont = ob_get_contents();

        if ($cont === false) {
            throw new Exception('Cannot get contents from output buffer.');
        }

        return $cont;
    }

    /**
     *
     * @throws Exception
     */
    final public static function endClean()
    {
        $success = ob_end_clean();

        if (!$success) {
            throw new Exception('Could not clean and close the output buffer.');
        }
    }

    /**
     *
     */
    final public static function flush()
    {
        ob_flush();
    }

}
