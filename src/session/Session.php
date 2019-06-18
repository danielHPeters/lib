<?php

namespace lib\session;

use DateInterval;
use DateTimeImmutable;
use lib\model\entity\User;
use Exception;
use function session_regenerate_id;

/**
 * Class Session.
 *
 * @package lib\session
 * @author  Daniel Peters
 * @version 1.0
 */
class Session {
  /**
   * @var string
   */
  private $id;
  /**
   * @var User
   */
  private $user;
  /**
   * @var DateTimeImmutable
   */
  private $loginTime;
  /**
   * @var bool
   */
  private $active;
  /**
   * @var int
   */
  private $limit;
  /**
   * @var string
   */
  private $domain;
  /**
   * @var string
   */
  private $path;
  /**
   * @var bool
   */
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
   * @throws Exception
   */
  public function __construct (string $id, User $user, int $limit, string $domain, string $path, bool $https) {
    $this->id = $id;
    $this->user = $user;
    $this->loginTime = new DateTimeImmutable();
    $this->active = true;
    $this->limit = $limit;
    $this->domain = $domain;
    $this->path = $path;
    $this->https = $https;
  }

  public function getUser (): User {
    return $this->user;
  }

  public function getLoginTime (): DateTimeImmutable {
    return $this->loginTime;
  }

  public function getElapsedTime (): DateInterval {
    return $this->loginTime->diff(new DateTimeImmutable());
  }

  public function isActive (): bool {
    return $this->active;
  }

  public function getLimit (): int {
    return $this->limit;
  }

  public function getDomain (): string {
    return $this->domain;
  }

  public function getPath (): string {
    return $this->path;
  }

  public function isHttps (): bool {
    return $this->https;
  }

  public function setActive (bool $active) {
    $this->active = $active;
  }

  /**
   * Refresh session id and delete old session.
   */
  public function refresh () {
    session_regenerate_id(true);
  }
}
