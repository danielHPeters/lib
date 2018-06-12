<?php

namespace rafisa\lib\util;

use ReflectionClass;

/**
 * Class Enum.
 *
 * @package rafisa\lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Enum {
	private static $constantsCache = null;

	private static function getConstants(): array {
		if ( self::$constantsCache == null ) {
			self::$constantsCache = [];
		}

		$calledClass = get_called_class();

		if ( ! array_key_exists( $calledClass, self::$constantsCache ) ) {
			$reflect                              = new ReflectionClass( $calledClass );
			self::$constantsCache[ $calledClass ] = $reflect->getConstants();
		}

		return self::$constantsCache[ $calledClass ];
	}

	public static function isValidKey( $key ): bool {
		$constants = self::getConstants();

		return array_key_exists( $key, $constants );
	}

	public static function isValidValue( $value, $strict = true ): bool {
		$values = array_values( self::getConstants() );

		return in_array( $value, $values, $strict );
	}
}
