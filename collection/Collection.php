<?php

namespace lib\collection;

use Closure;

/**
 * Interface Collection.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
interface Collection {
  public function add ($obj): void;

  public function addAll (array $arr): void;

  public function get (int $key);

  public function isEmpty (): bool;

  public function has (int $key): bool;

  public function contains ($obj): bool;

  public function indexOf ($obj): int;

  public function clear (): void;

  public function lastIndexOf ($obj): int;

  public function remove (int $key): void;

  public function removeRange (int $fromKey, int $toKey): void;

  public function filter (Closure $predicate): array;

  public function map (Closure $callback): array;

  public function size (): int;

  public function sort (bool $reverse): void;

  public function toArray (): array;

  public function isInteger ($obj): bool;
}
