<?php

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        if ($x == 0) {
            return 0;
        }
        $strX = strval($x);
        $chars = str_split($strX);
        $reversedX = '';
        foreach($chars as $char) {
            $reversedX = $char . $reversedX;
        }
        var_dump($reversedX);
        $ouput = (int)$reversedX;
        var_dump($ouput);
        $binLen = strlen(decbin($ouput));
        var_dump($binLen);
        if ($x > 0) {
            if ($binLen <= 31) {
                return $ouput;
            } else {
            return 0;
            }
        } else {
            if ($binLen <= 31) {
                return $ouput * -1;
            } else {
            return 0;
            }
        }
    }
}

$solution = new Solution();
var_dump($solution->reverse(1463847412));