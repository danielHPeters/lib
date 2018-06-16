<?php

namespace lib\filter;

/**
 * Class InputValidator.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Validator {
	const VALID_EMAIL = "^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$";

	public static function validEmail( string $email ): bool {
		return preg_match( self::VALID_EMAIL, $email );
	}

	public static function checkPostVars( array $fields ): array {
		$msg = [];

		foreach ( $fields as $key => $value ) {
			if ( ! isset( $_POST[ $key ] ) || empty( trim( $_POST[ $key ] ) ) ) {
				$msg['errors'][] = $value;
			}
		}

		return $msg;
	}
}
