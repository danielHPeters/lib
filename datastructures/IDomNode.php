<?php

namespace rafisa\lib\data;

use rafisa\lib\collections\ArrayList;

/**
 *
 * @author  d.peters
 * @version 1.0
 */
interface IDomNode
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return ArrayList
     */
    public function getChildren(): ArrayList;

    /**
     * @return ArrayList
     */
    public function getClasses(): ArrayList;

    /**
     * @return ArrayList
     */
    public function getAttributes(): ArrayList;

    /**
     * @return mixed
     */
    public function getHtml();

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     * @param string $text
     * @return mixed
     */
    public function setText(string $text);
}
