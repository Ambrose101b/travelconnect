<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    /* CSS styles for the login page */
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #fff;
      padding: 35px;
      border-radius: 5px;
      width: 300px;
      margin: 0 10px;
      animation: fade-in 1s ease;
    }

    @keyframes fade-in {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #555;
      text-decoration: none;
    }
  </style>
  <script>
    function login() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

      if (email === 'admin@gmail.com' && password === 'admin@123') {
        window.location.href = 'admin_dashboard.html';
      } else {
        window.location.href = 'exploration.html';
      }
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Admin Login</h2>
      <input type="email" id="email" placeholder="Email" required>
      <input type="password" id="password" placeholder="Password" required>
      <button type="button" onclick="login()">Login</button>
      <a href="forgot-password.html">Forgot Password?</a>
    </div>
  </div>
</body>
</html>
