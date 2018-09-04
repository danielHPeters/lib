<?php

namespace lib\collection;

/**
 * Interface Queue.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
interface Queue {
  public function poll ();

  public function peek ();

  public function add ($object): void;
}
