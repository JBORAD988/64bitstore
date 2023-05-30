<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "64bitstore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
//    echo "connection ok";
} else {
    echo "error" . mysqli_connect_error();
}
?>