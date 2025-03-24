<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Edit user form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    // Add more fields as per your user data structure

    // Perform basic client-side validation
    if (empty($userId) || empty($name) || empty($email)) {
        echo "Please enter all required fields.";
    } else {
        // Update user in the database
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $userId);
        $stmt->execute();

        echo "User updated successfully.";

        // Close the statement
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <!-- Add more input fields as per your user data structure -->
        <input type="submit" value="Update User">
    </form>
</body>
</html>
