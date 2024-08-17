<?php
require 'conn.php'; // Ensure this path is correct

// Check if the connection is established
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Validate and sanitize inputs
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$mobilenumber = mysqli_real_escape_string($con, $_POST['mobilenumber']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$role = mysqli_real_escape_string($con, $_POST['role']);

// Validate email
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
    header('Location: signup.php');
    exit();
}

// Validate password length
if (strlen($password) < 6) {
    header('Location: signup.php');
    exit();
}

// Check for duplicate email
$duplicate_user_query = "SELECT id FROM users WHERE email='$email'";
$duplicate_user_result = mysqli_query($con, $duplicate_user_query);
if (mysqli_num_rows($duplicate_user_result) > 0) {
    header('Location: signup.php?error=duplicate_email');
    exit();
}

// Hash password

// Insert new user into the database
$user_registration_query = "INSERT INTO users (name, email, password, mobilenumber, city, role) VALUES ('$name', '$email', '$password', '$mobilenumber', '$city', '$role')";

if (mysqli_query($con, $user_registration_query)) {
    $_SESSION['email'] = $email;
    $_SESSION['id'] = mysqli_insert_id($con);
    header('Location: navbar.php');
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}
?>
