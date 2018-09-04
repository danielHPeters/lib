<?php

namespace lib\collection;

/**
 * Class TreeNode.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class TreeNode {
  /**
   * @var TreeNode
   */
  private $left;
  /**
   * @var TreeNode
   */
  private $right;
  /**
   * @var
   */
  private $value;

  public function __construct ($value, TreeNode $left = null, TreeNode $right = null) {
    $this->value = $value;
    $this->left = $left;
    $this->right = $right;
  }

  public function getLeft (): TreeNode {
    return $this->left;
  }

  public function setLeft (TreeNode $left): void {
    $this->left = $left;
  }

  public function getRight (): TreeNode {
    return $this->right;
  }

  public function setRight (TreeNode $right): void {
    $this->right = $right;
  }

  public function getValue () {
    return $this->value;
  }
}
