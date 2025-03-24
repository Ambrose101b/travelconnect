<?php
// Assuming you have already established a database connection
$mysqli = new mysqli("localhost", "root", "", "travelconnect");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Retrieve the new balance and user ID from the POST request
$newBalance = $_POST['new_balance'];
$id = $_POST['user_id'];

// Prepare the SQL query to update the balance
$query = "UPDATE users SET balance = ? WHERE id = ?";

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the parameters
$stmt->bind_param("ds", $newBalance, $id);

// Execute the statement
if ($stmt->execute()) {
    echo "success";
} else {
    echo "failure";
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();
?>
