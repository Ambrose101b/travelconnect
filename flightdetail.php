<!DOCTYPE html>
<html>
<head>
    <title>Book a flight</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('flight.jpg');
            background-size: cover;
            background-position: center;
        }

        .pane {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        h2 {
            margin-bottom: 20px;
            color: #6350C4;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6350C4;
        }

        .multi-city-inputs {
            display: none;
        }
    </style>
    <script>
        function redirectToFlightTrip() {
            var tripType = document.querySelector('input[name="trip_type"]:checked').value;
            var departureCity = document.getElementById('from').value;
            var destinationCity = document.getElementById('to').value;
            var date = document.getElementById('date').value;
            var returnDate = document.getElementById('return_date').value;
            var passengers = document.getElementById('passengers').value;
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;

            // Perform basic client-side validation
            if (tripType === "" || departureCity === "" || destinationCity === "" || date === "" || returnDate === "" || passengers === "" || name === "" || email === "") {
                alert("Please enter all required fields.");
            } else {
                // Redirect to flighttrip.php with query parameters
                var url = "flighttrip.php?trip_type=" + tripType + "&departure_city=" + departureCity + "&destination_city=" + destinationCity + "&date=" + date + "&return_date=" + returnDate + "&passengers=" + passengers + "&name=" + name + "&email=" + email;
                window.location.href = url;
            }
        }
        function updateDestinationOptions() {
            var fromSelect = document.getElementById("from");
            var toSelect = document.getElementById("to");

            // Clear existing options in "To" dropdown
            toSelect.innerHTML = "";

            // Add default disabled option
            var defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select destination city";
            defaultOption.disabled = true;
            defaultOption.selected = true;
            toSelect.appendChild(defaultOption);

            // Add destination options based on selected departure city
            if (fromSelect.value === "New York") {
                var newYorkOptions = ["Los Angeles", "Chicago", "Miami"];
                newYorkOptions.forEach(function (city) {
                    var option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    toSelect.appendChild(option);
                });
            } else if (fromSelect.value === "Los Angeles") {
                var losAngelesOptions = ["New York", "Chicago", "Miami"];
                losAngelesOptions.forEach(function (city) {
                    var option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    toSelect.appendChild(option);
                });
            } else if (fromSelect.value === "Chicago") {
                var chicagoOptions = ["New York", "Los Angeles", "Miami"];
                chicagoOptions.forEach(function (city) {
                    var option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    toSelect.appendChild(option);
                });
            } else if (fromSelect.value === "Miami") {
                var miamiOptions = ["New York", "Los Angeles", "Chicago"];
                miamiOptions.forEach(function (city) {
                    var option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    toSelect.appendChild(option);
                });
            }
        }
    </script>
</head>
<body>
    <div class="pane">
        <h2>Book a flight</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="trip_type">Trip Type:</label>
            <input type="radio" name="trip_type" value="one-way" checked> One-way
            <input type="radio" name="trip_type" value="round-trip"> Round-trip

            <label for="departure_city">From:</label>
            <select id="from" name="departure_city" onchange="updateDestinationOptions()">
                <option value="" disabled selected>Select departure city</option>
                <option value="New York">New York</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Chicago">Chicago</option>
                <option value="Miami">Miami</option>
            </select>

            <label for="destination_city">To:</label>
            <select id="to" name="destination_city">
                <option value="" disabled selected>Select destination city</option>
                <option value="New York">New York</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Chicago">Chicago</option>
                <option value="Miami">Miami</option>
            </select>

            <label for="date">Date:</label>
            <input type="date" name="date">

            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date">

            <label for="passengers">Passengers:</label>
            <input type="number" name="passengers">
            
            <label for="name">Name:</label>
            <input type="text" name="name">

            <label for="email">Email:</label>
            <input type="email" name="email">

            <input type="submit" value="Book">
        </form>
    </div>
    
    <?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'travelconnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tripType = $_POST["trip_type"];
    $departureCity = $_POST["departure_city"];
    $destinationCity = $_POST["destination_city"];
    $date = $_POST["date"];
    $returnDate = $_POST["return_date"];
    $passengers = $_POST["passengers"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    } else {
        // SQL query to insert the form data into the "trips" table
        $sql = "INSERT INTO trips (trip_type, departure_city, destination_city, date, return_date, passengers, name, email)
                VALUES ('$tripType', '$departureCity', '$destinationCity', '$date', '$returnDate', '$passengers', '$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Thank you for booking a flight. Your trip has been recorded.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

</body>
</html>
