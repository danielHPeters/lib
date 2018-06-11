<?php

namespace rafisa\lib\session;

use DateTime;
use rafisa\lib\entities\User;
use DateInterval;

/**
 * Class Session.
 *
 * @package rafisa\lib\session
 * @author Daniel Peters
 * @version 1.0
 */
class Session {
	private $id;
	private $user;
	private $loginTime;
	private $active;
	private $limit;
	private $domain;
	private $path;
	private $https;

	/**
	 * Session constructor.
	 *
	 * @param string $id
	 * @param User $user
	 * @param int $limit
	 * @param string $domain
	 * @param string $path
	 * @param bool $https
	 */
	public function __construct( string $id, User $user, int $limit, string $domain, string $path, bool $https ) {
		$this->id        = $id;
		$this->user      = $user;
		$this->loginTime = new DateTime();
		$this->active    = true;
		$this->limit     = $limit;
		$this->domain    = $domain;
		$this->path      = $path;
		$this->https     = $https;
	}

	public function getUser(): User {
		return $this->user;
	}

	public function getLoginTime(): DateTime {
		return $this->loginTime;
	}

	public function getElapsedTime(): DateInterval {
		return $this->loginTime->diff( new DateTime() );
	}

	public function isActive(): bool {
		return $this->active;
	}

	public function getLimit(): int {
		return $this->limit;
	}

	public function getDomain(): string {
		return $this->domain;
	}

	public function getPath(): string {
		return $this->path;
	}

	public function isHttps(): bool {
		return $this->https;
	}

	public function setActive( bool $active ) {
		$this->active = $active;
	}

	/**
	 * Refresh session id and delete old session.
	 */
	public function refresh() {
		session_regenerate_id( true );
	}
}
