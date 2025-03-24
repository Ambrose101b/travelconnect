<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic client-side validation
    if (empty($email) || empty($password)) {
        echo "Please enter both email and password.";
    } else {
        // Perform login verification
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                // Login successful
                echo "Login successful!";
                // Redirect to the dashboard page or perform any other actions
            } else {
                // Invalid password
                echo "Invalid email or password.";
            }
        } else {
            // User not found
            echo "Invalid email or password.";
        }

        // Close the statement
        $stmt->close();
    }
}

$conn->close();
?>
