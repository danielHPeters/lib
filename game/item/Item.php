<?php

namespace rafisa\lib\game\item;

use rafisa\lib\game\item\action\IItemAction;

/**
 * Description of Item
 *
 * @author  d.peters
 * @version 1.0
 */
class Item
{
    /**
     *
     * @var string
     */
    private $name;
    /**
     *
     * @var string
     */
    private $description;

    /**
     *
     * @var float
     */
    private $price;

    /**
     *
     * @var IItemAction
     */
    private $action;

    /**
     *
     * @param string      $name
     * @param string      $description
     * @param float       $price
     * @param IItemAction $action
     */
    public function __construct(string $name, string $description, float $price, IItemAction $action = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->action = $action;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * Use Item
     */
    public function doUse()
    {
        $this->action->doUse();
    }
}
