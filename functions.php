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

// Function to fetch all courses or search courses
function getCourses($searchTerm = null) {
    $conn = getDBConnection();

    if ($searchTerm) {
        // Prepare statement for search
        $stmt = $conn->prepare("SELECT c.CourseName FROM courses c WHERE c.CourseName LIKE ?");
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
        $likeTerm = '%' . $searchTerm . '%';
        $stmt->bind_param("s", $likeTerm);
    } else {
        // Prepare statement to fetch all courses
        $stmt = $conn->prepare("SELECT c.CourseName FROM courses c");
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
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


function getTutors(){
    // Secure SQL query using prepared statements
   $conn = getDBConnection();
   $stmt = $conn->prepare("SELECT t.TutorName,t.Designation FROM tutors t");

   
   if ($stmt === false) {
       die('Prepare failed: ' . $conn->error);
   }

   // Execute statement
   $stmt->execute();

   // Bind result variables
   $stmt->bind_result($TutorName,$Designation);

   // Fetch values
   $tutors = [];
    while ($stmt->fetch()) {
        $tutors[] = [ //For multiple values, a new value stored everytime in  a new array
            'name' => $TutorName,
            'designation' => $Designation
        ];
    }

   // Close statement and connection
   $stmt->close();
   $conn->close();
   return $tutors;

}


?>