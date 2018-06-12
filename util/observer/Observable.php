<?php

namespace rafisa\lib\util\observer;

use rafisa\lib\collection\ArrayList;
use rafisa\lib\collection\Collection;

/**
 * Class Observable.
 *
 * @package rafisa\lib\observer
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Observable {
	private $observers;

	public function __construct() {
		$this->observers = new ArrayList();
	}

	public function getObservers(): Collection {
		return $this->observers;
	}

	public function attach( Observer $obs ): void {
		$this->observers->add( $obs );
	}

	public function detach( Observer $obs ): void {
		$key = $this->observers->indexOf( $obs );
		$this->observers->remove( $key );
	}

	public function notify(): void {
		$this->observers->each( function ( Observer $obs ) {
			$obs->update( $this );
		} );
	}
}
