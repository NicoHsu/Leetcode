<?php

// Easy
/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
       $this->val = $val;
       $this->next = $next;
   }
}

class Solution {

    /**
     * using recursion
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoListsRecursion($l1, $l2) {
        if(is_null($l1)) return $l2;
        if(is_null($l2)) return $l1;
        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }

    /**
     * using iteration
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoListsIteration($l1, $l2) {
        $node = $handler = new ListNode();
        while(!is_null($l1) && !is_null($l2)) {
            if ($l1->val < $l2->val) {
                $handler->next = $l1;
                $l1 = $l1->next;
            } else {
                $handler->next = $l2;
                $l2 = $l2->next;
            }
            $handler = $handler->next;
        }

        if(is_null($l1)) {
            $handler->next = $l2;
        } else if(is_null($l2)) {
            $handler->next = $l1;
        }

        return $node->next;
    }
}

// Input: l1 = [1,2,4], l2 = [1,3,4]
// Output: [1,1,2,3,4,4]

$l1 = new ListNode(1, new ListNode(2, new ListNode(4)));
$l2 = new ListNode(1, new ListNode(3, new ListNode(4)));

$s = new Solution();
var_dump($s->mergeTwoListsIteration($l1, $l2));