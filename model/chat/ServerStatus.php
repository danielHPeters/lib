<?php

namespace lib\model\chat;

use lib\util\Enum;

/**
 * Class ServerStatus.
 *
 * @package lib\model\chat
 * @@author Daniel Peters
 * @version 1.0
 */
class ServerStatus extends Enum {
	const RUNNING = 0;
	const STOPPING = 1;
	const DEACTIVATED = 2;
}
