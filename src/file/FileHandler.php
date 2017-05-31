<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\file;

/**
 * Description of FileHandler
 *
 * @author Daniel
 */
class FileHandler
{

    /**
     *
     * @var string
     */
    private $file;

    /**
     *
     * @var mixed
     */
    private $handle;

    /**
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     *
     * @param string $mode
     */
    public function open(string $mode)
    {
        $this->handle = fopen($this->file, $mode);
    }

    /**
     *
     * @param string $data
     */
    public function writeLn(string $data)
    {
        fwrite($this->handle, "$data\n");
    }

    /**
     *
     */
    public function close()
    {
        fclose($this->handle);
    }

}
