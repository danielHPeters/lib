<?php

namespace lib\model\party;

use lib\util\Enum;

/**
 * Class PartyStatus.
 *
 * @package lib\model\party
 * @author Daniel Peters
 * @version 1.0
 */
class PartyStatus extends Enum {
  const INVITED = 0;
  const ACCEPTED = 1;
  const DECLINED = 2;
}
