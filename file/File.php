<?php

namespace rafisa\lib\file;

/**
 * Description of File
 *
 * @author d.peters
 */
class File
{
    /**
     * Name of the file
     *
     * @var string
     */
    private $name;

    /**
     * Path of the file;
     *
     * @var string
     */
    private $pathToFile;

    /**
     *
     * @var string
     */
    private $fileEnding;

    /**
     *
     * @var string
     */
    private $mimeType;

    /**
     *
     * @var int
     */
    private $size;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPathToFile(): string
    {
        return $this->pathToFile;
    }

    /**
     * @param string $pathToFile
     */
    public function setPathToFile(string $pathToFile)
    {
        $this->pathToFile = $pathToFile;
    }

    /**
     * @return string
     */
    public function getFileEnding(): string
    {
        return $this->fileEnding;
    }

    /**
     * @param string $fileEnding
     */
    public function setFileEnding(string $fileEnding)
    {
        $this->fileEnding = $fileEnding;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }
}
