<?php

namespace rafisa\lib\card;

/**
 * Description of Card
 *
 * @author  d.peters
 * @version 1.0
 */
class Card
{

    /**
     * Color of the card
     *
     * @var string
     */
    private $color;

    /**
     * Value of the card
     *
     * @var string
     */
    private $value;

    /**
     * Default constructor. Sets color and value of the card.
     *
     * @param string $color
     * @param string $value
     */
    public function __construct(string $color, string $value)
    {
        $this->color = $color;
        $this->value = $value;
    }

    /**
     * Get the color of the card
     *
     * @return string color of card
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Get the value of the card
     *
     * @return string value of card
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set the color of the card
     *
     * @param string $color new color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }

    /**
     * Set the value of the card
     *
     * @param string $value new value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}
