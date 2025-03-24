<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic client-side validation
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already exists. Please choose a different email.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the user into the database with the hashed password
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);
            $stmt->execute();

            // Get the id of the inserted user
            $id = $stmt->insert_id;

            // Assign the id to the session variable
            $_SESSION['id'] = $id;

            echo "Signup successful!";
            // Redirect to the login page or perform any other actions
            header("Location: signup-success.php?userid=$id");
            exit;

            // Close the statement
            $stmt->close();
        }
    }
}

$conn->close();
?>
