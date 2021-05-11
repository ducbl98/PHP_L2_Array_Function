<?php
function countCharacterString($str,$char): int
{
    $count=0;
    for($i=0;$i<strlen($str);$i++){
        if($str[$i]===$char){
            $count++;
        }
    }
    return $count;
}
$str="abacacafahjcabajckjcakcajcja";
echo countCharacterString($str,"c");