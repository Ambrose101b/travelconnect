<!DOCTYPE html>
<html>
<head>
    <title>Help Queries</title>
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
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .resolved-button {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
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
<a class="back-icon" href="http://localhost/phpscript/customer__support.html">
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

<h2>Help Queries</h2>

<table>
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Action</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'travelconnect');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the "Resolved" button was clicked
    if (isset($_GET['resolve'])) {
        $query_id = $_GET['resolve'];

        // Delete the resolved query
        $delete_sql = "DELETE FROM help WHERE id = $query_id";
        $conn->query($delete_sql);
    }

    $sql = "SELECT * FROM help";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["message"] . "</td>
                    <td><button class='resolved-button' onclick=\"window.location.href='?resolve=" . $row["id"] . "'\">Resolved</button></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No queries found.</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
