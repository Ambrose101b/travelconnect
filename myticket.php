<?php
// Assuming you have already established a database connection
$mysqli = new mysqli("localhost", "root", "", "travelconnect");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    /* Your existing CSS code goes here */

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url(https://i.gifer.com/YqYQ.gif); /* Replace with your background image URL */
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
    /* Your existing CSS styles */

    /* Add styles for the rectangular buttons */
    .large-button {
      background-color: lightgreen; /* Change the background color to light green */
      color: white;
      padding: 20px 40px;
      border-radius: 10px;
      margin: 10px 0;
      text-align: center;
      cursor: pointer;
      position: relative;
    }

    /* Add styles for the overlay on bus and ship buttons */
    .overlay {
      background-color: rgba(0, 0, 0, 0.4);
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      border-radius: 10px;
      display: none;
    }

    /* Additional styles for popup arrow */
    .popup::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #f9f9f9 transparent transparent transparent;
    }

    .coming-soon-box {
      position: relative;
      display: inline-block;
      padding: 10px;
      border: 2px solid black;
      border-radius: 10px;
      margin: 10px;
      text-align: center;
      pointer-events: none;
    }

    .coming-soon-heading {
      color: black;
      font-weight: bold;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: url(https://tactusmarketing.com/wp-content/uploads/tactus-waves-hero.mp4) no-repeat center center; /* Replace with your background image URL */
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
  </style>
</head>
<!-- ... your existing HTML and CSS ... -->

<body>
  <script>
    // JavaScript function to show flight info modal
    function showFlightInfo() {
      window.location.href = 'http://localhost/phpscript/flightbookings.php';
    }

    function showtrainInfo() {
      window.location.href = 'http://localhost/phpscript/trainbookings.php';
    }
  </script>
  <div class='container'>
  
    
    <!-- Add the large rectangular buttons and overlays -->
    <div class='large-button' style='background-color: green;' onclick='showtrainInfo()'>
      <span style='color: white;'>View Train Ticket</span>
    </div>
    <div class='large-button' style='background-color: green;' onclick='showFlightInfo()'>
      <span style='color: white;'>View Flight Ticket</span>
    </div>
    <div class='coming-soon-box'>
      <span class='coming-soon-heading'>Coming Soon</span>
      <br />
      <span style='color: black;'>View Bus Ticket</span>
    </div>
    <div class='coming-soon-box'>
      <span class='coming-soon-heading'>Coming Soon</span>
      <br />
      <span style='color: black;'>View Ship Ticket</span>
    </div>
  </div>
</body>
</html>


