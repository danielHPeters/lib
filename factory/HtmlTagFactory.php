<?php

namespace rafisa\lib\factory;

use rafisa\lib\html\Tag;
use rafisa\lib\html\Html;

/**
 * Description of HtmlTagFactory
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class HtmlTagFactory
{
    final public static function createHtmlTag(string $tag, string $content): Html
    {
        return Tag::isValidKey($tag) ? new Html($tag, $content) : null;
    }
}
