<?php
$nameErr = NULL;
$emailErr = NULL;
$phoneErr = NULL;
$name = NULL;
$email = NULL;
$phone = NULL;

function loadRegistrationList($filename){
    $json_data=file_get_contents($filename);
    return json_decode($json_data,true);
}
function saveDataJSON($filename,$name, $email, $phone){
    try {
        $contact=['name'=>$name,'email'=> $email,'phone'=> $phone];
        $arr_data=loadRegistrationList($filename);
        array_push($arr_data,$contact);
        $json_data=json_encode($arr_data,JSON_PRETTY_PRINT);
        file_put_contents($filename,$json_data);
        echo "Save Data Successfully";
    }catch (Exception $e){
        echo "Error : ".$e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $has_error = false;

    if (empty($name)) {
        $nameErr = "Name Can't Be Empty";
        $has_error = true;
    }

    if (empty($phone)) {
        $phoneErr = "Phone Can't Be Empty";
        $has_error = true;
    }

    if (empty($email)) {
        $emailErr = "Email Can't Be Empty";
        $has_error = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Wrong email format (xxx@xxx.xxx)!";
        $has_error = true;
    }

    if($has_error===false){
        saveDataJSON("data.json",$name,$email,$phone);
        $name=null;
        $email=null;
        $phone=null;
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
    <title>User Register</title>
    <style>
        fieldset {
            width: 30%;
        }
        error {
            color: #FF0000;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: solid 1px #ccc;
        }
        form{
            width: 450px;
        }
    </style>
</head>
<body>
<h2>Registration Form</h2>
<form method="post">
    <fieldset>
        <legend>Detail</legend>
        Username : <input name="name" type="text" placeholder="name" id="name" value="<?php echo $name ?>">
        <span class="error">* <?php echo $nameErr; ?></span><br>
        Email : <input name="email" type="text" placeholder="email" id="email" value="<?php echo $email ?>">
        <span class="error">* <?php echo $emailErr ?></span><br>
        Phone Number : <input name="phone" type="text" placeholder="phone" id="phone" value="<?php echo $phone ?>">
        <span class="error">* <?php echo $phoneErr ?></span><br>
        <input type="submit" value="Sign Up">
        <p><span class="error">* Required Field.</span></p>
    </fieldset>

    <?php
    $registrations = loadRegistrationList('data.json');
    ?>
    <h2>Registration list</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php foreach ($registrations as $registration): ?>
            <tr>
                <td><?= $registration['name']; ?></td>
                <td><?= $registration['email']; ?></td>
                <td><?= $registration['phone']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>
