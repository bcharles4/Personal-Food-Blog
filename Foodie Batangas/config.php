<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "foodie_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>