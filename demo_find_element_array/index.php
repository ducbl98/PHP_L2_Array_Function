<?php
function findElement($arr, $index)
{
    if ($index < 0 || $index > count($arr)) {
        throw new Exception("Out Of Index Of Array");
    }
    return $arr[$index];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $index = $_GET['index'];
    $arr=[];
    for ($i = 0; $i < 100; $i++) {
        $arr[$i] = rand(1, 100);
    }
    print_r($arr);
    try {
        echo "Element ".$index." is ".findElement($arr,$index);
    }catch (Exception $e){
        echo "Error : ".$e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find Element</title>
</head>
<body>
<h2>Find Element</h2>
<form method="get">
    <input type="number" name="index" placeholder="Input index you want to find" size="7"><br>
    <input type="submit" value="Find">
</form>
</body>
</html>

