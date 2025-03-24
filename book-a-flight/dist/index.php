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
  <title>CodePen - Book a flight</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="l-layout">
  <div class="c-card" id="selectFlights">
    <div class="c-card__header">
      <div class="c-media">
        <div class="c-media__img c-avatar c-avatar--accent" data-avatar="👤"></div>
        <div class="c-media__content">
          <h4 class="c-media__title"><?php echo $userName; ?></h4>
        </div>
      </div>
      <button class="c-button c-button--secondary c-theme">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 32 32" fill="currentColor">
          <path d="M 15 3 L 15 8 L 17 8 L 17 3 L 15 3 z M 7.5 6.09375 L 6.09375 7.5 L 9.625 11.0625 L 11.0625 9.625 L 7.5 6.09375 z M 24.5 6.09375 L 20.9375 9.625 L 22.375 11.0625 L 25.90625 7.5 L 24.5 6.09375 z M 16 9 C 12.145852 9 9 12.145852 9 16 C 9 19.854148 12.145852 23 16 23 C 19.854148 23 23 19.854148 23 16 C 23 12.145852 19.854148 9 16 9 z M 16 11 C 18.773268 11 21 13.226732 21 16 C 21 18.773268 18.773268 21 16 21 C 13.226732 21 11 18.773268 11 16 C 11 13.226732 13.226732 11 16 11 z M 3 15 L 3 17 L 8 17 L 8 15 L 3 15 z M 24 15 L 24 17 L 29 17 L 29 15 L 24 15 z M 9.625 20.9375 L 6.09375 24.5 L 7.5 25.90625 L 11.0625 22.375 L 9.625 20.9375 z M 22.375 20.9375 L 20.9375 22.375 L 24.5 25.90625 L 25.90625 24.5 L 22.375 20.9375 z M 15 24 L 15 29 L 17 29 L 17 24 L 15 24 z"></path>
        </svg>
      </button>
    </div>
    <div class="c-card__body u-padding-b--xs">
      <div class="c-schedule">
        <div class="c-schedule__item"><small class="u-text--b-default">From</small><strong class="u-text--info"><?php echo $from; ?></strong></div>
        <div class="c-schedule__item c-plane">
          <svg class="c-plane__icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
            <path d="M10.18 9"></path>
            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"></path>
          </svg>
        </div>
        <div class="c-schedule__item"><small class="u-text--b-default">To</small><strong class="u-text--info"><?php echo $to; ?></strong></div>
        <div class="c-schedule__item">
          <div class="c-toggle">
            <button class="c-toggle__btn c-toggle__btn--active" data-payment="dollars">$</button>
            <button class="c-toggle__btn" data-payment="points">INR</button>
          </div>
        </div>
      </div>
    </div>
    <div class="c-divider u-margin-b--xs"></div>
    <div class="c-card__body u-text--center u-padding-t--xs u-padding-b--sm"><small><span><?php echo $ddate; ?> </span><span class="u-text--b-default">to </span><span><?php echo $rdate; ?></span></small></div>
    <ul class="c-list" id="flightList"></ul>
    <div class="c-card__body" id="flightActions" style="display: none;">
      <button class="c-button c-button--success c-button--full c-button--lg" id="confirm">Confirm Flight &rarr;</button>
    </div>
  </div>
  <div class="c-card" id="reviewFlights" style="display: none;">
    <div class="c-card__body">
      <button class="c-button c-button--secondary c-theme">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 32 32" fill="currentColor">
          <path d="M 15 3 L 15 8 L 17 8 L 17 3 L 15 3 z M 7.5 6.09375 L 6.09375 7.5 L 9.625 11.0625 L 11.0625 9.625 L 7.5 6.09375 z M 24.5 6.09375 L 20.9375 9.625 L 22.375 11.0625 L 25.90625 7.5 L 24.5 6.09375 z M 16 9 C 12.145852 9 9 12.145852 9 16 C 9 19.854148 12.145852 23 16 23 C 19.854148 23 23 19.854148 23 16 C 23 12.145852 19.854148 9 16 9 z M 16 11 C 18.773268 11 21 13.226732 21 16 C 21 18.773268 18.773268 21 16 21 C 13.226732 21 11 18.773268 11 16 C 11 13.226732 13.226732 11 16 11 z M 3 15 L 3 17 L 8 17 L 8 15 L 3 15 z M 24 15 L 24 17 L 29 17 L 29 15 L 24 15 z M 9.625 20.9375 L 6.09375 24.5 L 7.5 25.90625 L 11.0625 22.375 L 9.625 20.9375 z M 22.375 20.9375 L 20.9375 22.375 L 24.5 25.90625 L 25.90625 24.5 L 22.375 20.9375 z M 15 24 L 15 29 L 17 29 L 17 24 L 15 24 z"></path>
        </svg>
      </button>
      <button class="c-button c-button--secondary c-button--sm" id="back">&larr; Select Flight</button>
      <h3 class="u-margin-b--xs u-margin-t--md"><?php echo $from; ?> to <?php echo $to; ?></h3><small class="u-text--b-default"><?php echo $ddate; ?> to <?php echo $rdate; ?></small>
      <div class="c-divider"></div>
      <div class="u-text--b-default u-margin-b--sm"><small>Flight Summary</small></div>
      <div class="u-border u-border u-border--info u-padding--md u-rounded--lg u-margin-b--md">
        <div class="u-margin-b--xs u-text--info"><small>Departs</small></div>
        <table class="c-table">
          <tbody>
            <tr>
              <td>Tampa International Airport</td>
              <th class="u-text--right" id="departureTime">11:45 AM</th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="u-border u-border u-border--success u-padding--md u-rounded--lg u-margin-b--md">
        <div class="u-margin-b--xs u-text--success"><small>Arrives</small></div>
        <table class="c-table">
          <tbody>
            <tr>
              <td>San Francisco International Airport</td>
              <th class="u-text--right" id="arrivalTime">4:50 PM</th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="c-divider"></div>
      <table class="c-table">
        <thead>
          <tr>
            <td class="u-padding-b--sm"><small class="u-text--b-default">Checkout</small></td>
            <td class="u-text--right u-padding-b--sm"></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="u-padding-b--sm">Cost</td>
            <td class="u-text--right u-padding-b--sm"><span id="activeCost">-20,000</span></td>
          </tr>
          <tr>
            <td class="u-padding-b--sm">Tax</td>
            <td class="u-text--right u-padding-b--sm">-$0.00</td>
          </tr>
        </tbody>
      </table>
      <div class="c-divider"></div>
      <div class="u-text--right">
        <h2 class="u-margin-b--md" id="total">$350.00</h2>
      </div>
      <form action="http://localhost/phpscript/air-canada-boarding-pass/dist/index.php">
    <button class="c-button c-button--lg c-button--full c-button--success" name="purchase_button" type="submit">Purchase Flight</button>
</form>

    </div>
  </div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
