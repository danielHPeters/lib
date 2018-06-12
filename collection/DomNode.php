<?php

namespace rafisa\lib\collection;

/**
 * Interface DomNode.
 *
 * @package rafisa\lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
interface DomNode {
	public function getName(): string;

	public function getText(): string;

	public function getChildren(): ArrayList;

	public function getClasses(): ArrayList;

	public function getAttributes(): ArrayList;

	public function getHtml(): string;

	public function setName( string $name ): void;

	public function setText( string $text ): void;
}
