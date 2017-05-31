<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\game\place;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;

class Room {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Room
     */
    private $north;

    /**
     * @var Room
     */
    private $east;

    /**
     * @var Room
     */
    private $south;

    /**
     * @var Room
     */
    private $west;

    /**
     * @var ICollection
     */
    private $items;

    /**
     * @var ICollection
     */
    private $monsters;

    /**
     * 
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
        $this->items = new ArrayList();
        $this->monsters = new ArrayList();
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * 
     * @param string $description
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * 
     * @return ICollection
     */
    public function getItems(): ICollection {
        return $this->items;
    }

    /**
     * 
     * @return ICollection
     */
    public function getMonsters(): ICollection {
        return $this->monsters;
    }

    /**
     * 
     * @return Room
     */
    public function getNorth(): Room {
        return $this->north;
    }

    /**
     * 
     * @return Room
     */
    public function getEast(): Room {
        return $this->east;
    }

    /**
     * @return Room
     */
    public function getSouth(): Room {
        return $this->south;
    }

    /**
     * @return Room
     */
    public function getWest(): Room {
        return $this->west;
    }

    /**
     * @param ICollection $items
     */
    public function setItems(ICollection $items) {
        $this->items = $items;
    }

    /**
     * @param ICollection $monsters
     */
    public function setMonsters(ICollection $monsters) {
        $this->monsters = $monsters;
    }

    /**
     * @param Room $north
     */
    public function setNorth(Room $north) {
        $this->north = $north;
    }

    /**
     * @param Room $east
     */
    public function setEast(Room $east) {
        $this->east = $east;
    }

    /**
     * @param Room $south
     */
    public function setSouth(Room $south) {
        $this->south = $south;
    }

    /**
     * @param Room $west
     */
    public function setWest(Room $west) {
        $this->west = $west;
    }

}
