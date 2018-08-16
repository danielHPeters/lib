<?php

namespace lib\html;

use lib\collection\ArrayList;
use lib\collection\DomNode;
use lib\collection\HashMap;

/**
 * Class Html.
 *
 * @package lib\html
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Html implements DomNode {
  /**
   * @var string Element ID
   */
  private $id;
  /**
   * @var string Tag name listed in Tag enum.
   */
  private $tagName;
  /**
   * @var string Equivalent of textContent property of a HtmlElement
   */
  private $text;
  /**
   * @var ArrayList
   */
  private $classList;
  /**
   * @var HashMap
   */
  private $attributes;
  /**
   * @var ArrayList
   */
  private $children;

  /**
   * Html constructor.
   *
   * @param string $tagName
   */
  public function __construct(string $tagName) {
    $this->id = '';
    $this->tagName    = $tagName;
    $this->text       = '';
    $this->classList  = new ArrayList();
    $this->attributes = new HashMap();
    $this->children   = new ArrayList();
  }

  public function getHtml(): string {
    $content = '';
    $attributes = '';

    if ($this->children->isEmpty()) {
      $content = $this->text;
    } else {
      $this->children->each(
        function (Html $element) use (&$content) {
          $content .= $element->getHtml();
        }
      );
    }

    if (!$this->attributes->isEmpty()) {
      $attrs = $this->attributes->toArray();
      foreach ($attrs as $key => $value) {
        $attributes .= ' ' . $key . '="' . $value . '"';
      }
    }

    return '<' . $this->tagName . '' .
      (($this->getId() !== '' ) ? ' id="' . $this->getId() . '" ' : '') .
      (( ! $this->classList->isEmpty()) ? 'class="' . implode(' ', $this->classList->toArray()) . '"' : '')
      . $attributes . '>' .
      $content .
      '</' . $this->tagName . '>';
  }

  /**
   * @return string
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * @param string $id
   */
  public function setId(string $id): void {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getTagName(): string {
    return $this->tagName;
  }

  /**
   * @param string $tagName
   */
  public function setTagName(string $tagName): void {
    $this->tagName = $tagName;
  }

  /**
   * @return string
   */
  public function getText(): string {
    return $this->text;
  }

  /**
   * Replace content with the passed string.
   *
   * @param string $text
   */
  public function setText(string $text): void {
    $this->text = $text;
  }

  /**
   * @return ArrayList
   */
  public function getClassList(): ArrayList {
    return $this->classList;
  }

  /**
   * @return HashMap
   */
  public function getAttributes(): HashMap {
    return $this->attributes;
  }

  /**
   * @return ArrayList
   */
  public function getChildren(): ArrayList {
    return $this->children;
  }

  /**
   * Append a string to the content of this tag.
   *
   * @param string $text
   */
  public function appendText(string $text) {
    $this->text .= $text;
  }
}
