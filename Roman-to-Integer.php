<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $rule = [
          'I' => 1,
          'V' => 5,
          'X' => 10,
          'L' => 50,
          'C' => 100,
          'D' => 500,
          'M' => 1000            
        ];
        $chars = str_split($s);
        $lastChar = '';
        $total = 0;
        foreach ($chars as $char) {
        	if(!empty($lastChar) && $rule[$lastChar] < $rule[$char]) {    
        		$total = $total + $rule[$char] - 2 * $rule[$lastChar];
        	} else {
        		$total += $rule[$char];
        		$lastChar = $char;
        	}
        }

        return $total;
    }
}

$test = new Solution();
$result = $test->romanToInt('XXXVIV');

var_dump($result);