<?php

namespace rafisa\lib\html;

/**
 * Description of WebColor
 *
 * @author d.peters
 */
class WebColor
{
    /**
     * Black and white
     */
    const BLACK = '#000000';
    const WHITE = '#FFFFFF';

    /**
     * RGB
     */
    const RED = '#FF0000';
    const GREEN = '#00FF00';
    const BLUE = '#0000FF';

    /**
     * Other colors
     */
    const GOLD = '#FFD700';
    const NAVY = '#000080';
    const ORANGE = '#FFA500';
    const TEAL = '#008080';
    const TURQUOISE = '#40ED0';
    const VIOLET = '#EE82EE';
    const YELLOW = '#FFFF00';

    /**
     * The hex value of the generated colors
     *
     * @var string
     */
    private $value;

    /**
     * Constructor to create new color
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = '#' . $value;
    }

    /**
     * Get the hex value of the generated color
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
