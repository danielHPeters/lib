<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\util\io;

use Exception;

/**
 * Description of OutputBuffer
 *
 * @author d.peters
 */
abstract class OutputBuffer {

    /**
     * 
     */
    public static final function start() {
        ob_start();
    }

    /**
     * 
     * @return string
     * @throws Exception
     */
    public static final function getContents(): string {

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
    public static final function endClean() {
        $success = ob_end_clean();

        if (!$success) {
            throw new Exception('Could not clean and close the output buffer.');
        }
    }

    /**
     * 
     */
    public static final function flush() {
        ob_flush();
    }

}
