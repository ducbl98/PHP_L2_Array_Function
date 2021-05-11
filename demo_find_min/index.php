<?php
function findMinArray($arr){
    $min=$arr[0];
    for($i=1;$i<count($arr);$i++){
        if ($arr[$i]<$min){
            $min=$arr[$i];
        }
    }
    return $min;
}
$arr=[1,3,4,1,43,3,21,12];
echo findMinArray($arr);