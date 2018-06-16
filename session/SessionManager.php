<?php

namespace lib\session;

/**
 * Class SessionManager.
 *
 * @package lib\session
 * @author Daniel Peters
 * @version 1.0
 */
class SessionManager {
	public static function startSession(
		string $name,
		int $limit = 0,
		string $path = '/',
		string $domain = '.localhost',
		bool $secure = true
	) {

		session_name( $name . ' Session' );

		$domain = isset( $domain ) ? $domain : isset( $_SERVER['SERVER_NAME'] );

		$https = $secure ? $secure : isset( $_SERVER['HTTPS'] );

		session_set_cookie_params( $limit, $path, $domain, $https, true );
		session_start();

		if ( ! self::hijackAttempted() ) {
			$_SESSION              = [];
			$_SESSION['ipAddress'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
		}
		session_write_close();
	}

	public static function hijackAttempted() {
		$hijackedAttempted = true;

		if ( ! isset( $_SESSION['ipAddress'] ) || ! isset( $_SESSION['userAgent'] ) ) {
			$hijackedAttempted = false;
		}

		if ( $_SESSION['ipAddress'] != $_SERVER['REMOTE_ADDR'] ) {
			$hijackedAttempted = false;
		}

		if ( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'] ) {
			$hijackedAttempted = false;
		}

		return $hijackedAttempted;
	}

	public static function regenerateSession() {
		if ( ! isset( $_SESSION['OBSOLETE'] ) || $_SESSION['OBSOLETE'] === false ) {
			$_SESSION['OBSOLETE'] = true;
			$_SESSION['EXPIRES']  = time() + 10;

			session_regenerate_id( false );

			session_write_close();
		}
	}
}
