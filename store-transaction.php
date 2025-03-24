<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'travelconnect';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive and decode the JSON data sent from the client
$data = json_decode(file_get_contents('php://input'), true);

// Validate the required fields
if (empty($data['amount']) || empty($data['paymentMethod'])) {
    http_response_code(400);
    echo 'Invalid request';
    exit;
}

// Prepare the SQL statement to insert the transaction data into the database
$sql = "INSERT INTO transactions (amount, paymentMethod) VALUES (?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ds", $amount, $paymentMethod);

// Set the values for the parameters
$amount = $data['amount'];
$paymentMethod = $data['paymentMethod'];

// Execute the statement
if ($stmt->execute()) {
    // Return success response
    echo 'Transaction stored successfully.';
} else {
    // Return error response
    http_response_code(500);
    echo 'Error storing transaction.';
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
