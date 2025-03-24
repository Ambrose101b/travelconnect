<?php
// Assuming you have already established a database connection
$mysqli = new mysqli("localhost", "root", "", "travelconnect");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Retrieve the user ID from the session
session_start();
$id = $_SESSION['id'];

// Prepare the SQL query
$query = "SELECT name, email FROM users WHERE id = ?";

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the ID parameter
$stmt->bind_param("s", $id);

// Execute the statement
$stmt->execute();

// Bind the result variables
$stmt->bind_result($name, $email);

// Fetch the data
if ($stmt->fetch()) {
    // The record is found, you can access the name and email here
} else {
    // No record found with the provided ID
    echo "No user found with ID: " . $id;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();

echo "<!DOCTYPE html>
<html>
<head>
 <meta charset='UTF-8'>
  <meta content='IE=edge' http-equiv='X-UA-Compatible'>
  <meta content='initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width' name='viewport'>
  <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
  <title>Dashboard</title>
  <style>
       body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url(https://images.pexels.com/photos/3278215/pexels-photo-3278215.jpeg?cs=srgb&dl=pexels-oleksandr-pidvalnyi-3278215.jpg&fm=jpg); /* Replace with your background image URL */
      background-size: cover;
      background-position: center;
    }
.container {
  max-width: 960px;
  margin: 0 auto;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.8); /* Add background color with transparency */
  border-radius: 10px;
}

header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

h1 {
  color: #6350C4; /* Change the color value to your desired color */
}

.logo {
  display: flex;
  align-items: center;
  margin-right: 42%; /* Increase the margin-right to add more space */
}

.logo img {
  height: 120px; /* Increase the height to adjust the logo size */
  margin-right: 20px;
}

.logo h1 {
  font-size: 36px; /* Increase the font size for 'Travel Connect' text */
  font-weight: bold;
}

nav {
  background-color: #f1f1f1;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 20px;
}

nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
}

nav ul li {
  margin-right: 20px;
}

nav ul li a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  position: relative;
}

nav ul li a.active {
  color: blue;
}

nav ul li a::after {
  content: '';
  display: block;
  width: 100%;
  height: 2px;
  background-color: blue;
  position: absolute;
  bottom: -5px;
  left: 0;
  transform: scaleX(0);
  transition: transform 0.3s ease-in-out;
}

nav ul li a.active::after {
  transform: scaleX(1);
}

section {
  margin-bottom: 20px;
}

footer {
  text-align: center;
}

.start-booking-button {
  background-color: green;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
}

.start-booking-button:hover {
  background-color: #6350C4;
}

.account-button {
  background-color: green;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
}

.account-button:hover {
  background-color: #6350C4;
}

    .user-welcome {
      text-align: right;
      margin-bottom: 10px;
    }

    .user-welcome span {
      font-weight: bold;
    }

    .custom-loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .custom-loader::before,
    .custom-loader::after {
      content: '';
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin: 5px;
      animation: loaderAnimation 5s infinite ease-in-out;
      background: radial-gradient(farthest-side, #6350C4 92%, transparent);
    }

    .custom-loader::before {
      filter: hue-rotate(45deg);
    }

    @keyframes loaderAnimation {
      0% {
        transform: rotate(0);
      }
      50% {
        transform: rotate(180deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

      .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 400px;
    }

    .modal-close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .user-name {
      font-size: 24px;
      font-weight: bold;
    }
  </style>
  <script>
    function redirectToLogout() {
      // Perform any logout-related actions here, if needed
            var loader = document.createElement('div');
      loader.className = 'custom-loader';
      document.body.appendChild(loader);


      // Perform any logout-related actions here, if needed

      // Redirect to dashboard.html after 2 seconds
      setTimeout(function() {
        window.location.href = 'http://localhost/phpscript/dashboard.html';
      }, 2000);
    }

        $(document).ready(function () {
            $('[data-toggle='popover']').popover();
        });

    document.addEventListener('DOMContentLoaded', function() {
      var modal = document.getElementById('modal');
      var modalTrigger = document.getElementById('modal-trigger');
      var modalClose = document.getElementsByClassName('modal-close')[0];

      modalTrigger.addEventListener('click', function() {
        modal.style.display = 'block';
      });

      modalClose.addEventListener('click', function() {
        modal.style.display = 'none';
      });
    });

 function getUserIdFromUrl() {
      var url = window.location.href;
      var params = new URLSearchParams(new URL(url).search);
      var userId = params.get('userid');
      return userId;
      }

    // Function to fetch user details using the user ID
    function fetchUserDetails(userId) {
      // Replace this with your implementation to fetch user details from the server
      // For demonstration purposes, we're using a mock data here

      return new Promise(function(resolve, reject) {
        setTimeout(function() {
          var userDetails = {
            name: 'John Doe',
            email: 'johndoe@example.com'
            // Add more user details here as needed
          };
          resolve(userDetails);
        }, 1000);
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      var userId = getUserIdFromUrl();

      if (userId) {
        fetchUserDetails(userId)
          .then(function(userDetails) {
            // Update the profile information in the HTML
            var userNameElement = document.getElementById('user-name');
            var userEmailElement = document.getElementById('user-email');

            if (userNameElement && userEmailElement) {
              userNameElement.textContent = userDetails.name;
              userEmailElement.textContent = userDetails.email;
            }
          })
          .catch(function(error) {
            console.error('Failed to fetch user details:', error);
          });
      }
    });
  </script>
</head>
<body>
  <div class='container'>
    <header>
      <div class='logo'>
        <a href='http://localhost/phpscript/adminlogin.php'>
          <img src='http://localhost/phpscript/WhatsApp_Image_2023-05-22_at_00.27.58__1_-removebg-preview.png' alt='Travel Connect Logo'>
        </a>
        <h1>Travel Connect</h1>
      </div>

      <div class='account' id='account'>
        <div class='profile'>
          <button id='view-profile-button' type='button' class='btn btn-primary'>View Profile</button>
        </div>
        <button class='account-button' onclick='redirectToLogout()'>Logout</button>
      </div>
    </header>
    <nav>
      <ul>
        <li><a href='http://localhost/phpscript/updated_dashboard.php' class='active'>Home</a></li>
        <li><a href='http://localhost/phpscript/pen-export-MWzpgQv/dist/explore.html'>Explore</a></li>
        <li><a href='http://localhost/phpscript/myticket.php'>My Ticket</a></li>
        <li><a href='http://localhost/phpscript/offers.html'>Offers</a></li>
        <li><a href='http://localhost/phpscript/help.php'>Help</a></li>
        <li><a href='http://localhost/phpscript/navigation-pagedesign-lesson/dist/index.html'>About Us</a></li>
      </ul>
    </nav>
    <section>
      <h2>Overview</h2>
      <p>Welcome to Travel Connect, the ultimate destination for all your travel needs. Whether you're looking to book a flight, reserve a train ticket, or manage your travel itineraries, we've got you covered.</p>
      <p>Our intuitive and user-friendly platform allows you to explore various flight and train options, compare fares, select your preferred seats, and make hassle-free bookings. With Travel Connect, you can experience seamless travel planning and enjoy a stress-free journey.</p>
      <p>From discovering new destinations to managing your travel schedules, Travel Connect is your trusted companion every step of the way. Start exploring and embark on unforgettable travel adventures with us!</p>
    </section>
    <section>
      <h3>Explore, Compare, and Book</h3>
      <p>With Travel Connect, you have the power to explore countless destinations, compare fares, and book your flights and train tickets with ease. Our user-friendly platform allows you to search for the best deals, customize your travel preferences, and make secure online bookings in just a few clicks. Whether you're planning a family vacation, a business trip, or a spontaneous getaway, we've got you covered.</p>

      <h3>Manage Your Travel Itineraries</h3>
      <p>Travel Connect offers a comprehensive itinerary management system to help you stay organized throughout your journey. Easily view and manage your travel bookings, track flight statuses, access boarding passes, and receive timely notifications about any changes or updates. We understand that travel plans can sometimes change, and our platform ensures that you're always informed and prepared.</p>

      <h3>Personalized Travel Experiences</h3>
      <p>We believe that every traveler is unique, and we strive to provide personalized experiences tailored to your preferences. Discover our recommendation engine that suggests popular destinations, activities, and attractions based on your interests and past travel history. Let us inspire you to embark on new adventures and create unforgettable memories.</p>

      <h3>24/7 Customer Support</h3>
      <p>Your satisfaction is our top priority, and our dedicated customer support team is available 24/7 to assist you with any queries or concerns. Whether you need assistance with booking modifications, travel advice, or resolving any issues during your trip, we're here to provide prompt and reliable support. Your travel experience should be stress-free, and we're committed to making that a reality.</p>

      <h3>Join the Travel Connect Community</h3>
      <p>Become part of our vibrant travel community and connect with fellow travelers from around the world. Share your travel stories, tips, and recommendations. Get inspired by others' experiences and broaden your horizons. Travel Connect is not just a booking platform; it's a place where travel enthusiasts come together to celebrate the joy of exploration.</p>

      <p>At Travel Connect, we're passionate about transforming your travel dreams into reality. Start your journey with us today and experience the world like never before.</p>
    </section>
    <a href='http://localhost/phpscript/3d-card-ui/dist/index.php' class='start-booking-button'>Start Booking</a>
  </div>
  <div id='profile-modal' class='modal'>
    <div class='modal-content'>
      <span class='modal-close'>&times;</span>
      <img id='profile-pic' class='profile-pic' src='' alt='Profile Picture'>
      <p id='user-name' class='user-name'></p>
      <p id='user-email' class='user-email'></p>
    </div>
  </div>
  <script>
    function redirectToLogout() {
      // Perform any logout-related actions here, if needed
      var loader = document.createElement('div');
      loader.className = 'custom-loader';
      document.body.appendChild(loader);

      // Redirect to the desired page after 2 seconds (change the URL as per your requirement)
      setTimeout(function() {
        window.location.href = 'http://localhost/phpscript/don-t-let-the-door-hit-you-on-the-way-out/dist/index.html';
      }, 2000);
    }

    document.addEventListener('DOMContentLoaded', function() {
      // Code for showing the profile modal
      var profileModal = document.getElementById('profile-modal');
      var profileTrigger = document.getElementById('view-profile-button');
      var profileClose = document.getElementsByClassName('modal-close')[0];

      profileTrigger.addEventListener('click', function() {
        // Fetch user details from login.php or any other source
        fetchUserDetails()
          .then(function(user) {
            // Update the modal with user details
            document.getElementById('profile-pic').src = user.profilePic;
            document.getElementById('user-name').textContent = user.name;
            document.getElementById('user-email').textContent = user.email;

            // Show the modal
            profileModal.style.display = 'block';
          })
          .catch(function(error) {
            console.error('Failed to fetch user details:', error);
          });
      });

      profileClose.addEventListener('click', function() {
        profileModal.style.display = 'none';
      });
    });

    // Function to fetch user details from login.php or any other source
    function fetchUserDetails() {
      // Return a promise that resolves with mock user details (replace with actual implementation)
      return new Promise(function(resolve, reject) {
        setTimeout(function() {
          var user = {
            profilePic: 'https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png', // Replace with actual profile picture URL
            name: '$name', // Replace with actual user's name
            email: '$email' // Replace with actual user's email
            // Add more user details here as needed
          };
          resolve(user);
        }, 1000);
      });
    }
  </script>
</body>
</html>";
?>
