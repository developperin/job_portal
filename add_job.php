<?php
require './conn.php';
session_start();
// Collect form data
$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$job_requirements = $_POST['job_requirements'];
$salary = $_POST['salary'];
$location = $_POST['location'];
$id= $_SESSION['id'];

// Handle file upload
$sql = "INSERT INTO jobs (job_title, job_description, job_requirements, salary, location,user_id) VALUES ('$job_title', '$job_description', '$job_requirements', '$salary', '$location','$id')";

if ($con->query($sql) === TRUE) {
    echo "Job posted successfully!";

    echo "<script>alert('Job Post Added Succesfully'); window.location.href='navbar.php';</script>";
} else {
    echo "Error: " . $conn-> error() ;
}
?>