<?php

namespace lib\collection;

/**
 * Interface IList.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
interface IList extends Collection {
	public function set( int $index ): void;

	public function get( int $index );

	public function removeAt( int $index ): void;
}
