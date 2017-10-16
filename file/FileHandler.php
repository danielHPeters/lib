<?php

namespace rafisa\lib\file;

/**
 * Description of FileHandler
 *
 * @author  Daniel
 * @version 1.0
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
