<?php

namespace rafisa\lib\accounting;

use DateTime;
use rafisa\lib\entities\Customer;
use rafisa\lib\collections\ICollection;

/**
 * Description of Invoice
 *
 * @author Daniel
 */
class Invoice
{
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
     * @param DateTime    $invoiceDate
     * @param DateTime    $dueDate
     * @param Customer    $customer
     * @param ICollection $products
     */
    public function __construct(DateTime $invoiceDate, DateTime $dueDate, Customer $customer, ICollection $products)
    {
        $this->invoiceDate = $invoiceDate;
        $this->dueDate = $dueDate;
        $this->customer = $customer;
        $this->products = $products;
    }
}
