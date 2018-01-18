<?php

namespace rafisa\lib\entities;

use rafisa\lib\observer\Observable;

/**
 * Description of Car
 *
 * @author  d.peters
 * @version 1.0
 */
class Car extends Observable
{
    private $name;

    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
        $this->notify();
    }
}
