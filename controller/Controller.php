<?php

namespace lib\controller;

/**
 * Interface Controller.
 *
 * @package lib\controller
 * @author Daniel Peters
 * @version 1.0
 */
interface Controller {
	/**
	 * the controller to be used
	 *
	 * @param string $controller
	 */
	public function setController( string $controller ): void;

	/**
	 * action of the controller
	 *
	 * @param string $action
	 */
	public function setAction( string $action ): void;

	/**
	 * The parameters sent to the controller
	 *
	 * @param array $params
	 */
	public function setParams( array $params ): void;

	/**
	 * Start the controller
	 */
	public function run(): void;
}
