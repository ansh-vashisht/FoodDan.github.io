<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "demo"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the SQL statement
    if ($stmt->execute()) {
        header("Location: thank you.php");
    } else {
        if ($conn->errno == 1062) {
            echo "Sorry, your feedback couldn't be submitted due to a duplicate entry.";
        } else {
            echo "Sorry, there was an error saving your feedback.";
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

