<?php

class Solution {

    // Runtime: 12 ms, faster than 80.45% of PHP online submissions for Two Sum.
    // Memory Usage: 16.3 MB, less than 10.41% of PHP online submissions for Two Sum.

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $hashTable = [];
        foreach($nums as $index => $each) {
            if (isset($hashTable[$each])) {
                $hashTable[$each][count($hashTable[$each])]= $index;
            } else {
                $hashTable[$each][0] = $index;
            }
        }

        foreach($nums as $each) {
            $y = $target - $each;
            if (isset($hashTable[$y])) {
                if ($y == $each && count($hashTable[$y]) == 1) {
                    continue;
                }
                return [current($hashTable[$each]), end($hashTable[$y])];
            }
        }
        return [];
    }

    // Runtime: 12 ms, faster than 80.45% of PHP online submissions for Two Sum.
    // Memory Usage: 15.8 MB, less than 68.77% of PHP online submissions for Two Sum.

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum2($nums, $target) {
        $hashTable = [];
        foreach($nums as $index => $each) {
            $y = $target - $each;
            if (isset($hashTable[$y]) && $index != $hashTable[$y]) {
                return [$index, $hashTable[$y]];
            }
            $hashTable[$each] = $index;
        }
        return [];
    }
}

$nums = [3,2,4];
$target = 6;
$solution = new Solution();
var_dump($solution->twoSum($nums, $target));