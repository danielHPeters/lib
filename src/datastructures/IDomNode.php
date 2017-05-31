<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\datastructures;

use rafisa\lib\src\collections\ArrayList;

/**
 *
 * @author d.peters
 */
interface IDomNode {

    public function getName(): string;

    public function getText(): string;

    public function getChildren(): ArrayList;

    public function getClasses(): ArrayList;

    public function getAttributes(): ArrayList;

    public function getHtml();

    public function setName(string $name);

    public function setText(string $text);
}
