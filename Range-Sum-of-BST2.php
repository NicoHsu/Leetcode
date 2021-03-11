<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */


class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST($root, $L, $R) {
        $total = 0;
        $this->insert($root, $L, $R, $total);
        return $total;
    }

    function insert($node, $L, $R, &$total) {
        if(!is_null($node)) {
            if($L <= $node->val && $node->val <= $R) {
                $total += $node->val;
            }
            if($L < $node->val) {
                $this->insert($node->left, $L, $R, $total);
            }
            if($node->val < $R) {
                $this->insert($node->right, $L, $R, $total);
            }
        }
    }
}

