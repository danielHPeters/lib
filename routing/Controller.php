<?php

namespace rafisa\lib\routing;

use Closure;

/**
 * Description of Controller
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
interface Controller {
	/**
	 * @param Request $request
	 * @param Response $response
	 * @param Closure|null $next
	 */
	public function execute( Request $request, Response $response, Closure $next = null );
}
