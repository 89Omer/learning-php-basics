<?php
include 'dbConnection.php';  // Include the database connection
include 'functions.php';  // Include the functions file

session_start();  // Start the session

// Check if the user is logged in
if (!isset($_SESSION['StudentId']) || !isset($_SESSION['StudentName'])) {
    die("You must be logged in to view this page.");
}

$StudentId = $_SESSION['StudentId'];  // Get the Student ID from the session
$StudentName = $_SESSION['StudentName'];  // Get the Student Name from the session

// Prepare the query to fetch courses
$query = "SELECT c.CourseName FROM courses AS c INNER JOIN Allocation AS al ON al.course_id = c.course_id WHERE al.StudentId = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $StudentId);  // Bind the student ID parameter
$stmt->execute();  // Execute the query
$stmt->bind_result($CourseName);  // Bind the result variables
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($StudentName); ?></h1>
        <h2>Your Courses</h2>
        <table>
            <tr>
                <th>Course Name</th>
            </tr>
            <?php while ($stmt->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($CourseName); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <!-- Logout link -->
        <a href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
        <!-- Hidden form for logout -->
        <form id="logout-form" action="" method="POST" style="display:none;">
            <input type="hidden" name="action" value="logout">
        </form>
    </div>
</body>
</html>
<?php
$stmt->close();  // Close the statement
$conn->close();  // Close the connection

// Check if the request method is POST and the action is 'logout'
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
    logout();  // Call the logout function
}
?>
