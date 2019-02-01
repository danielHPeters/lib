<?php

namespace lib\math;

use lib\util\Enum;

/**
 * Enum class Operator.
 *
 * @package lib\math
 * @author Daniel Peters
 * @version 1.0
 */
class Operator extends Enum {
  const ADD = '+';
  const SUBTRACT = '-';
  const MULTIPLY = '*';
  const DIVIDE = '/';
  const POWER = '^';
}
