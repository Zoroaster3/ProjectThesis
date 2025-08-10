<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "student_log";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "Gagal";
    die("error!!!");
}
?>