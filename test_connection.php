<?php
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = "muyah"; // Default password is empty, unless you set one
$port = 3307; // Use port 3307

// Create connection
$conn = new mysqli($servername, $username, $password, "", $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to MySQL on port 3307!";
?>
