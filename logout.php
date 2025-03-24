<?php
// Start the session if it's not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destroy the session
session_unset();
session_destroy();
?>
