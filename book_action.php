<?php
include 'config.php';
session_start();
if ($_SESSION['id'] == '') {
    header("location:index.html");
}

if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
}

$source = $_POST['source'];
$dest = $_POST['dest'];
$class = $_POST['class'];
$type = $_POST['type'];
$no = $_POST['number'];

if ($source == $dest) {
    echo "<h1><center>Selected source and destination are the same. Please refill the details.</center></h1><br><br>";
    echo '<center>';
} else {
    echo "<h1><center><b><img src='https://img.icons8.com/cotton/80/000000/route.png'/>SELECT ROUTE AND PROCEED TO CHECKOUT :</b></center></h1>";
    $sql_price = "SELECT * FROM `train_price` WHERE `source` LIKE '$source' AND `dest` LIKE '$dest' AND `type` LIKE '$type' AND `class` = '$class'";
    $result = $conn->query($sql_price);

    while ($row = $result->fetch_assoc()) {
        $final = $row["Price"];
        $Route = $row["Route"];
        $final = $final * $no;
        echo '<div class="center-pane">
        <h1 class="center-pane-heading">Booking Summary</h1>
        <div class="ticket-summary">
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Total Fare:</span>
                <span class="ticket-value typing-animation">₹ ' . $final . '</span>
            </div>
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Class:</span>
                <span class="ticket-value typing-animation">' . $class . ' Class</span>
            </div>
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Type:</span>
                <span class="ticket-value typing-animation">' . $type . '</span>
            </div>
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Source:</span>
                <span class="ticket-value typing-animation">' . $source . '</span>
            </div>
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Destination:</span>
                <span class="ticket-value typing-animation">' . $dest . '</span>
            </div>
            <div class="ticket-detail">
                <span class="ticket-value typing-animation">Route:</span>
                <span class="ticket-value typing-animation">' . $Route . '</span>
            </div>
        </div>
        <div class="button-container">
            <form action="pay.php" method="post">
                <input type="hidden" name="userid" value="' . $userid . '">
                <button class="checkout-button" type="submit">Checkout</button>
            </form>
        </div>
    </div>';
    }

    $_SESSION['final'] = $final;
    $_SESSION['source'] = $source;
    $_SESSION['dest'] = $dest;
    $_SESSION['Class'] = $class;
    $_SESSION['Type'] = $type;
    $_SESSION['NoOfpass'] = $no;
    $_SESSION['Route'] = $Route;
}
?>


<style>
body {
    font-family: Montserrat, sans-serif;
    font-size: 20px;
    background-image: url('https://cliply.co/wp-content/uploads/2021/07/402107330_WHITE_WAVES_400px.gif'); /* Set the background image URL */
    background-size: cover; /* Cover the entire viewport */
    background-repeat: no-repeat; /* Prevent image from repeating */
    background-attachment: fixed; /* Fixed background image */
    background-position: center center; /* Center the background image */
}

.container {
    background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to content */
    padding: 20px;
    border-radius: 10px;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.checkout-button {
    background-color: black;
    color: white;
    padding: 15px 40px;
    font-size: 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.checkout-button:hover {
    background-color: #333;
}

/* Additional CSS for text animation */
.highlight-text {
    color: #FFC107;
    font-weight: bold;
}

.class-type {
    font-style: italic;
}

.center-pane {
    text-align: center;
    margin-top: 20px;
}

.center-pane-heading {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

.typing-animation {
    font-size: 36px; /* Increase font size */
    font-weight: bold;
    color: #FFFFF;
    white-space: nowrap;
    overflow: hidden;

    animation: typing 2s steps(30, end), blink-caret 0.5s step-end infinite;
}



</style>

<br><br><br><br>
<center>
    <td>
        <form action="book.php">
        <div class="button-container">
            <button class="checkout-button" type="submit" align="center">
                <span>Go back</span>
            </button></div>
        </form><br><br>
    </td>
</center>
