<?php
include 'config.php'; // Include the database connection file
session_start();
if ($_SESSION['id'] == '') {
    header("location:index.html");
}

if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
}
$card = $_POST['cno'];
$EM = $_POST['Em'];
$EY = $_POST['Ey'];
$Cvv = $_POST['Cvv'];
$Pin = $_POST['Pin'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID passed to this page: " . $id;
}

$sql_transactions = "INSERT INTO train (id, source, dest, Class, Type, NoOfpass, card_no, expmonth, expyear, cvv, pin, Amt, Route) VALUES ('$userid', '" . $_SESSION['source'] . "', '" . $_SESSION['dest'] . "', '" . $_SESSION['Class'] . "', '" . $_SESSION['Type'] . "', '" . $_SESSION['NoOfpass'] . "', '$card', '$EM', '$EY', '$Cvv', '$Pin', '" . $_SESSION['final'] . "', '" . $_SESSION['Route'] . "')";

if (mysqli_query($conn, $sql_transactions)) {
    echo "<h1><center>Your Ticket has been successfully booked<center></h1><br>";
    // Redirect to the success page along with the userid in the URL
    header("location: bookdone.php?userid=$userid");
    exit(); // Exit the script after redirecting.
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection after use.
mysqli_close($conn);
?>
