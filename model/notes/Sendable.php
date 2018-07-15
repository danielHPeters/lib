<?php

namespace lib\model\notes;

/**
 * Interface Sendable.
 *
 * @package lib\model\notes
 * @author Daniel Peters
 * @version 1.0
 */
interface Sendable {
  public function send (): void;
}
