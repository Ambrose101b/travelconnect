<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Get the user ID from the session
    $userId = $_SESSION['id'];

    // Assuming you have a database connection established
    $conn = new mysqli('localhost', 'root', '', 'travelconnect'); // Update with your database connection details

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a SQL query to fetch the user's name
    $sql = "SELECT name FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch the user's name
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    } else {
        $userName = "User Not Found";
    }

    // Fetch additional content from the 'train' table
    $trainData = []; // Create an array to store train data
    $sql = "SELECT * FROM flights WHERE user_id = '$userId' ORDER BY `bookid` DESC LIMIT 1";
    $result = $conn->query($sql);

    // Check if train data is available
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookid = $row['bookid'];
        $type = $row['type'];
        $from = $row['from_location'];
        $to = $row['to_location'];
        $ddate = $row['depart_date'];
        $rdate = $row['return_date'];
        $pasno = $row['passengers'];
        $class= $row['class'];
    } else {
        $trainData = []; // No train data found
    }

    // Close the database connection
    $conn->close();
} else {
    // If the user is not logged in, you can set default values or handle the case accordingly
    $userName = "Guest";
    $trainData = []; // No train data available for guests
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>travel connect Airticket</title>
<meta name="description" content="Air Canada boarding pass design">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Comfortaa:700|Montserrat:400,500'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <body>
    <div id="wrapper">
      <div class="boarding-box">
        <div class="titleBar no-user-select">
          <span>Travel Connect Boarding Pass</span>
        </div>
        
        <!-- BEGIN BOARDING BOX -->
        <div class="box-slide no-user-select">
          <div class="slide">
            <div class="front">
              <div class="card">
                <span class="airport from"><?php echo $from; ?></span>
                <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                <span class="airport to"><?php echo $to; ?></span>

              </div>
            </div>
            <div class="back">
              <div class="card">
                <!-- <span class="qrCode"><i class="fa fa-qrcode" aria-hidden="true"></i></span> -->
                <table class="barcode">
                  <tr></tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- END BOARDING BOX -->
        
        <div id="content">
          <div class="btn-logo no-user-select">
            <svg viewBox="0 0 200 200" focusable="false" style="height: 70px;">
              <path fill="#D24E58" d="M100,13.6c-49.5,0-89.5,37.4-89.5,83.6c0,40.5,30.9,74.3,71.8,82c8,1.6,12.9,3.6,15.3,7.1
                  c5.9-9.7,5.2-40.4,5.2-50.1c0-8.3,5.2-5.6,9.7-3.1l19.1,10.1c1-5.2,7.7-5.6,11.8-3.8l8,2.1l-3.8-8c-2.8-5.2-1.4-9.4,1.7-11.1
                  l-6.6-5.2c-5.2-3.5-2.1-7,5.2-9.7l11.8-5.6c-7-4.9-2.1-10.4,1-14.6l6.6-8.7l-15-0.4c-7.3-0.7-9-3.1-9-7.7l-15,10.1
                  c-7,4.5-11.5,0-10.8-8l2.4-18.8c-7,3.8-11.5-1-13.2-5.9c0,0-5.2-10.1-7-15.3c-1.7,5.2-7,15.3-7,15.3c-1.7,4.9-6.3,9.7-13.2,5.9
                  l2.4,18.8c0.7,8-3.8,12.5-10.8,8l-15-10.1c0,4.5-1.7,7-9,7.7l-15,0.4l6.6,8.7c3.1,4.2,8,9.7,1,14.6l11.8,5.6
                  c7.3,2.8,10.4,6.3,5.2,9.7l-6.6,5.2c3.1,1.7,4.5,5.9,1.7,11.1l-3.8,8l8-2.1c4.2-1.7,10.8-1.4,11.8,3.8l19.1-10.1
                  c4.5-2.4,9.7-5.2,9.7,3.1c0,8.7,1.4,28.6-4.8,34.5c-39.9-3.6-71.1-35.1-71.1-73.5c0-40.8,35.2-73.8,78.7-73.8s78.7,33,78.7,73.8
                  c0,38-30.3,69.3-69.7,73.4l0.1,9.9c45.2-4.3,80.4-39.9,80.4-83.2C189.5,51.1,149.5,13.6,100,13.6z"/>
            </svg>
          </div>
          <div>
            <p class="title no-user-select">Name/ಹೆಸರು</p>
            <p class="info"><?php echo $userName; ?></p>
          </div>
          <br/><br/>
          <div class="boardingInfo">
            <p class="title no-user-select">Flight/ವಿಮಾನ</p>
            <p class="title no-user-select">Gate/ಗೇಟ್</p>
            <p class="title no-user-select">Seat/ಆಸನ ಸಂಖ್ಯೆ</p>
          </div>
          <div class="boardingInfo">
            <p class="info">AC102</p>
            <p class="info">C48</p>
            <p class="info">32B (EC)</p>
          </div>
          <br/><br/>
          <div>
            <p class="title no-user-select">Class</p>
            <p class="info"><?php echo $class; ?></p>
          </div>
          <br/>
          <div>
            <p class="title no-user-select">Booked Date/ಕಾಯ್ದಿರಿಸಿದ ದಿನಾಂಕ</p>
            <p id="departure-date" class="info"><?php echo $ddate; ?></p>
          </div>
        </div>
      </div>
      <!-- Begin FOOTER -->
      <footer>
        <div class="footer-content">
            <p class="footer">
              <a target="_blank" href="http://localhost/phpscript/blend-mode-sticky-nav-hero/dist/index.html">Home</a> | 
              <a target="_blank" onclick="window.print()">print</a>
            </p>
        </div>
      </footer>
      <!-- End FOOTER -->
    </div>
  </body>
</html>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
