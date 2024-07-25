<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = 'univeristy_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

return $conn;
?>