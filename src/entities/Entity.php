<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\entities;

/**
 * Class Entity
 * @author Daniel Peters
 * @package rafisa\entities
 * @version 26.04.217
 */
abstract class Entity {

    /**
     * Id of the eintity
     * @var string
     */
    private $id;

    /**
     * Get the id of the entity
     * @return string
     */
    public function getId() : string {
        return $this->id;
    }

    /**
     * Set the id of the entity
     * @param string $id
     */
    public function setId(string $id){
        $this->id = $id;
    }

    public function toArray() : array {
        return [];
    }

}
