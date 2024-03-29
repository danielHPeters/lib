<?php

namespace lib\collection;

/**
 * Interface DomNode.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
interface DomNode {
  public function getTagName (): string;

  public function getText (): string;

  public function getChildren (): ArrayList;

  public function getClassList (): ArrayList;

  public function getAttributes (): HashMap;

  public function getHtml (): string;

  public function setTagName (string $name): void;

  public function setText (string $text): void;
}
