<?php
include 'config.php'; // Assuming you have included the database configuration

// Assuming you have a database connection established
$conn = new mysqli('localhost', 'root', '', 'travelconnect'); // Update with your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    if ($type === "1") {
        $typeText = "One Way";
    } elseif ($type === "2") {
        $typeText = "Round Trip";
    } else {
        $typeText = "Not selected";
    }

    session_start();
    $user_id = $_SESSION['id'];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $depart = $_POST["depart"];
    $return = $_POST["return"];
    $passengers = $_POST["passengers"];
    $class = $_POST["class"];

    // Insert search details into 'flights' table
    $sql = "INSERT INTO flights (user_id, type, from_location, to_location, depart_date, return_date, passengers, class)
            VALUES ('$user_id', '$typeText', '$from', '$to', '$depart', '$return', '$passengers', '$class')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the specified URL
        header("Location: http://localhost/phpscript/book-a-flight/dist/index.php");
        exit; // Make sure to exit after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
