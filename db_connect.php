<?php
// Database connection details
$host = 'localhost'; // or your MySQL server IP address
$username = 'root'; // your MySQL username
$password = 'muyah'; // your MySQL password
$database = 'portfolio_db'; // the name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
