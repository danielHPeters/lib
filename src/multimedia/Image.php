<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\image;

use rafisa\lib\src\file\File;

/**
 * Description of Image
 *
 * @author d.peters
 */
class Image extends File
{

    /**
     * Description of image for alt text or captions
     * @var string
     */
    private $description;

    /**
     *
     * @param string $id
     * @param string $name
     * @param string $description
     * @param int $size
     * @param string $fileEnding
     * @param string $mimeType
     */
    public function __construct(string $id, string $name, string $description, int $size, string $fileEnding = 'jpg', string $mimeType = 'image/jpeg')
    {
        $this->id = $id;
        $this->setName($name);
        $this->description = $description;
        $this->setSize($size);
        $this->setFileEnding($fileEnding);
        $this->setMimeType($mimeType);
    }

}
