<?php

namespace rafisa\lib\collections;

use Exception;
use ArrayAccess;
use Iterator;

/**
 * Description of Collection
 *
 * @author  d.peters
 * @version 1.0
 */
class ArrayList implements Collection, ArrayAccess, Iterator {
	private $arr;
	private $index;

	public function __construct() {
		$this->arr   = [];
		$this->index = 0;
	}

	/**
	 * Add an Object to this Collection
	 *
	 * @param mixed $obj
	 */
	public function add( $obj ) {
		$this->arr[] = $obj;
	}

	/**
	 *
	 * @param int $key
	 *
	 * @return mixed
	 */
	public function get( int $key ) {
		return $this->offsetExists( $key ) ? $this->arr[ $key ] : null;
	}

	/**
	 *
	 * @return bool
	 */
	public function isEmpty(): bool {
		return empty( $this->arr );
	}

	/**
	 * Check if the collection contains key
	 *
	 * @param int $key
	 *
	 * @return bool
	 */
	public function has( int $key ): bool {
		return $this->offsetExists( $key );
	}

	/**
	 * Empty the collection
	 */
	public function clear() {
		$this->arr = [];
	}

	/**
	 *
	 * @param int $offset
	 *
	 * @return bool
	 */
	public function offsetExists( $offset ) {
		return isset( $this->arr[ $offset ] );
	}

	/**
	 *
	 * @param int $offset
	 *
	 * @return mixed
	 */
	public function offsetGet( $offset ) {
		return $this->offsetExists( $offset ) ? $this->arr[ $offset ] : null;
	}

	/**
	 *
	 * @param int $offset
	 * @param mixed $value
	 */
	public function offsetSet( $offset, $value ) {
		if ( $offset ) {
			$this->arr[ $offset ] = $value;
		} else {
			$this->arr[] = $value;
		}
	}

	/**
	 *
	 * @param int $offset
	 *
	 * @throws Exception
	 */
	public function offsetUnset( $offset ) {
		if ( isset( $this->arr[ $offset ] ) ) {
			unset( $this->arr[ $offset ] );
			$this->arr = array_values( $this->arr );
		} else {
			throw new Exception( 'Invalid offset' );
		}
	}

	/**
	 *
	 * @param array $arr
	 */
	public function addAll( array $arr ) {
		$this->arr = array_merge( $this->arr, $arr );
	}

	public function contains( $obj ): bool {
		return in_array( $obj, $this->arr, true );
	}

	/**
	 *
	 * @param $obj
	 *
	 * @return int returns the index of the first occurrence of the object or -1 if not in this ArrayList
	 */
	public function indexOf( $obj ): int {
		$search = array_search( $obj, $this->arr, true );

		return $search !== false ? $search : - 1;
	}

	/**
	 * @param mixed $obj
	 *
	 * @return bool
	 */
	public function isInteger( $obj ): bool {

	}

	public function lastIndexOf( $obj ): int {

	}

	/**
	 *
	 * @param int $key
	 *
	 * @throws \Exception
	 */
	public function remove( int $key ) {
		if ( isset( $this->arr[ $key ] ) ) {
			unset( $this->arr[ $key ] );
			$this->arr = array_values( $this->arr );
		} else {
			throw new Exception( 'Invalid Index' );
		}
	}

	public function removeRange( int $fromKey, int $toKey ) {

	}

	public function size(): int {
		return count( $this->arr );
	}

	public function sort( bool $reverse = false ) {

		if ( $reverse ) {
			rsort( $this->arr );
		} else {
			sort( $this->arr );
		}
	}

	public function toArray(): array {
		return $this->arr;
	}

	public function current() {
		return $this->arr[ $this->index ];
	}

	public function next() {
		$this->index ++;
	}

	public function key() {
		return $this->index;
	}

	public function rewind() {
		$this->index = 0;
	}

	public function valid(): bool {
		return isset( $this->arr[ $this->index ] );
	}

	public function reverse() {
		$this->arr = array_reverse( $this->arr );
		$this->rewind();
	}

	/**
	 * Iterate through the list while executing callback function.
	 * Behaves like foreach()
	 *
	 * @param callable $callback
	 */
	public function each( callable $callback ) {
		for ( $this->rewind(); $this->valid(); $this->next() ) {
			$current = $this->current();
			$callback( $current );
		}
	}
}
