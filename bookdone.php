<?php
include 'connect.php'; // Include the database connection file
session_start();
if ($_SESSION['id'] == '') {
    header("location:index.html");
}

// New database connection for "travelconnect" database
$travelconnect_host = 'localhost';
$travelconnect_user = 'root';
$travelconnect_pass = '';
$travelconnect_db = 'travelconnect';

$travelconnect_connect = mysqli_connect($travelconnect_host, $travelconnect_user, $travelconnect_pass, $travelconnect_db);

if (!$travelconnect_connect) {
    die("Connection to travelconnect database failed: " . mysqli_connect_error());
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
// Fetch name and email from "users" table in "travelconnect" database
$travelconnect_result = mysqli_query($travelconnect_connect, "SELECT `name`, `email` FROM `users` WHERE `id` = $id");

if ($travelconnect_result && mysqli_num_rows($travelconnect_result) > 0) {
    $travelconnect_row = mysqli_fetch_assoc($travelconnect_result);
    $name = $travelconnect_row['name'];
    $email = $travelconnect_row['email'];
} else {
    // Handle the situation when no data is found for the user in "travelconnect" database
    $name = "Name Not Found";
    $email = "Email Not Found";
}
?>

<html>
<head>
<style>
        body {
            background-color: F5F1F0;
            font-family: Montserrat, sans-serif;
            font-size: 18px !important;
        }

        #font {
            font-family: Montserrat, sans-serif;
            font-size: 18px !important;
        }

        .container {
            width: 70%;
            margin: 0 auto; /* Center the table horizontally */
            margin-top: 50px; /* Adjust top margin to center vertically */
        }

        /* Add grey background color to the table */
        .container table {
            background-color: #f2f2f2;
            width: 100%;
        }

        /* Style for the table header cells */
        .container th {
            background-color: #666;
            color: white;
            padding: 12px;
            text-align: left;
        }

        /* Style for the table data cells */
        .container td {
            padding: 12px;
        }

        /* Style for the button */
        .container button {
            background-color: black;
            border-color: black;
            color: white;
            padding: 10px 20px;
        }
    </style>
    <link rel='stylesheet' href='index.css'>
</head>
<body>
    <div class="container">
        <?php
        $result = mysqli_query($travelconnect_connect, "SELECT * FROM `train` WHERE `id`='$id' ORDER BY `T_No` DESC LIMIT 1");


if (!$result) {
    die("Query failed: " . mysqli_error($travelconnect_connect));
}

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $tno = $row["T_No"];
            $_SESSION['tno'] = $tno;
        ?>
            <h2 align="center"><b><img src="https://img.icons8.com/ios-filled/50/000000/summary-list.png" /> Booking Summary</b></h2>
            <br>

            <table class="table table-striped">
                <tr>
                    <th>Booking ID</th>
                    <td><?php echo $row['T_No']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <th>Source Station</th>
                    <td><?php echo $_SESSION['source'] ?></td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td><?php echo $_SESSION['dest'] ?></td>
                </tr>
                <tr>
                    <th>Route</th>
                    <td><?php echo $_SESSION['Route'] ?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>₹&nbsp;&nbsp;<?php echo $_SESSION['final'] ?></td>
                </tr>
            </table>

            <table align="center">
                <tr>
                    <td>
                        <div><a href="print.php?pid=<?php echo $_SESSION['tno'] ?>&userid=<?php echo $id ?>" target="_blank"><button style="background-color: black; border-color:black"><h3><span style="color:white;">Print Ticket</span></h3></button></a></div>
                    </td>
                </tr>
            </table>
        <?php
        } else {
            // Handle the situation when no data is found for the user
            echo "<h2 align='center'>No booking details found.</h2>";
        }
        ?>
    </div>
</body>
</html>
