<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the insert statement
$stmt = $conn->prepare("INSERT INTO trips (trip_type, departure_city, destination_city, date, return_date, passengers) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $tripType, $departureCity, $destinationCity, $date, $returnDate, $passengers);

// Get the form data
$tripType = $_POST['trip-type'];
$departureCity = $_POST['from'];
$destinationCity = $_POST['to'];
$date = $_POST['date'];
$returnDate = $_POST['return-date'];
$passengers = $_POST['passengers'];

// Execute the insert statement
if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
