<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $x=$_GET['x'];
    $y=$_GET['y'];
    try {
        if($y==0){
            throw new Exception("Y can't be equal zero");
        }
        echo "sum : ".($x+$y)."<br>";
        echo "sub : ".($x-$y)."<br>";
        echo "mul : ".($x*$y)."<br>";
        echo "div : ".($x/$y)."<br>";
    }catch (Exception $e){
        echo "Error :".$e->getMessage();
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
    <title>Calculator</title>
</head>
<body>
<h2>Calculator</h2>
<form method="get">
    <fieldset style="width: 30%">
        <legend>Operand</legend>
        X : <input type="number" name="x" size="30"><br>
        Y : <input type="number" name="y" size="30"><br>
        <input type="submit" value="Calculate">
    </fieldset>
</form>
</body>
</html>
