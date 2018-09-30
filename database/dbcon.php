<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";

$con = new mysqli($servername, $username, $password);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$sql = "CREATE DATABASE dbname";
if ($con->query($sql) === TRUE) {
    return 1;
} else {
    return 0;
}

$con->close();
?>