<?php
$servername = "localhost";
$username = "replace_with_your_username";
$password = "replace_with_your_password";
$dbName = 'your_db_name';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

return $conn;
?>