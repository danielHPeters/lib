<?php

namespace rafisa\lib\gallery;

use rafisa\lib\entities\Entity;

/**
 * Description of Image
 *
 * @author  d.peters
 * @version 1.0
 */
class GalleryImage extends Entity
{
    /**
     *
     * @var string
     */
    private $dir;

    /**
     *
     * @var string
     */
    private $thumbsDir;

    /**
     *
     * @var string
     */
    private $fileName;

    /**
     * Constructor
     *
     * @param string $dir
     * @param string $thumbsDir
     * @param string $fileName
     */
    public function __construct(string $dir, string $thumbsDir, string $fileName)
    {
        $this->dir = $dir;
        $this->thumbsDir = $thumbsDir;
        $this->fileName = $fileName;
    }

    /**
     *
     * @return string
     */
    public function getThumbNail(): string
    {
        return $this->thumbsDir . $this->fileName;
    }

    /**
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->dir . $this->fileName;
    }

    /**
     *
     * @param string $dir
     */
    public function setDir(string $dir)
    {
        $this->dir = $dir;
    }

    /**
     *
     * @param string $thumbsDir
     */
    public function setThumbsDir(string $thumbsDir)
    {
        $this->thumbsDir = $thumbsDir;
    }

    /**
     *
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }
}
