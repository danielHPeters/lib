<?php

namespace lib\util;

/**
 * Class Arr.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Arr {
	final public static function contains( $needle, array $haystack, bool $strict = false ): bool {
		return in_array( $needle, $haystack, $strict );
	}
}
