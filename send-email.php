<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data
  $origin = $_POST["origin"];
  $destination = $_POST["destination"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $date = $_POST["date"];
  $trainClass = $_POST["trainClass"];

  // Compose email message
  $subject = "Train Ticket Booking Confirmation";
  $message = "Thank you for booking your train ticket.\n\n";
  $message .= "Ticket details:\n";
  $message .= "Origin: $origin\n";
  $message .= "Destination: $destination\n";
  $message .= "Name: $name\n";
  $message .= "Email: $email\n";
  $message .= "Date: $date\n";
  $message .= "Class: $trainClass\n";

  // Send email
  $headers = "From: chinnachinnu751@gmail.com"; // Replace with your email address
  if (mail($email, $subject, $message, $headers)) {
    echo "Email sent successfully!";
  } else {
    echo "Error sending email.";
  }
}
?>
