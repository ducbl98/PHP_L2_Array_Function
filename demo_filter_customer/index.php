<?php
echo 'PHP version: ' . phpversion();
$customerList = [
    "0" => [
        "name" => "Edward Newgate",
        "day_of_birth" => "1948/04/06",
        "address" => "Sphinx",
        "profile" => "images/img1.png"],
    "1" => [
        "name" => "Kaido",
        "day_of_birth" => "1961/05/01",
        "address" => "Wano",
        "profile" => "images/img2.png"],
    "2" => [
        "name" => "Charlotte Katakuri",
        "day_of_birth" => "1978/08/22",
        "address" => "Komuri Island",
        "profile" => "images/img3.png"],
    "3" => [
        "name" => "Monkey D. Luffy",
        "day_of_birth" => "2000/05/05",
        "address" => "Foosha Village",
        "profile" => "images/img4.png"],
    "4" => [
        "name" => "Rornoa Zoro",
        "day_of_birth" => "1998/11/11",
        "address" => "Shimotsuki Village",
        "profile" => "images/img5.png"]
];
function searchByDate($customers, $fromDate, $toDate)
{
    if (empty($fromDate) || empty($toDate)) {
        return $customers;
    }
    $filteredCustomer = [];
    foreach ($customers as $customer) {
        if (strtotime($customer['day_of_birth']) < strtotime($fromDate))
            continue;
        if (strtotime($customer['day_of_birth']) > strtotime($toDate))
            continue;
        $filteredCustomer[] = $customer;
    }
    return $filteredCustomer;
}

$fromDate = null;
$toDate = null;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $fromDate = $_GET['from'];
    $toDate = $_GET['to'];
}
$filteredCustomer = searchByDate($customerList, $fromDate, $toDate);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filter Customer</title>
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
        table{
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
<form>
    Select date of birth from
    <input type="date" name="from" id="from" placeholder="yyyy/mm/dd" value="">
    to
    <input type="date" name="to" id="to" placeholder="yyyy/mm/dd" value="">
    <input type="submit" id="submit" value="Filter">
</form>
<table border="1">
    <caption><h2>Customer List</h2></caption>
    <tr>
        <td>Numerical Order</td>
        <td>Name</td>
        <td>Day of birth</td>
        <td>Address</td>
        <td>Image</td>
    </tr>
    <?php foreach ($filteredCustomer as $index => $customer): ?>
        <tr>
            <td><?php echo $index+1 ; ?></td>
            <td><?php echo $customer['name']; ?></td>
            <td><?php echo $customer['day_of_birth']; ?></td>
            <td><?php echo $customer['address']; ?></td>
            <td>
                <div class="profile"><img src="<?php echo $customer['profile']; ?> " alt="Image Error"></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
