<!DOCTYPE html>
<html>
<head>
    <title>Flight Submission Records</title>
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
<h2>Flight Submission Records</h2>

<table>
    <tr>
        <th>Booking ID</th>
        <th>User ID</th>
        <th>Type</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Depart Date</th>
        <th>Return Date</th>
        <th>No. of Passengers</th>
        <th>Class</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'travelconnect');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM flights"; // Modify the condition if needed
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["bookid"] . "</td>
                    <td>" . $row["user_id"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["from_location"] . "</td>
                    <td>" . $row["to_location"] . "</td>
                    <td>" . $row["depart_date"] . "</td>
                    <td>" . $row["return_date"] . "</td>
                    <td>" . $row["passengers"] . "</td>
                    <td>" . $row["class"] . "</td>
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
