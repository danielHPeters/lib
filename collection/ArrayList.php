<?php

namespace lib\collection;

use Exception;
use ArrayAccess;
use Iterator;

/**
 * Class ArrayList.
 *
 * @package lib\collection
 * @author Daniel Peters
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
	 * Add an Object to this Collection.
	 *
	 * @param mixed $obj New element
	 */
	public function add( $obj ): void {
		$this->arr[] = $obj;
	}

	public function get( int $key ) {
		return $this->offsetExists( $key ) ? $this->arr[ $key ] : null;
	}

	public function isEmpty(): bool {
		return empty( $this->arr );
	}

	/**
	 * Check if the collection contains key.
	 *
	 * @param int $key Selected key
	 *
	 * @return bool Check if item exists
	 */
	public function has( int $key ): bool {
		return $this->offsetExists( $key );
	}

	/**
	 * Empty the collection.
	 */
	public function clear(): void {
		$this->arr = [];
	}

	public function offsetExists( $offset ): bool {
		return isset( $this->arr[ $offset ] );
	}

	public function offsetGet( $offset ) {
		return $this->offsetExists( $offset ) ? $this->arr[ $offset ] : null;
	}

	public function offsetSet( $offset, $value ): void {
		if ( $offset ) {
			$this->arr[ $offset ] = $value;
		} else {
			$this->arr[] = $value;
		}
	}

	public function offsetUnset( $offset ): void {
		if ( isset( $this->arr[ $offset ] ) ) {
			unset( $this->arr[ $offset ] );
			$this->arr = array_values( $this->arr );
		} else {
			throw new Exception( 'Invalid offset' );
		}
	}

	public function addAll( array $arr ): void {
		$this->arr = array_merge( $this->arr, $arr );
	}

	public function contains( $obj ): bool {
		return in_array( $obj, $this->arr, true );
	}

	/**
	 *
	 * @param $obj
	 *
	 * @return int Returns the index of the first occurrence of the object or -1 if not in this ArrayList
	 */
	public function indexOf( $obj ): int {
		$search = array_search( $obj, $this->arr, true );

		return $search !== false ? $search : - 1;
	}

	public function isInteger( $obj ): bool {

	}

	public function lastIndexOf( $obj ): int {

	}

	public function remove( int $key ): void {
		if ( isset( $this->arr[ $key ] ) ) {
			unset( $this->arr[ $key ] );
			$this->arr = array_values( $this->arr );
		} else {
			throw new Exception( 'Invalid Index' );
		}
	}

	public function removeRange( int $fromKey, int $toKey ): void {

	}

	public function size(): int {
		return count( $this->arr );
	}

	public function sort( bool $reverse = false ): void {
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

	public function next(): void {
		$this->index ++;
	}

	public function key(): int {
		return $this->index;
	}

	public function rewind(): void {
		$this->index = 0;
	}

	public function valid(): bool {
		return isset( $this->arr[ $this->index ] );
	}

	public function reverse(): void {
		$this->arr = array_reverse( $this->arr );
		$this->rewind();
	}

	/**
	 * Iterate through the list while executing callback function.
	 * Behaves like foreach() in java.
	 *
	 * @param callable $callback
	 */
	public function each( callable $callback ): void {
		for ( $this->rewind(); $this->valid(); $this->next() ) {
			$current = $this->current();
			$callback( $current );
		}
	}
}
