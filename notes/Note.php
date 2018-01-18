<?php

namespace rafisa\lib\notes;

/**
 * Class Note
 *
 * @author  d.peters
 * @version 1.0
 * @package rafisa\lib\notes
 */
class Note implements ISendAble
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string
     */
    private $content;

    /**
     * Note constructor.
     *
     * @param string $id
     * @param string $author
     * @param string $recipient
     * @param string $content
     */
    public function __construct(string $id, string $author, string $recipient, string $content)
    {
        $this->id = $id;
        $this->author = $author;
        $this->recipient = $recipient;
        $this->content = $content;
    }

    public function send()
    {
        // TODO: Implement send() method.
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
