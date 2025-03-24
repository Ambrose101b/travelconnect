<?php
include 'config.php';

// Assuming you have a database connection established
$connection = mysqli_connect("localhost", "root", "", "travelconnect");

// Check if the connection was successful
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['userid']) ? $_GET['userid'] : '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data and sanitize it
  $id = isset($_GET['userid']) ? $_GET['userid'] : '';
  $origin = sanitizeInput($_POST['origin']);
  $destination = sanitizeInput($_POST['destination']);
  $name = sanitizeInput($_POST['name']);
  $email = sanitizeInput($_POST['email']);
  $date = sanitizeInput($_POST['date']);
  $trainClass = sanitizeInput($_POST['trainClass']);

  // Validate the form data (you can add more validation if needed)
  if (empty($origin) || empty($destination) || empty($name) || empty($email) || empty($date) || empty($trainClass)) {
    echo 'Please fill in all the required fields.';
  } else {
    // Prepare and bind the SQL statement to prevent SQL injection
    $query = "INSERT INTO traindetails (id, origin, destination, name, email, date, class) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if (!$stmt) {
      die("Error: " . mysqli_error($connection));
    }

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "issssss", $id, $origin, $destination, $name, $email, $date, $trainClass);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      // Retrieve the generated ID
      $insertedId = mysqli_insert_id($connection);

      // Redirect to the next page with the ID as a query parameter
      header("Location: trainticket.php?travelid=$insertedId");
      exit();
    } else {
      // Handle the case when the insertion fails
      echo "Error: " . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  }
}

// Function to sanitize input data
function sanitizeInput($data) {
  // Sanitize the data to prevent SQL injection or other malicious attacks
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_close($connection);
?>
