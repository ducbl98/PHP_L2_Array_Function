<?php
function removeElement($arr, $element)
{
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $element) {
            array_splice($arr, $i, 1);
            $i--;
        }
    }
    return $arr;
}
$arr=[1,0,2,1,0,1,0,2,0,3,0,4,5,0,6,1,1,1,7];
print_r(removeElement($arr,1));