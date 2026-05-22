<?php

// Database Configuration

$host = "localhost";
$user = "root";
$password = "";
$database = "recommendation_system";


// Create Database Connection

$conn = mysqli_connect($host, $user, $password, $database);


// Check Connection

if (!$conn) {

    die("Connection Failed: " . mysqli_connect_error());

}


// Optional Success Message
// echo "Database Connected Successfully";

?>

