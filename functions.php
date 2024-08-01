<?php
include 'dbConnection.php';
//Write all your functions to be used all over the application
session_start();

function logout() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit;
}

function getCourses() {
    // Secure SQL query using prepared statements
   $conn = getDBConnection();
   $stmt = $conn->prepare("SELECT c.CourseName FROM courses c");

   
   if ($stmt === false) {
       die('Prepare failed: ' . $conn->error);
   }

   // Execute statement
   $stmt->execute();

   // Bind result variables
   $stmt->bind_result($CourseName);

   // Fetch values
   $courses = [];
   while ($stmt->fetch()) {
       $courses[] = $CourseName;
   }

   // Close statement and connection
   $stmt->close();
   $conn->close();

   return $courses;
}
?>