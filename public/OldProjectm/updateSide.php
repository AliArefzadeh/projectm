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

$s = $e["num"]; //مقدار عددی اخری ارایه
echo " <div class='task'>";
echo "<div class='headt'>humidity</div>";
echo "<div> time</div>";
echo "<div class=\"clearfix\"></div>";
echo "</div>";

for ($i = 7; $i > 1; $i--) {
    $v = $project[$s - $i];
    echo " <div class='task'>";
    echo "<div class='head'>$v[humidity] %RH</div>";
    echo " <div> $v[time]</div>";
    echo "<div class=\"clearfix\"></div>";
    echo "</div>";

}


/*

foreach ($project as $value) {
    echo "<tr>";
        echo "<td>$value[humidity]</td>";
        echo "<td>$value[time]</td>";

    echo "</tr>";
}
*/
?>
