<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\gallery;

/**
 * Description of GalleryGenerator
 *
 * @author d.peters
 */
class GalleryGenerator {

    /**
     * 
     * @param string $thumbsPath
     * @param string $imgsPath
     * @param string $imageTemplate
     */
    public static function createGalleryFromDir(string $thumbsPath, string $imgsPath, string $imageTemplate) {

        $files = scandir($thumbsPath);

        foreach ($files as $file) {

            $group = dirname($thumbsPath);

            if (is_file($thumbsPath . $file)) {

                $search = ['_', '.jpg', 'ae', 'oe', 'ue'];
                $replace = [' ', '', 'ä', 'ö', 'ü'];
                $label = ucfirst(str_replace($search, $replace, $file));

                // Generate a container for each image

                include $imageTemplate;
            } elseif (is_dir($thumbsPath . $file) && $file !== '..' && $file !== '.') {
                self::createGalleryFromDir($thumbsPath  . $file . '/', $imgsPath  . $file . '/');
            }
        }
    }
    
    public static function createGalleryFromDb(array $images, string $galleryRoot = 'images/gallery'){
        foreach ($images as $image){
            
        }
    }

}
