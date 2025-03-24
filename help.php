<?php
include 'config.php';
// Assuming you have already established a database connection
$mysqli = new mysqli('localhost', 'root', '', 'travelconnect');
session_start();
echo $uid=$_SESSION['id'];
if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}
if (isset($_GET['userid'])) {
  // Retrieve the ID from the URL
  $id = $_GET['userid'];
} else {
  // Set a default value for $userid if the 'userid' parameter is not present
  $id = "31";
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get the form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // Validate the input data (you can add more validation if needed)
    if (empty($id) || empty($name) || empty($email) || empty($message)) {
        echo 'Please fill in all the required fields.';
  
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO help (id, name, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("isss", $id, $name, $email, $message);

        if ($stmt->execute()) {
            echo "<script> alert('Help request sent!');</script>";
            
        } else {
          echo "<script> alert('Error!............');</script>" . $stmt->error;
        }

        $stmt->close();
        $mysqli->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  
  <style>
    /* CSS code goes here */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url(https://64.media.tumblr.com/b4b1d0aadda4a02c277c16f3f90cff00/tumblr_os09dcuAxF1riy2hio1_640.gif); /* Replace with your background image URL */

      background-size: cover;
      background-position: center;
    }

    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Add background color with transparency */
      border-radius: 10px;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    h1 {
      color: #6350C4; /* Change the color value to your desired color */
    }

    .logo {
      display: flex;
      align-items: center;
      margin-right: 42%; /* Increase the margin-right to add more space */
    }

    .logo img {
      height: 120px; /* Increase the height to adjust the logo size */
      margin-right: 20px;
    }

    .logo h1 {
      font-size: 36px; /* Increase the font size for 'Travel Connect' text */
      font-weight: bold;
    }

    nav {
      background-color: #f1f1f1;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
    }

    nav ul li {
      margin-right: 20px;
    }

    nav ul li a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      position: relative;
    }

    nav ul li a.active {
      color: blue;
    }

    nav ul li a::after {
      content: '';
      display: block;
      width: 100%;
      height: 2px;
      background-color: blue;
      position: absolute;
      bottom: -5px;
      left: 0;
      transform: scaleX(0);
      transition: transform 0.3s ease-in-out;
    }

    nav ul li a.active::after {
      transform: scaleX(1);
    }

    section {
      margin-bottom: 20px;
    }

    footer {
      text-align: center;
    }

    .start-booking-button {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
    }

    .start-booking-button:hover {
      background-color: #6350C4;
    }

    .account-button {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .account-button:hover {
      background-color: #6350C4;
    }

    .help-container {
      margin-top: 20px;
      text-align: center;
    }

    .help-text {
      font-size: 18px;
      color: #888;
    }

    .help-form {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .help-input {
      padding: 5px;
      margin-right: 10px;
    }

    .help-button {
      padding: 5px 10px;
      background-color: green;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .help-button:hover {
      background-color: #6350C4;
    }

    .circular-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      margin: 20px auto;
      display: block;
    }

    .contact-label {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .contact-label i {
      margin-right: 5px;
    }
  </style>
  
</head>
<body>
  
  <div class='container'>


    <section>
      <div class='help-container'>
        <h2>Help - Contact Details</h2>
        <div class='circular-image'>
          <img src='http://localhost/phpscript/helpbot.gif' alt='help bot' class='circular-image'>
        </div>

        <p class='contact-label'><i class='fas fa-envelope'></i><b>Email:</b> help@travelconnect.com</p>
        <p class='contact-label'><i class='fas fa-phone'></i><b>Phone:</b> +1 123-456-7890</p>
        <p class='contact-label'><i class='fab fa-telegram'></i><b>Telegram:</b> @travelconnect</p>
        <p class='contact-label'><i class='fab fa-instagram'></i><b>Instagram:</b> <a href='https://www.instagram.com/travelconnect'>travelconnect</a></p>
      <form action="#"method="POST">
        <div class='help-form'>
          <input type='text' id='name' name='name' placeholder='Your Name' class='help-input'>
          <input type='email' id='email' name='email' placeholder='Your Email' class='help-input'>
          <input type='text' id='message' name='message' placeholder='How can we help you?' class='help-input' style='flex-grow: 2;'>
          <button class='help-button' type='submit'  name ='submit' onclick='sendEmail()'>Send</button>
        </div>
  </form>
      </div>
    </section>

    <footer>
      <!-- Footer content goes here -->
    </footer>
  </div>
</body>
</html>



 