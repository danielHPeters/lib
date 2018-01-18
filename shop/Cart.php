<?php

namespace rafisa\lib\shop;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\ICollection;

/**
 * Description of Cart
 *
 * @author d.peters
 * @version 1.0
 */
class Cart
{

    /**
     * Collection containing all the products in the cart
     *
     * @var ICollection
     */
    private $products;

    /**
     * Initializes the products array
     */
    public function __construct()
    {
        $this->products = new ArrayList();
    }

    /**
     *
     * @return ICollection
     */
    public function getProducts(): ICollection
    {
        return $this->products;
    }
}
