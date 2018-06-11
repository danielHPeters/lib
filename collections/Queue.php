<?php

namespace rafisa\lib\collections;

/**
 * Interface Queue.
 *
 * @package rafisa\lib\collections
 * @author Daniel Peters
 * @version 1.0
 */
interface Queue {
	/**
	 * @return mixed
	 */
	public function poll();

	/**
	 * @return mixed
	 */
	public function peek();

	/**
	 * @param $object
	 *
	 */
	public function add( $object ): void;
}
