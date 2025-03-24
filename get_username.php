<?php
// Replace 'your_database' with your actual database name
$db_name = 'travelconnect';
// Replace '' and 'your_password' with your database credentials
$db_username = 'root';
$db_password = '';

// Establish a connection to the database
$connection = new PDO("mysql:host=localhost;dbname=$db_name", $db_username, $db_password);

// Fetch the user name from the 'user_information' table
$query = $connection->query("SELECT name FROM users");
$user = $query->fetch(PDO::FETCH_ASSOC);

// Close the database connection
$connection = null;

// Return the user name
echo $user['name'];
?>
