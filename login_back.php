<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Valid credentials
        $_SESSION['email'] = $email; // Set session variable
        header("Location: navbar.php"); // Redirect to navbar.php
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
       
    }
}
// $conn->close();
?>
