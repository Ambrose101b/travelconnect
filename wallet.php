<?php
// Assuming you have already established a database connection
$mysqli = new mysqli("localhost", "root", "", "travelconnect");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Retrieve the ID from the GET request
$id = $_GET['userid'];

// Prepare the SQL query
$query = "SELECT name, email, balance FROM users WHERE id = ?";

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the ID parameter
$stmt->bind_param("s", $id);

// Execute the statement
$stmt->execute();

// Bind the result variables
$stmt->bind_result($name, $email, $balance);

// Fetch the data
if ($stmt->fetch()) {
    // The record is found, you can access the name, email, and balance here
} else {
    // No record found with the provided ID
    echo "No user found with ID: " . $id;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Wallet Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* ... Your existing CSS styles ... */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }

    .wallet-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .wallet {
      background-color: #44b0a0;
      box-shadow: 0 1px 5px -1px rgba(0, 0, 0, 0.3), inset 0 0 0 1px rgba(0, 0, 0, 0.15);
      border-radius: 40px;
      padding: 30px;
      color: white;
      text-align: center;
    }

    .header {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .balance {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .payment-options {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .payment-option {
      margin: 0 20px;
      cursor: pointer;
      padding: 20px;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .payment-option:hover {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .payment-icon {
      font-size: 2rem;
      color: #FFC168;
      margin-bottom: 10px;
    }

    .payment-text {
      font-size: 1rem;
      color: #444;
    }

    .selected {
      border: 2px solid #FFC168;
    }

    .add-button {
      background-color: #FFC168;
      border: none;
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 30px;
      transition: background-color 0.3s;
    }

    .add-button:hover {
      background-color: #ffa732;
    }

    .balance-update-message {
      font-size: 1rem;
      margin-top: 20px;
    }

    .footer {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 1rem;
      color: #888;
    }

    .balance-update-success {
      color: green;
    }

    .balance-update-failure {
      color: red;
    }
    
  </style>
</head>
<body>
  <div class="wallet-container">
    <div class="wallet">
      <div class="header">My Wallet</div>
      <div class="balance" id="currentBalance">₹ <?php echo number_format($balance, 2); ?></div>
      <div class="payment-options">
        <div class="payment-option" id="gpayOption">
          <div class="payment-icon"><i class="fab fa-google-pay"></i></div>
          <div class="payment-text">GPay</div>
        </div>
        <div class="payment-option" id="phonePeOption">
          <div class="payment-icon"><i class="fab fa-phone-alt"></i></div>
          <div class="payment-text">PhonePe</div>
        </div>
        <div class="payment-option" id="paytmOption">
          <div class="payment-icon"><i class="fas fa-wallet"></i></div>
          <div class="payment-text">Paytm</div>
        </div>
      </div>
      <input type="number" id="amount" class="amount-input" placeholder="Enter amount" required>
      <button type="button" class="add-button" id="addButton">Add to Wallet</button>
      <div class="balance-update-message" id="balanceUpdateMessage"></div>
    </div>
  </div>

  <script>
    document.getElementById("addButton").addEventListener("click", function() {
      const paymentOptions = document.querySelectorAll(".payment-option");
      const amountInput = document.getElementById("amount");
      const currentBalanceElement = document.getElementById("currentBalance");

      const selectedOption = Array.from(paymentOptions).find(option => option.classList.contains("selected"));

      if (!selectedOption) {
        alert("Please select a payment method.");
        return;
      }

      const amount = parseFloat(amountInput.value);

      if (isNaN(amount) || amount <= 0) {
        alert("Please enter a valid positive amount.");
        return;
      }

      const paymentMethod = selectedOption.querySelector(".payment-text").textContent;

      // Perform the balance update here (for demonstration purposes, let's just add the amount)
      const currentBalance = parseFloat(currentBalanceElement.textContent.replace("₹ ", ""));
      const newBalance = currentBalance + amount;

      if (!isNaN(newBalance)) {
        // Update the balance in the database using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_balance.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              const response = xhr.responseText;
              if (response === "success") {
                // Balance is updated in the database, now update the displayed balance
                currentBalanceElement.textContent = `₹ ${newBalance.toFixed(2)}`;
                amountInput.value = ""; // Reset the input field after adding.
                displayBalanceUpdateMessage(`You have added ₹${amount.toFixed(2)} to your wallet using ${paymentMethod}.`, "success");
              } else {
                displayBalanceUpdateMessage("Failed to update balance. Please try again later.", "failure");
              }
            } else {
              console.error("Error occurred during AJAX request.");
              displayBalanceUpdateMessage("Failed to update balance. Please try again later.", "failure");
            }
          }
        };

        // Send the data to the server
        xhr.send(`new_balance=${newBalance}&user_id=<?php echo isset($id) ? $id : ''; ?>`);
      } else {
        displayBalanceUpdateMessage("Failed to update balance. Please try again later.", "failure");
      }
    });

    const paymentOptions = document.querySelectorAll(".payment-option");
    paymentOptions.forEach(option => {
      option.addEventListener("click", function() {
        paymentOptions.forEach(option => option.classList.remove("selected"));
        this.classList.add("selected");
      });
    });

    function displayBalanceUpdateMessage(message, type) {
      const balanceUpdateMessage = document.getElementById("balanceUpdateMessage");
      balanceUpdateMessage.textContent = message;

      if (type === "success") {
        balanceUpdateMessage.classList.remove("balance-update-failure");
        balanceUpdateMessage.classList.add("balance-update-success");
      } else if (type === "failure") {
        balanceUpdateMessage.classList.remove("balance-update-success");
        balanceUpdateMessage.classList.add("balance-update-failure");
      }

      setTimeout(() => {
        balanceUpdateMessage.textContent = "";
      }, 5000);
    }
  </script>
</body>
</html>
