<?php

namespace rafisa\lib\notes;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;
use rafisa\lib\entities\User;

/**
 * Class PinBoard
 *
 * @author  d.peters
 * @version 1.0
 * @package rafisa\lib\notes
 */
class PinBoard
{
    /**
     * @var ICollection
     */
    private $notes;

    /**
     * @var User
     */
    private $owner;

    /**
     * PinBoard constructor.
     *
     * @param User $owner
     */
    public function __construct(User $owner)
    {
        $this->notes = new ArrayList();
    }

    /**
     * @return ICollection
     */
    public function getNotes(): ICollection
    {
        return $this->notes;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
    }
}
