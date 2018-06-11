<?php

namespace rafisa\lib\factory;

use rafisa\lib\html\Tag;
use rafisa\lib\html\Html;

/**
 * Class HtmlTagFactory.
 *
 * @package rafisa\lib\factory
 * @author Daniel Peters
 */
abstract class HtmlTagFactory {
	final public static function createHtmlTag( string $tag, string $content ): Html {
		return Tag::isValidKey( $tag ) ? new Html( $tag, $content ) : null;
	}
}
