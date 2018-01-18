<?php

namespace rafisa\lib\chat;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;
use rafisa\lib\entities\User;
use rafisa\lib\entities\Entity;
use Exception;

/**
 * Description of ChatGroup
 *
 * @author d.peters
 */
class ChatGroup extends Entity
{
    /**
     *
     * @var ICollection
     */
    private $members;

    /**
     * Group Admins
     *
     * @var ICollection
     */
    private $admins;

    /**
     * @var ICollection
     */
    private $chat;

    /**
     * Constructor
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->setId($id);
        $this->members = new ArrayList();
        $this->admins = new ArrayList();
        $this->chat = new ArrayList();
    }

    /**
     *
     * @param User $user
     *
     * @throws Exception
     */
    public function kickUser(User $user)
    {
        $userIn = $this->members->contains($user);

        if ($userIn) {
            $key = $this->members->indexOf($user);
            $this->members->remove($key);

            if ($this->admins->contains($user)) {
                $key = $this->admins->indexOf($user);
                $this->admins->remove($key);
            }
        } else {
            throw new Exception('User not Found');
        }
    }

    /**
     *
     * @return ICollection
     */
    public function getMembers(): ICollection
    {
        return $this->members;
    }

    /**
     *
     * @return ICollection
     */
    public function getAdmins(): ICollection
    {
        return $this->admins;
    }
}
