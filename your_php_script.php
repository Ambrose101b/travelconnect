<?php
include 'config.php';

// Assuming you have already established a database connection
$mysqli = new mysqli("localhost", "root", "", "travelconnect");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    // Sanitize the data to prevent SQL injection or other malicious attacks
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form input values
    $id = sanitizeInput($_POST['id']);
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $message = sanitizeInput($_POST['message']);

    // Validate the input data (you can add more validation if needed)
    if (empty($id) || empty($name) || empty($email) || empty($message)) {
        echo 'Please fill in all the required fields.';
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO help (id, name, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("isss", $id, $name, $email, $message);

        if ($stmt->execute()) {
            echo 'Help request sent!';
        } else {
            echo 'Error: ' . $stmt->error;
        }

        $stmt->close();
        $mysqli->close();
    }
}
?>
