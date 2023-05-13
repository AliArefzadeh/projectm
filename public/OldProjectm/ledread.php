<?php

include "config.php";

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$sql = "select * from oddeven where 1 "; //نوشتن درخواست
$result = $mysqli->query($sql); // ارسال درخواست

    $oddEven = $result->num_rows;
    $check = $oddEven % 2 == 0;


	
    if ($check) {
        echo"x";
    } else {
        echo"y";
    }


