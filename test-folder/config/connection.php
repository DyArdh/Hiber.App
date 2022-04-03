<?php 
$server = "localhost";
$database = "hiber.app";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die ("Connection Failed: " .mysqli_connect_error());
}

?>