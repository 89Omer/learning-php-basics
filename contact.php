<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // For demonstration purposes, we'll just display the submitted data
    echo "<h2>Contact Form Details</h2>";
    echo "Message By: " . $name . "<br>";
    echo "Message Email: " . $email . "<br>";
    echo "Message: " . $message . "<br>";

    // In a real application, you might send this data to an email or save it to a database
}
?>
