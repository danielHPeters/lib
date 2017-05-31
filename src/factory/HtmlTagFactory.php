<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\factory;

use rafisa\lib\src\html\Tag;
use rafisa\lib\src\html\Html;

/**
 * Description of HtmlTagFactory
 *
 * @author d.peters
 */
class HtmlTagFactory {

    public function createHtmlTag(string $tag, string $content) {

        $htmlTag = null;

        if (Tag::isValidKey($tag)) {

            $htmlTag = new Html($tag, $content);
        }

        return $htmlTag;
    }

}
