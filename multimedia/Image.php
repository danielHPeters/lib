<?php

namespace rafisa\lib\image;

use rafisa\lib\file\File;

/**
 * Description of Image
 *
 * @author  d.peters
 * @version 1.0
 */
class Image extends File
{
    /**
     * @var string
     */
    private $id;
    /**
     * Description of image for alt text or captions
     *
     * @var string
     */
    private $description;

    /**
     *
     * @param string $id
     * @param string $name
     * @param string $description
     * @param int    $size
     * @param string $fileEnding
     * @param string $mimeType
     */
    public function __construct(
        string $id,
        string $name,
        string $description,
        int $size,
        string $fileEnding = 'jpg',
        string $mimeType = 'image/jpeg'
    ) {
        $this->id = $id;
        $this->setName($name);
        $this->description = $description;
        $this->setSize($size);
        $this->setFileEnding($fileEnding);
        $this->setMimeType($mimeType);
    }

}
