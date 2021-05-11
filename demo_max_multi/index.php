<?php
function findMinArray($arr)
{
    $max = 0;
    for ($i = 1; $i < count($arr); $i++) {
        for ($j = 0; $j <count($arr[$i]);$j++){
            if ($arr[$i][$j] > $max) {
                $max = $arr[$i][$j];
            }
        }
    }
    return $max;
}

$arr = [[1,2],[2, 3], [4,1], [1,5], [0,43],[1,3], [21,0],[ 12,3]];
echo findMinArray($arr);
