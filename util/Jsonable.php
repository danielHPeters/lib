<?php

namespace lib\util;

/**
 * Interface Jsonable.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
interface Jsonable {
	/**
	 * Convert object to JSON string.
	 *
	 * @return string JSON string of object.
	 */
	public function toJson(): string;
}
