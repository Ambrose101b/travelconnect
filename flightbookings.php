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

    // Fetch flight booking data
    $flightData = []; // Create an array to store flight booking data
    $sql = "SELECT * FROM flights WHERE user_id = '$userId' ORDER BY `bookid` DESC LIMIT 1";
    $result = $conn->query($sql);

    // Check if flight booking data is available
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookid = $row['bookid'];
        $type = $row['type'];
        $from = $row['from_location'];
        $to = $row['to_location'];
        $ddate = $row['depart_date'];
        $rdate = $row['return_date'];
        $pasno = $row['passengers'];
        $class = $row['class'];
    } else {
        $flightData = []; // No flight booking data found
    }
} else {
    // If the user is not logged in, you can set default values or handle the case accordingly
    $userName = "Guest";
    $flightData = []; // No flight booking data available for guests
}

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<div>
</div>
<style>
    table#database_table {
        font-size: 16px;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        border-spacing: 0;
    }

    #database_table td,
    #database_table th {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    #database_table tr:nth-child(even) {
        background-color: #f2f2f2
    }

    #database_table th {
        padding-top: 11px;
        padding-bottom: 11px;
        background-color: black;
        color: white;
    }

    body {
    margin: 0;
    padding: 0;
    font-family: "Arial", sans-serif;
    background-image: url("https://i.pinimg.com/originals/20/d9/c9/20d9c9ccfee8b5892a145199e458fc79.gif"); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
}
</style>

<head>
    <title>TRAVEL CONNECT TRAIN TICKET</title>

</head>
<body>
    <h2>
        <center><b><img src="flight-icon.png" /> USER'S FLIGHT BOOKINGS <img src="train-icon.png" /></center>
    </h2>

    <div class="container">
        <br />
        <table id="database_table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Class</th>
                    <th>Type</th>
                    <th>Depart Date</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>

            <?php
                if (isset($_SESSION['id'])) {
                    $userid = $_SESSION['id'];

                    $sql_transactions = "SELECT * FROM `train` WHERE `id`='$userid'";
                    $result = $conn->query($sql_transactions);
                    while ($row = $result->fetch_assoc()) {

                        echo '<tr class="table table-striped table-bordered">
                        <td>' . $bookid . '</td>
                        <td>' . $from . '</td>
                        <td>' . $to . '</td>
                        <td>' . $class . '</td>
                        <td>' . $type . '</td>
                        <td>' . $ddate . '</td>
                        <td><a  href="http://localhost/phpscript/air-canada-boarding-pass/dist/index.php?bookid=' . $bookid . ' " target="_blank">Click Here</a></td>
                                ';
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#database_table').DataTable({
                "order": [[1, "desc"]]
            });
        });
    </script>
</body>
</html>
