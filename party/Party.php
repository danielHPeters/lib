<?php

namespace rafisa\lib\party;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;

/**
 * Description of Party
 *
 * @author d.peters
 */
class Party
{
    /**
     *
     * @var ICollection
     */
    private $guests;

    /**
     * Default constructor. Initializes guests list
     */
    public function __construct()
    {
        $this->guests = new ArrayList();
    }

    /**
     * Get the guests list
     *
     * @return ICollection list of guests
     */
    public function getGuests(): ICollection
    {
        return $this->guests;
    }
}
