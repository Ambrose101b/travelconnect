<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newPassword = isset($_POST['password']) ? $_POST['password'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format.');</script>";
    // Handle the error appropriately (e.g., show an error message to the user)
  } else {
    // Connect to your database (replace with your own database credentials)
    $conn = mysqli_connect('localhost', 'root', '', 'travelconnect');
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if email exists in the users table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Email exists, show "Verified" message and display the new password field
      echo "<script>alert('Email verified.');</script>";
    } else {
      // Email doesn't exist, show error message
      echo "<script>alert('Email not found.');</script>";
    }
  }

  // Check if confirm button is clicked
  if (isset($_POST['recover-submit'])) {
    // Get the email and new password from the form
    $email = $_POST['email'];
    $newPassword = $_POST['password'];

    // Connect to your database (replace with your own database credentials)
    $conn = mysqli_connect('localhost', 'root', '', 'travelconnect');
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Update the password in the users table
    $query = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
    
    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Password updated successfully.');</script>";
      echo "<script>window.location.href = 'index.html';</script>";
      exit();
    } else {
      echo "<script>alert('Failed to update password.');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<style>
  .form-gap {
    padding-top: 70px;
}
</style>
</head>
<body>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
<div class='form-gap'></div>
<div class='container'>
  <div class='row'>
    <div class='col-md-4 col-md-offset-4'>
      <div class='panel panel-default'>
        <div class='panel-body'>
          <div class='text-center'>
            <h3><i class='fa fa-lock fa-4x'></i></h3>
            <h2 class='text-center'>Forgot Password?</h2>
            <p>You can reset your password here.</p>
            <div class='panel-body'>
              <form id='register-form' role='form' autocomplete='off' class='form' method='post'>
                <div class='form-group'>
                  <div class='input-group'>
                    <span class='input-group-addon'><i class='glyphicon glyphicon-envelope color-blue'></i></span>
                    <input id='email' name='email' placeholder='Email Address' class='form-control' type='email'>
                  </div>
                </div>
                <div class='form-group'>
                  <div class='input-group'>
                    <span class='input-group-addon'><i class='glyphicon glyphicon-lock color-blue'></i></span>
                    <input id='password' name='password' placeholder='New Password' class='form-control' type='password'>
                  </div>
                </div>
                <div class='form-group'>
                  <input name='recover-submit' class='btn btn-lg btn-primary btn-block' value='Reset Password' type='submit'>
                </div>
                <input type='hidden' class='hide' name='token' id='token' value=''> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
