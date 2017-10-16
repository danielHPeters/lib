<?php

namespace rafisa\lib\party;

use rafisa\lib\util\Enum;

/**
 * Description of EPartyStatus
 *
 * @author  d.peters
 * @version 1.0
 */
class EPartyStatus extends Enum
{
    const INVITED = 0;
    const ACCEPTED = 1;
    const DECLINED = 2;
}
