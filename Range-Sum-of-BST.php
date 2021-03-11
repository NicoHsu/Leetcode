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

    private $data;

    /**
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST($root, $L, $R) {
        $rootNode = new Node($root[0]);
        $index = 0;
        foreach($root as $eachNode) {
            if($index == 0) {
                $index++;
                continue;
            }
            $rootNode->insert($eachNode);
        }
        return $rootNode;
    }
}

class Node {

    private $data;
    private $leftNode;
    private $rightNode;

    function __construct($data) {
        $this->data = $data;
    }

    function insert($val) {
        if($val <= $this->data) {
            if($this->leftNode == null) {
                $this->leftNode = new Node($val);
            } else {
                $this->leftNode->insert($val);
            }
        } else {
            if($this->rightNode == null) {
                $this->rightNode = new Node($val);
            } else {
                $this->rightNode->insert($val);
            }
        }
    }

    function find($val) {
        if($val == $this->data) {
            return 'true';
        }
        if($val <= $this->data) {
            if($this->leftNode == null){
                return 'false';
            }
            return $this->leftNode->find($val);
        } else {
            if($this->rightNode == null) {
                return 'false';
            }
            return $this->rightNode->find($val);
        }
    }

    function inorder(&$arr) {
        if($this->leftNode != null) {
            $this->leftNode->inorder($arr);
        }
        $arr[] = $this->data;
        if($this->rightNode != null) {
            $this->rightNode->inorder($arr);
        }
    }
}

$test = new Solution();
$result = $test->rangeSumBST([
    3,5,7,2,8,4,3,6
], 2,4);
$arr = [];
$result->inorder($arr);
$keyL = array_search(2, $arr);
$keyR = array_search(4, $arr);
$total = 0;
for($i = $keyL; $i <= $keyR; $i++) {
    $total += $arr[$i];
}
print_r($total);