<?php

namespace rafisa\lib\chat;


use rafisa\lib\util\Enum;

class EServerStatus extends Enum
{
    const RUNNING = 0;
    const STOPPING = 1;
    const DEACTIVATED = 2;
}
