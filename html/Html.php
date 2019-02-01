<?php

namespace lib\html;

use lib\collection\ArrayList;
use lib\collection\DomNode;
use lib\collection\HashMap;
use function implode;

/**
 * Class Html.
 *
 * @package lib\html
 * @author Daniel Peters
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

  public function __construct (string $tagName) {
    $this->id = '';
    $this->tagName = $tagName;
    $this->text = '';
    $this->classList = new ArrayList();
    $this->attributes = new HashMap();
    $this->children = new ArrayList();
  }

  public function getHtml (): string {
    $content = '';
    $attributes = '';

    if ($this->children->isEmpty()) {
      $content = $this->text;
    } else {
      $this->children->each(function (Html $element) use (&$content) {
        $content .= $element->getHtml();
      });
    }

    if (!$this->attributes->isEmpty()) {
      $attrs = $this->attributes->toArray();
      foreach ($attrs as $key => $value) {
        $attributes .= ' ' . $key . '="' . $value . '"';
      }
    }

    return '<' . $this->tagName . '' .
      (($this->getId() !== '') ? ' id="' . $this->getId() . '" ' : '') .
      ((!$this->classList->isEmpty()) ? 'class="' . implode(' ', $this->classList->toArray()) . '"' : '')
      . $attributes . '>' .
      $content .
      '</' . $this->tagName . '>';
  }

  public function getId (): string {
    return $this->id;
  }

  public function setId (string $id): void {
    $this->id = $id;
  }

  public function getTagName (): string {
    return $this->tagName;
  }

  public function setTagName (string $tagName): void {
    $this->tagName = $tagName;
  }

  public function getText (): string {
    return $this->text;
  }

  public function setText (string $text): void {
    $this->text = $text;
  }

  public function getClassList (): ArrayList {
    return $this->classList;
  }

  public function getAttributes (): HashMap {
    return $this->attributes;
  }

  public function getChildren (): ArrayList {
    return $this->children;
  }

  public function appendText (string $text) {
    $this->text .= $text;
  }
}
