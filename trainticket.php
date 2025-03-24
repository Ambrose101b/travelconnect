<?php
include 'config.php';

// Assuming you have a database connection established
$connection = mysqli_connect("localhost", "root", "", "travelconnect");

// Check if the connection was successful
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the travelid from the URL
$travelid = isset($_GET['travelid']) ? $_GET['travelid'] : '';

// Fetch information from the database based on travelid
$query = "SELECT id, origin, destination, name, email, date, class FROM traindetails WHERE travelid = ?";
$stmt = mysqli_prepare($connection, $query);

if (!$stmt) {
  die("Error: " . mysqli_error($connection));
}

// Bind the travelid parameter
mysqli_stmt_bind_param($stmt, "i", $travelid);

// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $id, $origin, $destination, $name, $email, $date, $class);

// Fetch the row
mysqli_stmt_fetch($stmt);

// Close the statement
mysqli_stmt_close($stmt);

mysqli_close($connection);

echo "
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');

@keyframes slide-in {
  0%   { margin-top: -100vh; transform: rotate(-75deg);}
  100% { margin-top: 25vh; transform: rotate(2deg);}
}

body {
  font-family: 'VT323';
  background: #4AE;
}

.panel {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.ticket {
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  width: 500px;
  background: #fe6500;
  height: 250px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  align-self: center;
  justify-content: center;
  animation: slide-in 1s forwards;
  animation-delay: 1s;
  animation-timing-function: ease-in;
}

.ticket-body {
  width: 100%;
  padding: 16px;
  height: 165px;
  background: #FED;
  display: grid;
  align-content: stretch;
  position: relative; 
  z-index: 1;
  overflow: hidden;
  grid-template-rows: 1fr 1fr 1fr 1fr;
}

.grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  
   > .content {
    font-size: 2rem;
    padding-right: 2rem;
  }
}

.button-container {
  text-align: center;
  margin-top: 20px;
}

.button-container button {
  margin: 0 5px;
  padding: 10px 20px;
  font-size: 14px;
  border-radius: 5px;
  background-color: #337ab7;
  color: #fff;
  border-color: #2e6da4;
}

</style>
</head>
<body>
<div class='panel'>
  <div class='ticket'>
    <div class='ticket-body'>
      <div class='grid 5'>
        <div class='heading'>Class</div>
        <div class='heading'>Ticket Type</div>
        <div class='heading'>User-ID</div>
        <div class='heading'>Seat-No</div>
        <div class='heading'></div>
        <div class='content'>$class</div>
        <div class='content'>Advance </div>
        <div class='content'>$id</div>
        <div class='content'>$travelid</div>
      </div>
       
      <div class='grid 5'>
        <div class='heading'>From</div>
        <div class='heading'></div>
        <div class='heading'>Name</div>
        <div class='heading'></div>
        <div class='heading'>Price</div>
        <div class='content'>$origin</div>
        <div class='content'></div>
        <div class='content'>$name</div>
        <div class='content'></div>
        <div class='content'>Rs.1200</div>
      </div>
      
      <div class='grid 5'>
        <div class='heading'>To</div>
        <div class='heading'>Email</div>
        <div class='heading'></div>
        <div class='heading'></div>
        <div class='heading'></div>
        <div class='content'>$destination</div>
        <div class='content'>$email</div>
      </div>
    </div>
  </div>

  <div class='button-container'>
    <button onclick='downloadTicket()'>Download</button>
    <button onclick='goToHomepage()'>Home</button>
    <button onclick='printTicket()'>Print</button>
  </div>
</div>

<script>
function downloadTicket() {
  // Add your code to download the ticket here
  alert('Ticket downloaded!');
}

function goToHomepage() {
  // Redirect to the homepage with the ID as a query parameter
  window.location.href = 'updated_dashboard.php?userid=$id';
}

function printTicket() {
  // Add your code to print the ticket here
  window.print();
}
</script>

</body>
</html>";
?>
