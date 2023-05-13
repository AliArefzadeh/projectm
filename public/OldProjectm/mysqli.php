
<?php
require_once 'config.php';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


//chek connection

if ($mysqli->connect_errno) {
    printf("connect failed: %s\n", $mysqli->connect_error);
    exit();

}

$sql = "select * from project where 1 ";
$result = $mysqli->query($sql);



//این پایینی اصل کاریه
//اگر توی fetch_all هیچی نذارم با 0و1و2 نشون میده اما اگر توش 1 بذارم
//خوده num , humidity , time و بهم نشون میده
$project = $result->fetch_all(1);

echo "<br><br>" . "مقادیر داخل آرایه";
echo "<table>";
echo "<tr>";
echo "<th>num</th>";
echo "<th>humidity</th>";
echo "<th>time</th>";
echo "</tr>";

foreach ($project as $value) {
    echo "<tr>";
    foreach ($value as $in) {
        echo "<td>$in</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "<br><br>مقدار آخرین آرایه<br>";

$e = end($project);
foreach ($e as $in) {
    echo "$in / ";
}


echo "<br><br>تعداد نتایج برگردانده شده <br>";
echo $result->num_rows;
echo "<br><br>";

echo "connected successfully to database <b>$dbName</b>. (Using mysqli_connect)<br>";

$mysqli->close();

?>

