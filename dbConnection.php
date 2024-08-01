<?php
function getDBConnection() {
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_db_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
