<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
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

        input[type="text"] {
            padding: 5px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
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
<a class="back-icon" href="http://localhost/phpscript/admin_dashboard.html">
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

<h2>User List</h2>

<form method="get">
    Search by ID: <input type="text" name="search_id">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'travelconnect');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST["user_id"];

        if (!empty($userId)) {
            // Delete user from the database
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            // Close the statement
            $stmt->close();
        }
    }

    $sql = "SELECT * FROM users";

    if (isset($_GET['search_id']) && !empty($_GET['search_id'])) {
        $search_id = $_GET['search_id'];
        $sql = "SELECT * FROM users WHERE id = $search_id";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td><form method='post' action='".$_SERVER['PHP_SELF']."'>
                            <input type='hidden' name='user_id' value='".$row["id"]."'>
                            <input type='submit' class='delete-button' value='Delete' onclick='return confirmDelete();'>
                        </form></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No users found.</td></tr>";
    }

    $conn->close();
    ?>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</table>

</body>
</html>
