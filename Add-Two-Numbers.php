<?php

/** Medium */

/**
 * Definition for a singly-linked list.
 *
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

    private $carry = 0;
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $result = new ListNode($l1->val + $l2->val + $this->carry);
        $this->carry = 0;
        if ($result->val > 9) {
            $this->carry = 1;
            $result->val += - 10;
        }

        if ($this->carry || !is_null($l1->next) || !is_null($l2->next)) {
            $result->next = $this->addTwoNumbers($l1->next, $l2->next);
        }
        return $result;
    }
}

// [2,4,3]
// [5,6,4]
$l1 = new ListNode(2);
$l2 = new ListNode(4);
// $l3 = new ListNode(6);

$l1->next = $l2;
// $l2->next = $l3;

$l4 = new ListNode(5);
$l5 = new ListNode(6);
$l6 = new ListNode(9);

$l4->next = $l5;
$l5->next = $l6;

$a = new Solution();
var_dump($a->addTwoNumbers($l1, $l4));
