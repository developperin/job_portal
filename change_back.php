<?php
require './conn.php';
session_start();


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted values
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $userId = $_SESSION['id']; // Assuming user ID is stored in session

    // Check if new passwords match
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('New password and confirm password do not match.'); window.location.href='change-password.php';</script>";
        exit;
    }

    // Get the current password from the database
    $sql = "SELECT password FROM users WHERE id = $userId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Check if the current password is correct
        if ($currentPassword !== $storedPassword) {
            echo "<script>alert('Current password is incorrect.'); window.location.href='change-password.php';</script>";
            exit;
        }

        // Update the password in the database
        $sql = "UPDATE users SET password = '$newPassword' WHERE id = $userId";

        if ($con->query($sql) === TRUE) {
            // Success message and redirect
            echo "<script>alert('Password changed successfully.'); window.location.href='navbar.php';</script>";
        } else {
            echo "<script>alert('Error changing password: " . $conn->error() . "'); window.location.href='change-password.php';</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.location.href='change-password.php';</script>";
    }
}

?>
