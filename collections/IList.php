<?php

namespace rafisa\lib\collections;

/**
 * Interface IList.
 *
 * @package rafisa\lib\collections
 * @author Daniel Peters
 * @version 1.0
 */
interface IList extends Collection {
	/**
	 * @param int $index
	 *
	 * @return mixed
	 */
	public function set( int $index ): void;

	/**
	 * @param int $index
	 *
	 * @return mixed
	 */
	public function get( int $index );

	/**
	 * @param int $index
	 *
	 * @return mixed
	 */
	public function removeAt( int $index ): void;
}
