<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>

<div class="menu" style="background-color: #55d4d4; padding: 5px;text-align: center">

    <form method="get" style="margin-bottom: 25px">
        <label>enter humidity :</label>
        <!--<input type="number" name="humid" >
        <button id="btn1" value="submit">Save</button>
        <button id="clearNum" type="reset">Clear</button>-->
		<div>
        <input type="file">
		<input type="submit">
    </div>
    </form>
</div>

<?php

include 'config.php';
//متغیری برای ارسال دیتا جدید
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


$a = 0;
$a = (boolean)$a;

if (isset($_GET['humid']) && is_numeric($_GET['humid'])) {

    foreach ($_GET as $key => $val) {
$send="INSERT INTO `project`(`humidity`) VALUES ($val)";
      //  $conn->query($send);

        if ($conn->query($send) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $send . "<br>" . $conn->error;
        }

    }
}


$conn->close();

?>






</body>
</html>
