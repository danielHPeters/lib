<?php

namespace rafisa\lib\collections;

/**
 * Interface ICollection.
 *
 * @package rafisa\lib\collections
 * @author Daniel Peters
 * @version 1.0
 */
interface Collection {
	/**
	 *
	 * @param mixed $obj
	 */
	public function add( $obj ): void;

	/**
	 *
	 * @param array $arr
	 */
	public function addAll( array $arr ): void;

	/**
	 *
	 * @param int $key
	 *
	 * @return mixed
	 */
	public function get( int $key );

	/**
	 * @return bool
	 */
	public function isEmpty(): bool;

	/**
	 * Check if collection has key
	 *
	 * @param int $key
	 *
	 * @return bool
	 */
	public function has( int $key ): bool;

	/**
	 *
	 * @param mixed $obj
	 *
	 * @return bool
	 */
	public function contains( $obj ): bool;

	/**
	 *
	 * @param mixed $obj
	 *
	 * @return int
	 */
	public function indexOf( $obj ): int;

	/**
	 * Empty the collection
	 */
	public function clear(): void;

	/**
	 *
	 * @param mixed $obj
	 *
	 * @return int
	 */
	public function lastIndexOf( $obj ): int;

	/**
	 *
	 * @param int $key
	 */
	public function remove( int $key ): void;

	/**
	 *
	 * @param int $fromKey
	 * @param int $toKey
	 */
	public function removeRange( int $fromKey, int $toKey ): void;

	/**
	 * @return int
	 */
	public function size(): int;

	/**
	 * @param bool $reverse
	 *
	 * @return mixed
	 */
	public function sort( bool $reverse ): void;

	/**
	 * @return array
	 */
	public function toArray(): array;

	/**
	 *
	 * @param mixed $obj
	 *
	 * @return bool
	 */
	public function isInteger( $obj ): bool;
}
