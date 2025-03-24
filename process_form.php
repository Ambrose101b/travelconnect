<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data
  $id = $_POST["id"];
  $current_balance = $_POST["current_balance"];
  $payment_method = $_POST["payment_method"];
  $date = $_POST["date"];
  $time = $_POST["time"];

  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "travelconnect";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL insert statement
  $sql = "INSERT INTO transactions (transaction_id, id, current_balance, payment_method, date, time) VALUES (NULL, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("idsss", $id, $current_balance, $payment_method, $date, $time);
  
  if ($stmt->execute()) {
    echo "Transaction details successfully posted!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $stmt->close();
  $conn->close();
}
?>
