<?php
include "config.php";

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$fyear =$_GET['fyear'];
$fmon =$_GET['fmon'];
$fday =$_GET['fday'];

$lyear =$_GET['lyear'];
$lmon =$_GET['lmon'];
$lday =$_GET['lday'];

$begin = "$fyear-$fmon-$fday";
$end = "$lyear-$lmon-$lday";


$sql = "SELECT * FROM `project` WHERE `time` between '$begin' and '$end'"; //نوشتن درخواست
$result = $mysqli->query($sql); // ارسال درخواست
$project = $result->fetch_all(1);


foreach ($project as $val){
    echo "<div class=\"results\">";
    echo "<div class='result1'>$val[humidity]%RH</div>";
    echo "<div class='result1'>$val[time]</div>";
    echo "<div class=\"clearfix\"></div>";
    echo "</div>";
}


$numbers=$result->num_rows; //تعداد نتایج بازگردانده شده

/*
   <div class="results">
                    <div class='result1'>55 %RH</div>
                    <div class='result1'>2022-09-09 17:52:47</div>
                    <div class="clearfix"></div>
                </div>
*/