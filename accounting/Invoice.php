<?php

namespace rafisa\lib\accounting;

use DateTime;
use rafisa\lib\entities\Customer;
use rafisa\lib\collections\Collection;

/**
 * Description of Invoice.
 *
 * @author Daniel Peters
 * @version 1.0
 */
class Invoice {
	private $invoiceDate;
	private $dueDate;
	private $customer;
	private $products;

	public function __construct( DateTime $invoiceDate, DateTime $dueDate, Customer $customer, Collection $products ) {
		$this->invoiceDate = $invoiceDate;
		$this->dueDate     = $dueDate;
		$this->customer    = $customer;
		$this->products    = $products;
	}

	public function getInvoiceDate(): DateTime {
		return $this->invoiceDate;
	}

	public function getDueDate(): DateTime {
		return $this->dueDate;
	}

	public function getCustomer(): Customer {
		return $this->customer;
	}

	public function getProducts(): Collection {
		return $this->products;
	}
}
