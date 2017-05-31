<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\webshop;

use rafisa\lib\src\collections\ArrayList;
use rafisa\lib\src\collections\ICollection;

/**
 * Description of Cart
 *
 * @author d.peters
 */
class Cart {

    /**
     * Collection containing all the products in the cart
     * @var ICollection 
     */
    private $products;

    /**
     * Initializes the products array
     */
    public function __construct() {
        $this->products = new ArrayList();
    }

    /**
     * 
     * @return ArrayList
     */
    public function getProducts(): ICollection {
        return $this->products;
    }

}
