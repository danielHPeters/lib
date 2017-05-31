<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\blog;

use rafisa\lib\src\entities\Entity;

/**
 * Description of Post
 *
 * @author d.peters
 */
class Post extends Entity {
    
    /**
     *
     * @var string 
     */
    private $author;
    
    /**
     *
     * @var string 
     */
    private $contents;

    /**
     *
     * @var int 
     */
    private $timestamp;

    /**
     * Post constructor.
     * @param string $id
     * @param string $author
     * @param string $contents
     * @param int $timestamp
     */
    public function __construct(string $id, string $author, string $contents, int $timestamp) {
        $this->setId($id);
        $this->author = $author;
        $this->contents = $contents;
        $this->timestamp = $timestamp;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    /**
     * @param string $contents
     */
    public function setContents(string $contents) {
        $this->contents = $contents;
    }

    /**
     * @return string
     */
    public function getContents(): string {
        return $this->contents;
    }

    /**
     * 
     * @return int
     */
    public function getTimestamp(): int {
        return $this->timestamp;
    }

    /**
     * 
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp) {
        $this->timestamp = $timestamp;
    }

}
