<?php

namespace lib\model\game\item\action;

/**
 * Interface ItemAction.
 *
 * @package lib\model\game\item\action
 * @author Daniel Peters
 * @version 1.0
 */
interface ItemAction {
	public function doUse(): void;
}
