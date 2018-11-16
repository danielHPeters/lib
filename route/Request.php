<?php

namespace lib\route;

use lib\collection\ListInterface;

/**
 * Interface Request.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Request {
  public function getMethod (): string;

  public function getHeaders (): ListInterface;

  public function getUri (): string;

  public function getQueryParams (): array;

  public function getBody (): array;
}
