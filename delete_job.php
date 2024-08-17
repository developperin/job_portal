<?php
session_start(); // Start the session
require './conn.php'; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo "<script>alert('You need to log in first.'); window.location.href='login.php';</script>";
    exit();
}

if (isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];
    $user_id = $_SESSION['id'];

    // Delete the job post if it belongs to the logged-in user
    $sql = "DELETE FROM jobs WHERE id = '$job_id' AND user_id = '$user_id'";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Job deleted successfully.'); window.location.href='navbar.php';</script>";
    } else {
        echo "<script>alert('Error deleting job.'); window.location.href='navbar.php';</script>";
    }
} else {
    echo "<script>alert('Invalid job ID.'); window.location.href='navbar.php';</script>";
}


?>
