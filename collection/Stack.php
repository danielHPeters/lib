<?php

namespace lib\collection;

use ArrayAccess;
use Exception;

/**
 * Class Stack.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
class Stack implements ArrayAccess {
	private $arr;

	/**
	 * Adds an object to the top of this stack.
	 *
	 * @param mixed $obj Object to be added
	 */
	public function push( $obj ): void {
		array_unshift( $this->arr, $obj );
	}

	/**
	 * Returns and removes the top item of this stack.
	 *
	 * @return mixed Topmost item in the stack
	 * @throws Exception If the stack is empty
	 */
	public function pop() {
		if ( $this->isEmpty() ) {
			throw new Exception( "The Stack is already empty." );
		}
		$top = $this->arr[0];
		unset( $this->arr[0] );
		$this->arr = array_values( $this->arr );

		return $top;
	}

	/**
	 * Returns the topmost item without removing it.
	 *
	 * @return mixed The topmost item
	 */
	public function peek() {
		return $this->arr[0];
	}

	/**
	 * @param $obj
	 *
	 * @return int The index of the first occurrence of the object or -1 if not in this ArrayList
	 */
	public function indexOf( $obj ): int {
		$search = array_search( $obj, $this->arr );

		return $search !== false ? $search : - 1;
	}

	/**
	 * Check if this stack is empty.
	 *
	 * @return bool
	 */
	public function isEmpty(): bool {
		return empty( $this->items );
	}

	public function offsetExists( $offset ): bool {
		return false;
	}

	public function offsetGet( $offset ) {

	}

	public function offsetSet( $offset, $value ) {

	}

	public function offsetUnset( $offset ) {

	}
}
