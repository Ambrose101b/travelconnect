<!DOCTYPE html>
<html>
<head>
  <title>Travel Details</title>
  <script>
    window.onload = function() {
        var message = "<?php echo $_GET['message']; ?>";
        if (message) {
            alert(message);
        }
    };

    function confirmPayment() {
      // Perform necessary actions for confirming payment
      alert("Payment confirmed!");
    }
  </script>
</head>
<body>
  <h2>Travel Details</h2>
  
  <?php
  // Retrieve the trip details from the 'trips' table
  $conn = new mysqli('localhost', 'root', '', 'travelconnect');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM trips";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          // Calculate total price and tax
          $price = 100; // Example price, replace with your own calculation
          $tax = $price * 0.1; // Example tax, replace with your own calculation
          $totalPrice = $price + $tax;

          // Display trip details and total price
          echo "<p>ID: " . $row["id"] . "</p>";
          echo "<p>Trip Type: " . $row["trip_type"] . "</p>";
          echo "<p>Departure City: " . $row["departure_city"] . "</p>";
          echo "<p>Destination City: " . $row["destination_city"] . "</p>";
          echo "<p>Date: " . $row["date"] . "</p>";
          echo "<p>Return Date: " . $row["return_date"] . "</p>";
          echo "<p>Passengers: " . $row["passengers"] . "</p>";
          echo "<p>Total Price: $" . $totalPrice . "</p>";
          echo "<p>Tax: $" . $tax . "</p>";
          
          // Add a button for confirming payment
          echo "<button onclick='confirmPayment()'>Confirm Payment</button>";
      }
  } else {
      echo "No trips found.";
  }

  $conn->close();
  ?>
</body>
</html>
