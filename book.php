<?php
include 'connect.php';
session_start();
if ($_SESSION['id'] == '') {
    header("location:index.html");
}

if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <style>
        /* Your existing CSS styles */
        body {
            font-family: Montserrat, sans-serif;
            font-size: 20px;
        }
        
        .vertical-container {
            display: flex;
            flex-direction: row;
            height: 100vh;
        }
        
        .background-container {
            flex: 1;
            position: relative;
        }
        
        .form-container {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="vertical-container">
        <div class="background-container">
            <iframe src="http://localhost/phpscript/css-night-train-ride-animation/dist/index.html" frameborder="0" width="100%" height="100%" ></iframe>
        </div>
        
        <div class="form-container">
            <h1>Train Ticket Booking</h1></br>
            <form method="post" action="book_action.php" align="center">
            <div class="background-container">

            <div class="container2">
                <form>
                    <div class="form-row" name="source">
                        <div class="form-group col-md-5">
                            <label for="inputEmail4">SOURCE STATION :</label>
                            <select id="inputState" class="form-control" name="source">
    <option>Mumbai</option>
    <option>Delhi</option>
    <option>Bangalore</option>
    <option>Chennai</option>
    <option>Kolkata</option>
    <option>Jaipur</option>
    <option>Chandigarh</option>
    <option>Goa</option>
    <option>Ahmedabad</option>
    <option>Bhopal</option>
    <option>Patna</option>
    <option>Varanasi</option>
    <option>Nagpur</option>
    <option>Shimla</option>
    <option>Ooty</option>
    <option>Amritsar</option>
    <option>Vadodara</option>
    <option>Guwahati</option>
    <option>Jammu</option>
    <option>Trivandrum</option>
    <option>Visakhapatnam</option>
    <option>Raipur</option>
    <option>Jamshedpur</option>
    <option>Nashik</option>
    <option>Hubli</option>
    <option>Agra</option>
    <option>Jhansi</option>
    <option>Coimbatore</option>
    <option>Noida</option>
    <option>Kanpur</option>
    <option>Mangalore</option>
    <option>Trichy</option>
    <option>Kota</option>
    <option>Dehradun</option>
    <option>Bhubaneswar</option>
    <option>Vijayawada</option>
    <option>Siliguri</option>
    <option>Muzaffarpur</option>
    <option>Panaji</option>
    <option>Kochi</option>
    <option>Thiruvananthapuram</option>
    <option>Madurai</option>
    <option>Tuticorin</option>
    <option>Salem</option>
    <option>Vellore</option>
    <option>Rajahmundry</option>
    <option>Warangal</option>
    <option>Gulbarga</option>
</select>

                        </div></br></br>
                        <div class="form-group col-md-5">
                            <label for="inputPassword4">FINAL DESTINATION :</label>
                            <select id="inputState" class="form-control" name="dest">
   
    <option>Mumbai</option>
    <option>Delhi</option>
    <option>Bangalore</option>
    <option>Chennai</option>
    <option>Kolkata</option>
    <option>Jaipur</option>
    <option>Chandigarh</option>
    <option>Goa</option>
    <option>Ahmedabad</option>
    <option>Bhopal</option>
    <option>Patna</option>
    <option>Varanasi</option>
    <option>Nagpur</option>
    <option>Shimla</option>
    <option>Ooty</option>
    <option>Amritsar</option>
    <option>Vadodara</option>
    <option>Guwahati</option>
    <option>Jammu</option>
    <option>Trivandrum</option>
    <option>Visakhapatnam</option>
    <option>Raipur</option>
    <option>Jamshedpur</option>
    <option>Nashik</option>
    <option>Hubli</option>
    <option>Agra</option>
    <option>Jhansi</option>
    <option>Coimbatore</option>
    <option>Noida</option>
    <option>Kanpur</option>
    <option>Mangalore</option>
    <option>Trichy</option>
    <option>Kota</option>
    <option>Dehradun</option>
    <option>Bhubaneswar</option>
    <option>Vijayawada</option>
    <option>Siliguri</option>
    <option>Muzaffarpur</option>
    <option>Panaji</option>
    <option>Kochi</option>
    <option>Thiruvananthapuram</option>
    <option>Madurai</option>
    <option>Tuticorin</option>
    <option>Salem</option>
    <option>Vellore</option>
    <option>Rajahmundry</option>
    <option>Warangal</option>
    <option>Gulbarga</option>
</select>

                        </div>
                    </div></br></br>
                    <div class="line"></div> <!-- Horizontal line -->

                    <div class="form-group col-md-5" name="class">
                        <label for="inputPassword4">TRAIN CLASS :</label>
                        <select id="inputState" class="form-control" name="class">
                            <option>First</option>
                            <option>Second</option>
                            <option>A.C</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div></br></br>
                    <div class="line"></div> <!-- Horizontal line -->
                    <div class="form-group col-md-5" name="type">
                        <label for="inputState">JOURNEY TYPE :</label>
                        <select id="inputState" class="form-control" name="type">
                            <option>Single</option>
                            <option>Return</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div></br></br>
                    <div class="line"></div> <!-- Horizontal line -->
                    <div class="form-group col-md-16">
                        <label for="inputState"><h8>NO OF PASSENGERS :</h8></label>
                        <input type="number" name="number" required min="1" max="5">
                    </div></br></br>
                    <br>
                    <!-- Add the hidden input field for userid -->
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                    <button type="submit" class="button" name="login_submit"style="background-color: black; padding: 20px 60px; color: white;"  >Proceed</button>
                </form>
            </div>
        </section>
    </div>
</form>
            </br></br></br></br></br>
            <form action="updated_dashboard.php">
                <button style="background-color: black; padding: 20px 60px; color: white;" type="submit">
                    Go back
                </button>
            </form>
        </div>
    </div>
</body>
</html>
