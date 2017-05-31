<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\party;

use rafisa\lib\src\collections\ArrayList;

/**
 * Description of Party
 *
 * @author d.peters
 */
class Party {

    /**
     *
     * @var ArrayList 
     */
    private $guests;

    /**
     * Default constructor. Initializes guests list
     */
    public function __construct() {
        $this->guests = new ArrayList();
    }

    /**
     * Get the guests list
     * @return ArrayList list of guests
     */
    public function getGuests(): ArrayList {
        return $this->guests;
    }

}
