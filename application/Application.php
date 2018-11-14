<?php

namespace lib\application;

/**
 * Basic web application interface.
 *
 * @package lib\application
 * @author Daniel Peters
 * @version 1.0
 */
interface Application {
  public static function boot (): void;
}
