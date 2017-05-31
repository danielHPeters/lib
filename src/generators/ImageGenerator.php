<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\generators;

/**
 * Description of ImageGenerator
 *
 * @author d.peters
 */
abstract class ImageGenerator {

    /**
     * 
     * @param string $filePath
     * @param string $thumbsPath
     * @return bool
     */
    public static function createThumbnail(string $filePath, string $thumbsPath): bool {
        $image = imagecreatefromjpeg($filePath);
        $thumbNail_temp = imagecreatetruecolor(100, 50);
        $success = imagecopy($thumbNail_temp, $image, 0, 0, 0, 0, 100, 50);

        if ($success) {

            $success = imagejpeg($thumbNail_temp, $thumbsPath);
        }

        return $success;
    }

}
