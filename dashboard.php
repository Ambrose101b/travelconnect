<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userName'])) {
    header('Location: login.php');
    exit;
}

// Get the user ID from the URL
if (isset($_GET['id'])) {
    $userID = $_GET['id'];
} else {
    // Redirect to an error page or handle the case when the ID is not provided
    // For example:
    header('Location: error.php');
    exit;
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the user's name based on the provided ID
$stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userName = $row['name'];
} else {
    // Handle the case when the user ID is not found
    // For example:
    $userName = 'Unknown User';
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Add your CSS stylesheets and other head elements here -->
</head>
<body>
    <h1>Welcome, <?php echo $userName; ?></h1>
    <!-- Add your dashboard content here -->
    <p>This is the dashboard page. You can add your content and functionality here.</p>
    <p>Logged in as: <?php echo $_SESSION['userName']; ?></p>
    <a href="logout.php">Logout</a>
    <!-- Add your JavaScript files and other body elements here -->
</body>
</html>
