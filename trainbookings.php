<?php
include 'config.php';
session_start();
if ($_SESSION['id'] == '') {
    header("location:index.php");
}
?>

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
    background-image: url("https://static.toiimg.com/photo/resizemode-75,overlay-toiplus,msid-90100566/90100566.jpg"); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
}
</style>

<head>
    <title>TRAVEL CONNECT TRAIN TICKET</title>

</head>

<body>
    <h2>
        <center><b><img src="https://img.icons8.com/nolan/64/database.png" /> USER'S TRAIN BOOKINGS <img
                src="https://img.icons8.com/ultraviolet/60/000000/train.png" /></center>
    </h2>

    <div class="container">
        <br />
        <table id="database_table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Booking ID</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Class</th>
                    <th>Type</th>
                    <th>Amount Paid</th>
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
                                    <td>' . $row["Date"] . '</td>
                                    <td>' . $row["T_No"] . '</td>
                                    <td>' . $row["source"] . '</td>
                                    <td>' . $row["dest"] . '</td>
                                    <td>' . $row["Class"] . '</td>
                                    <td>' . $row["Type"] . '</td>
                                    <td>₹&nbsp&nbsp' . $row["Amt"] . '</td>
                                    <td><a  href="print.php?pid=' . $row["T_No"] . ' " target="_blank">Click Here</a></td>
                                ';
                    }
                }
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
