<?php

namespace lib\route;

use Closure;

/**
 * Interface Controller.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Controller {
	/**
	 * @param Request $request
	 * @param Response $response
	 * @param Closure|null $next
	 */
	public function execute( Request $request, Response $response, Closure $next = null );
}
