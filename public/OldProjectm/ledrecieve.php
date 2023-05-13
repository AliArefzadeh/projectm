<?php
include "config.php";

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$led=$_GET['onoff'];
$send="INSERT INTO `oddeven`(`led`) VALUES ($led)";
$mysqli->query($send);


$sql = "select * from oddeven where 1 "; //نوشتن درخواست
$result = $mysqli->query($sql); // ارسال درخواست

$oddEven=$result->num_rows;
$check=$oddEven % 2 == 0;


    if ($check){

        echo " <div style=\"border-radius: 10px; background-color: #62e829;margin-left: 10px;padding: 5px; width:65%;display: inline-block \"> on </div>";

    }else{
        echo "<div style=\"border-radius: 10px; background-color: #B51945;margin-left: 10px;padding: 5px; width:65%;display: inline-block \"> off </div>";

    }

