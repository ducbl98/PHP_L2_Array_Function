<?php

function sumColumn($arr,$col): int
{
    $sumColumn = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sumColumn += $arr[$i][$col];
    }
    return $sumColumn;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $m = $_GET['m'];
    $n = $_GET['n'];
    $col = $_GET['col'];
    $arr = [];
    for ($i = 0; $i < $m; $i++) {
        $arr[$i] = [];
        for ($j = 0; $j < $n; $j++) {
            $arr[$i][$j] = rand(1, 5);
        }
    }

    print_r($arr);
    echo "Sum Column ".$col." is ".sumColumn($arr,$col);
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
<h2>Sum Column</h2>
<form method="get">
    <input type="number" name="m" placeholder="Input number row of matrix" size="7">
    <input type="number" name="n" placeholder="Input number column of matrix" size="7">
    <input type="number" name="col" placeholder="Input column to sum" size="5">
    <input type="submit" value="Compute">
</form>
</body>
</html>

