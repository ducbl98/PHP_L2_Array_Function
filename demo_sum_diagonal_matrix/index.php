<?php
function sumDiagonal($arr): array
{
    $sumLeft=0;
    $sumRight=0;
    for($i=0;$i<count($arr);$i++){
        $sumLeft+=$arr[$i][$i];
        $sumRight+=$arr[$i][count($arr)-$i-1];
    }
    $sum=[];
    $sum['left']=$sumLeft;
    $sum['right']=$sumRight;
    return $sum;
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $n = $_GET['n'];
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = [];
        for ($j = 0; $j < $n; $j++) {
            $arr[$i][$j] = rand(1,10);
        }
    }

    print_r($arr);
    print_r(sumDiagonal($arr));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sum Diagonal</title>
</head>
<body>
<h2>Sum Diagonal</h2>
<form method="get">
    <input type="number" name="n" placeholder="Input the size of matrix">
    <input type="submit" value="Compute">
</form>
</body>
</html>
