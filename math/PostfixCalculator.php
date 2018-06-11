<?php

namespace rafisa\lib\math;

use Exception;
use rafisa\lib\data\SinglyList;

/**
 * Class PostfixCalculator.
 * Calculate an expression written in reverse Polish (postfix) notation.
 *
 * @package rafisa\lib\math
 * @author Daniel Peters
 * @version 1.0
 */
class PostFixCalculator {
	const VALID_INPUT = '^\\s*([-+]?)(\\d+)(?:\\s*\\s*([-+]?)(\\d+)\\s*([-+*\\/\\^]))+$';

	public static function calculate( string $input ): float {
		$result = null;
		if ( preg_match( PostFixCalculator::VALID_INPUT, $input ) ) {
			$tokens    = explode( ' ', $input );
			$operation = new SinglyList();

			foreach ( $tokens as $token ) {
				if ( ! is_null( $token ) ) {
					$operand2 = $operation->poll();
					$operand  = $operation->poll();

					switch ( $token ) {
						case '+':
							$result = $operand + $operand2;
							break;
						case '-':
							$result = $operand - $operand2;
							break;
						case '*':
							$result = $operand * $operand2;
							break;
						case '/':
							if ( $operand2 !== 0 ) {
								$result = $operand / $operand2;
							} else {
								throw new Exception( 'Division by zero not allowed!' );
							}
							break;
						case '^':
							$result = pow( $operand, $operand2 );
							break;
						default:
							throw new Exception( 'Internal error!' );
					}
					$operation->add( $result );
				} else {
					$operation->add( $token );
				}
			}
		} else {
			throw new Exception( 'The expression is not valid!' );
		}

		return $result;
	}
}
