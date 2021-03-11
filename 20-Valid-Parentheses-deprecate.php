<?php

class Solution {

    private $left = [
        '(' => 1,
        '{' => 2,
        '[' => 3
    ];
    private $right = [
        ')' => 1,
        '}' => 2,
        ']' => 3
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

        $validate = false;
        $leftStr = '';
        $rightStr = '';
        $pairLen = 0;
        for ($i = 0; $i < $len; $i++) {
            if (is_null($this->left[$s[$i]])) {
                if ($pairLen == 0) {
                    $validate = false;
                    break;
                }
                for($j = 0; $j < $pairLen; $j++) {
                    $right = $this->right[$s[$i + $j]];
                    if (is_null($right)) {
                        $validate = false;
                        break;
                    }
                    $rightStr = $right . $rightStr;
                }
                if (strcmp($leftStr, $rightStr) != 0) {
                    $validate = false;
                    break;
                }
                $i += $pairLen - 1;
                $leftStr = '';
                $rightStr = '';
                $pairLen = 0;
                $validate = true;
            } else {
                $leftStr .= $this->left[$s[$i]];
                $pairLen++;
            }
        }
        return $validate;
    }
}

$str = "(){}";
$s = new Solution();
var_dump($s->isValid($str));