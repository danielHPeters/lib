<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\render;

/**
 * Description of ViewRenderer
 *
 * @author d.peters
 */
abstract class ViewRenderer {

    public static function renderTemplate(string $resource, string $location = '', $vars = null) {

        $html = file_get_contents($location . '/templates/' . $resource . '.tpl.php');

        if ($vars !== null) {

            foreach ($vars as $key => $value) {
                $html = str_replace('$' . $key, $value, $html);
            }
        }
        echo $html;
    }

}
