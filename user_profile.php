<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h1 style="color:#6350C4;text-align:center;">
        User Profile
    </h1>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://icon-library.com/images/icon-gif/icon-gif-17.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <?php
                        // Replace 'your_database' with your actual database name
                        $db_name = 'travelconnect';
                        // Replace 'your_username' and 'your_password' with your database credentials
                        $db_username = 'root';
                        $db_password = '';

                        // Establish a connection to the database
                        $connection = new PDO("mysql:host=localhost;dbname=$db_name", $db_username, $db_password);

                        // Fetch the user name from the 'users' table
                        $query = $connection->query("SELECT name FROM users");
                        $users = $query->fetch(PDO::FETCH_ASSOC);

                        // Display the user name
                        echo $users['name'];
                    ?>
                </h5>
                <p class="card-text">
                    Passionate about Travelling.
                </p>

                <a href="#" class="btn btn-primary">
                    See Profile
                </a>
            </div>
        </div>
    </div>
</body>
</html>
