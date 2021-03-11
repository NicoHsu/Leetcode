<?php

// Easy

class Solution {

    private $pair = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $len = strlen($s);
        if ($len % 2) {
            return false;
        }

        $stack = [];
        for ($i = 0; $i < $len; $i++) {
            $char = $this->pair[$s[$i]];
            if (is_null($char)) {
                $last = array_pop($stack);
                if ($last != $s[$i]) {
                    return false;
                    break;
                }
            } else {
                $stack[] = $char;
            }
        }
        return count($stack) == 0;
    }
}

$str = "((";
$s = new Solution();
var_dump($s->isValid($str));