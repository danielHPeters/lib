<?php

namespace rafisa\lib\data;

/**
 * Description of Node
 *
 * @author  Daniel
 * @version 1.0
 */
class TreeNode
{
    /**
     *
     * @var TreeNode
     */
    private $left;

    /**
     *
     * @var TreeNode
     */
    private $right;

    /**
     *
     * @var
     */
    private $value;

    /**
     *
     * @param string   $value
     * @param TreeNode $left
     * @param TreeNode $right
     */
    public function __construct($value, TreeNode $left = null, TreeNode $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    public function getLeft(): TreeNode
    {
        return $this->left;
    }

    public function getRight(): TreeNode
    {
        return $this->right;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setLeft(TreeNode $left)
    {
        $this->left = $left;
    }

    public function setRight(TreeNode $right)
    {
        $this->right = $right;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function isLeaf(): bool
    {
        return $this->left === null && $this->right === null;
    }
}
