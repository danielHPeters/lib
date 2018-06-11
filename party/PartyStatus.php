<?php

namespace rafisa\lib\party;

use rafisa\lib\util\Enum;

/**
 * Class PartyStatus.
 *
 * @package rafisa\lib\party
 * @author Daniel Peters
 * @version 1.0
 */
class PartyStatus extends Enum {
	const INVITED = 0;
	const ACCEPTED = 1;
	const DECLINED = 2;
}
