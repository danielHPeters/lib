<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\card;

/**
 * Description of CardGenerator
 *
 * @author d.peters
 */
abstract class CardGenerator {

    /**
     * 
     * @return array
     */
    public static function createCardsArray(): array {

        $colors = ['clubs', 'diamonds', 'hearts', 'spades'];
        $values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'j', 'q', 'k', 'a'];
        $cards = [];

        foreach ($colors as $color) {
            foreach ($values as $value) {

                $cards[] = ['color' => $color, 'value' => $value];
            }
        }
        return $cards;
    }

    /**
     * Get all files from a given folder.
     * 
     * @param string $path the folder to scan
     * @return array files in the given folder
     */
    public static function getImages(string $path): array {

        // Filter out directories
        $temp = array_filter(scandir($path), function($item) use ($path) {
            return is_file($path . $item);
        });

        // reindex array to avoid errors with json_encode
        $images = array_values($temp);

        return $images;
    }

}
