<?php

namespace rafisa\lib\auth;

use DateTime;
use rafisa\lib\entities\User;

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
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->loginTime = new DateTime();
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

    /**
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
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
