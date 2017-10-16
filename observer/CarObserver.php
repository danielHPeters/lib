<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\observer;

/**
 * Description of CarObserver
 *
 * @author d.peters
 */
class CarObserver implements IObserver
{
    private $tag;
    private $contents;

    public function __construct()
    {
        $this->tag = 'strong';
    }

    public function update(Observable $obj, $args = null)
    {
        $this->contents = $obj->getName();
    }

    public function getHtml(): string
    {
        return '<' . $this->tag . '>' . $this->contents . '</' . $this->tag . '>';
    }
}
