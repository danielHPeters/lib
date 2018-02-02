<?php

namespace rafisa\lib\data;

/**
 * Description of Node
 *
 * @author  Daniel Peters
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
     * @param string $value
     * @param TreeNode $left
     * @param TreeNode $right
     */
    public function __construct($value, TreeNode $left = null, TreeNode $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return TreeNode
     */
    public function getLeft(): TreeNode
    {
        return $this->left;
    }

    /**
     * @return TreeNode
     */
    public function getRight(): TreeNode
    {
        return $this->right;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param TreeNode $left
     */
    public function setLeft(TreeNode $left)
    {
        $this->left = $left;
    }

    /**
     * @param TreeNode $right
     */
    public function setRight(TreeNode $right)
    {
        $this->right = $right;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isLeaf(): bool
    {
        return $this->left === null && $this->right === null;
    }
}
