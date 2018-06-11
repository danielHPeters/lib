<?php

namespace rafisa\lib\observer;

/**
 * Interface Observer.
 *
 * @package rafisa\lib\observer
 * @author Daniel Peters
 * @version 1.0
 */
interface Observer {
	public function update( Observable $obj, $args = null );
}
