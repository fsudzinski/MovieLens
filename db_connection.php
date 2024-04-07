<?php
$address = "localhost";
$username = "root";
$password = "";
$db_name = "movie-lens";

$conn = mysqli_connect($address, $username, $password, $db_name);
if (!$conn) {
    die("Connection error" . mysqli_connect_error());
}
?>