<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\webshop;

use rafisa\lib\src\entities\Entity;

/**
 * Container class which contains data of products.
 *
 * @author d.peters
 */
class Product extends Entity {

    /**
     *
     * @var string product code 
     */
    private $pid;

    /**
     * Name of the product
     * @var string
     */
    private $name;

    /**
     * Price of the product.
     * @var float 
     */
    private $price;

    /**
     * Category of the product. eg. Food
     * @var string
     */
    private $category;

    /**
     *
     * @var string 
     */
    private $productImage;

    /**
     * Default Constructor. Sets all the attributes of the product
     * @param int $id db id
     * @param string $pid product id
     * @param string $name product name
     * @param float $price price of the product
     * @param string $category category eg. tools
     */
    public function __construct(int $id, string $pid, string $name, float $price, string $category, string $productImage) {
        $this->name = $name;
        $this->setId($id);
        $this->pid = $pid;
        $this->price = $price;
        $this->category = $category;
        $this->productImage = $productImage;
    }

    /**
     * 
     * @return string
     */
    public function getPid(): string {
        return $this->pid;
    }

    /**
     * Get the name of the product
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the price of the product
     * @return float product price
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Get the category of this product
     * @return string product category
     */
    public function getCategory(): string {
        return $this->category;
    }

    /**
     * 
     * @return string
     */
    public function getProductImage(): string {
        return $this->productImage;
    }

    /**
     * 
     * @param string $pid
     */
    public function setPid(string $pid): void {
        $this->pid = $pid;
    }

    /**
     * Set the name of the product
     * @param string $name new product name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Set the price of the product
     * @param float $price new price
     */
    public function setPrice(float $price): void {
        $this->price = $price;
    }

    /**
     * Set the category of the product
     * @param string $category new prodcut category
     */
    public function setCategory(string $category): void {
        $this->category = $category;
    }

    /**
     * 
     * @param string $productImage
     */
    public function setProductImage(string $productImage): void {
        $this->productImage = $productImage;
    }

}
