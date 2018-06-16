<?php

namespace lib\util;

/**
 * Class Str.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Str {
	final public static function substring( $string, $start ): string {
		return substr( $string, $start );
	}
}
