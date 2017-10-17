<?php

namespace rafisa\lib\session;

use DateTime;
use rafisa\lib\entities\User;
use DateInterval;

/**
 * Description of Session
 *
 * @author  d.peters
 * @version 1.0
 */
class Session
{
    /**
     *
     * @var User
     */
    private $user;

    /**
     *
     * @var DateTime
     */
    private $loginTime;

    /**
     *
     * @var bool
     */
    private $active;

    /**
     * @var string
     */
    private $name;

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
     * @param User   $user
     * @param int    $limit
     * @param string $domain
     * @param string $path
     * @param bool   $https
     */
    public function __construct(User $user, int $limit, string $domain, string $path, bool $https)
    {
        $this->user = $user;
        $this->loginTime = new DateTime();
        $this->active = true;
        $this->name = $user->getUsername();
        $this->limit = $limit;
        $this->domain = $domain;
        $this->path = $path;
        $this->https = $https;
    }

    /**
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     *
     * @return DateTime
     */
    public function getLoginTime(): DateTime
    {
        return $this->loginTime;
    }

    public function getElapsedTime(): DateInterval
    {
        return $this->loginTime->diff(new DateTime());
    }

    /**
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return bool
     */
    public function isHttps(): bool
    {
        return $this->https;
    }

    /**
     *
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }
}
