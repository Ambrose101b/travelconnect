<?php
// Check if the email and token are provided in the query string
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Validate the email and token (you can add more validation if needed)

    // Check if the token is valid (e.g., compare it with the token stored in the database)

    // Display the password reset form
    echo '
        <form method="post" action="reset_password_submit.php">
            <input type="hidden" name="email" value="' . $email . '">
            <input type="hidden" name="token" value="' . $token . '">
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="submit" name="submit" value="Reset Password">
        </form>
    ';
} else {
    echo "Invalid password reset link.";
}
?>
