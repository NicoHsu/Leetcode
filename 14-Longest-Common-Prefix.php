<?php

// Easy

class Solution {
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $commonStr = count($strs) > 0 ? $strs[0] : '';
        foreach ($strs as $str) {
            if($commonStr == $str) {
                continue;
            }
            $compareLen = (strlen($commonStr) > strlen($str)) ? strlen($str) : strlen($commonStr);
            $subLen = $compareLen;
            for($i = 0; $i < $compareLen; $i++) {
                if ($commonStr[$i] != $str[$i]) {
                    if ($i == 0){
                        $commonStr = '';
                    }
                    $subLen = $i;
                    break;
                }
            }
            $commonStr = substr($commonStr, 0, $subLen);
        }
        return $commonStr;
    }
}

$strs = ["ab", "a"];
$s = new Solution();
var_dump($s->longestCommonPrefix($strs));