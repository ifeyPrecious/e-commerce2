<?php
session_start(); // Start the session if it hasn't already been started

if (isset($_GET['logout'])) {
    if (isset($_SESSION['admin_logged_in'])) {
        // Clear the session variables
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_email']);
        
        // Destroy the session to ensure a clean logout
        session_destroy();

        // Redirect to the login page
        header('location: login.php');
        exit;
    }
}
?>
