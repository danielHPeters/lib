<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\chat;

use rafisa\lib\entities\User;
use rafisa\lib\entities\Entity;

/**
 * Description of ChatMessage
 *
 * @author d.peters
 */
class ChatMessage extends Entity
{

    /**
     *
     * @var User
     */
    private $author;

    /**
     * Recipient of the message. Can be User or ChatGroup
     * @var User
     */
    private $recipient;

    /**
     * Content of the chat message
     * @var string
     */
    private $contents;

    /**
     * Constructor
     *
     * @param string $id
     * @param User $author
     * @param User $recipient
     * @param string $contents
     */
    public function __construct(string $id, User $author, User $recipient, string $contents)
    {
        $this->setId($id);
        $this->author = $author;
        $this->recipient = $recipient;
        $this->contents = $contents;
    }

    /**
     *
     * @return string
     */
    public function getContents() : string
    {

        return $this->contents;
    }

}
