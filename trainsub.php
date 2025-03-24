<!DOCTYPE html>
<html>
<head>
    <title>Train Submission Records</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: lightgreen;
        }

        tr:nth-child(even) {
            background-color: lightgreen;
        }

        .back-icon {
  width: 30px;
  height: 30px;
  display: inline-block;
}
.back-icon__row {
  height: 10px;
  width: 30px;
  display: flex;
}
.back-icon__elem {
  height: 8px;
  width: 8px;
  margin-right: 2px;
  margin-bottom: 2px;
  background: red;
  border-radius: 38%;
}
    </style>
</head>
<body>
<a class="back-icon" href="http://localhost/phpscript/customer_bookings.html">
  <div class="back-icon__row">
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
  </div>
   <div class="back-icon__row">
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
  </div>
  <div class="back-icon__row">
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
    <div class="back-icon__elem"></div>
  </div>
</a>
<h2>Train Submission Records</h2>

<table>
    <tr>
        <th>Transaction No.</th>
        <th>User ID</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Class</th>
        <th>Type</th>
        <th>No. of Passengers</th>
        <th>Card Number</th>
        <th>Expiration Month</th>
        <th>Expiration Year</th>
        <th>CVV</th>
        <th>PIN</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Route</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'travelconnect');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM train"; // Modify the condition if needed
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["T_No"] . "</td>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["source"] . "</td>
                    <td>" . $row["dest"] . "</td>
                    <td>" . $row["Class"] . "</td>
                    <td>" . $row["Type"] . "</td>
                    <td>" . $row["NoOfpass"] . "</td>
                    <td>" . $row["card_no"] . "</td>
                    <td>" . $row["expmonth"] . "</td>
                    <td>" . $row["expyear"] . "</td>
                    <td>" . $row["cvv"] . "</td>
                    <td>" . $row["pin"] . "</td>
                    <td>" . $row["Date"] . "</td>
                    <td>₹&nbsp;" . $row["Amt"] . "</td>
                    <td>" . $row["Route"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No records found.</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
