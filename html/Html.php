<?php

namespace lib\html;

use lib\collection\ArrayList;
use lib\collection\DomNode;
use lib\model\entity\Entity;

/**
 * Class Html.
 *
 * @package lib\html
 * @author Daniel Peters
 * @version 1.0
 */
class Html extends Entity implements DomNode {
	private $tagName;
	private $text;
	private $classList;
	private $attributes;
	private $children;

	public function __construct( Tag $tagName ) {
		parent::__construct( '' );
		$this->tagName    = $tagName;
		$this->text       = '';
		$this->classList  = new ArrayList();
		$this->attributes = new ArrayList();
		$this->children   = new ArrayList();
	}

	public function getHtml(): string {
		$content = '';

		if ( $this->children->isEmpty() ) {
			$content = $this->text;
		} else {
			$this->children->each(
				function ( Html $element ) use ( &$content ) {
					$content .= $element->getHtml();
				}
			);
		}

		return '<' . $this->tagName . '' .
		       ( ( $this->getId() !== '' ) ? ' id="' . $this->getId() . '" ' : '' ) .
		       ( ( ! $this->classList->isEmpty() ) ? 'class="' . implode( ' ', $this->classList->toArray() ) . '"' : '' ) . '>' .
		       $content .
		       '</' . $this->tagName . '>';
	}

	public function getTagName(): string {
		return $this->tagName;
	}

	public function setTagName( string $tagName ): void {
		$this->tagName = $tagName;
	}

	public function getText(): string {
		return $this->text;
	}

	/**
	 * Replace content with the passed string.
	 *
	 * @param string $text
	 */
	public function setText( string $text ): void {
		$this->text = $text;
	}

	public function getClassList(): ArrayList {
		return $this->classList;
	}

	public function getAttributes(): ArrayList {
		return $this->attributes;
	}

	public function getChildren(): ArrayList {
		return $this->children;
	}

	/**
	 * Append a string to the content of this tag.
	 *
	 * @param string $text
	 */
	public function appendText( string $text ) {
		$this->text .= $text;
	}
}
