<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $tripType = $_POST["trip_type"];
    $departureCity = $_POST["departure_city"];
    $destinationCity = $_POST["destination_city"];
    $date = $_POST["date"];
    $returnDate = $_POST["return_date"];
    $passengers = $_POST["passengers"];

    // Store data in 'trips' table
    $stmt = $conn->prepare("INSERT INTO trips (trip_type, departure_city, destination_city, date, return_date, passengers) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $tripType, $departureCity, $destinationCity, $date, $returnDate, $passengers);
    $stmt->execute();

    // Check if data was successfully inserted
    if ($stmt->affected_rows > 0) {
        $message = "Trip information stored successfully.";
        header("Location: travel-detail.php?message=" . urlencode($message));
        exit;
    } else {
        $message = "Error storing trip information.";
        header("Location: travel-detail.php?message=" . urlencode($message));
        exit;
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
