<?php
// Include database connection and setup
include 'config.php';

// Fetch data from the database
$query = "SELECT * FROM flights";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
