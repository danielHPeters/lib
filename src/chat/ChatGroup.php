<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\chat;

use rafisa\lib\src\collections\ArrayList;
use rafisa\lib\src\entities\User;
use rafisa\lib\src\entities\Entity;
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
     * @var ArrayList
     */
    private $members;

    /**
     * Group Admins
     * @var ArrayList
     */
    private $admins;

    /**
     * @var ArrayList
     */
    private $chat;

    /**
     * Constructor
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
     * @throws Exception
     */
    function kickUser(User $user)
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
     * @return ArrayList
     */
    public function getMembers() : ArrayList
    {
        return $this->members;
    }

    /**
     *
     * @return ArrayList
     */
    public function getAdmins(): ArrayList
    {
        return $this->admins;
    }

}
