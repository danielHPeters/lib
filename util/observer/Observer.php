<?php

namespace lib\util\observer;

/**
 * Interface Observer.
 *
 * @package lib\util\observer
 * @author Daniel Peters
 * @version 1.0
 */
interface Observer {
	public function update( Observable $obj, $args = null );
}
