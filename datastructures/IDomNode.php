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
    public function getName(): string;

    public function getText(): string;

    public function getChildren(): ArrayList;

    public function getClasses(): ArrayList;

    public function getAttributes(): ArrayList;

    public function getHtml();

    public function setName(string $name);

    public function setText(string $text);
}
