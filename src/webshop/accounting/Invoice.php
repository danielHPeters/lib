<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\webshop\accounting;

use DateTime;
use rafisa\lib\src\entities\Customer;
use rafisa\lib\src\collections\ICollection;

/**
 * Description of Invoice
 *
 * @author Daniel
 */
class Invoice {
    
    /**
     *
     * @var DateTime 
     */
    private $invoiceDate;
    
    /**
     *
     * @var DateTime 
     */
    private $dueDate;
    
    /**
     *
     * @var Customer 
     */
    private $customer;
    
    /**
     *
     * @var ICollection 
     */
    private $products;
    
    /**
     * 
     * @param DateTime $invoiceDate
     * @param DateTime $dueDate
     * @param Customer $customer
     * @param ICollection $products
     */
    public function __construct(DateTime $invoiceDate, DateTime $dueDate, Customer $customer, ICollection $products) {
        $this->invoiceDate = $invoiceDate;
        $this->dueDate = $dueDate;
        $this->customer = $customer;
        $this->products = $products;
    }
}
