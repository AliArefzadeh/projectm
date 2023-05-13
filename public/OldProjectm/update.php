

<?php
include "config.php";

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

$sql = "select * from project where 1 "; //نوشتن درخواست
$result = $mysqli->query($sql); // ارسال درخواست
$project = $result->fetch_all(1);

$e = end($project);

//برای بخش کردن زمان به دو بخش
$parts = explode(" ", "$e[time]");
$ldate = $parts[0];//اخرین تاریخ ارسالی
$ltime = $parts[1];// اخرین زمان ارسالی
echo "<br>";

echo " <div class='clearfix'></div>";

echo "<div style='display: inline-flex'>";


echo "<div class='inblock' style='direction: ltr' >reletive humidity :  </div>";

echo "<div class='last-update inblock'>";
echo "$e[humidity]" . " %RH";
echo "</div>";

echo "<div class='loader' style='margin-left: 15px'></div>";

echo "</div>";

?>
