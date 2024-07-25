<?php
include 'dbConnection.php';

//Session
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Secure SQL query using prepared statements
    $stmt = $conn->prepare("SELECT StudentId, StudentName FROM students WHERE StudentName = ? AND StudentPassword = ?");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ss", $username, $password);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($StudentId, $StudentName);

    // Fetch values
    if ($stmt->fetch()) {
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();

         // Save user information in the session
        $_SESSION['StudentId'] = $StudentId;
        $_SESSION['StudentName'] = $StudentName;

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Please enter username/password correctly";
    }

    // Close statement
    $stmt->close();
} else {
    echo "This method only allows POST Request";
}

// Close connection
$conn->close();
?>
