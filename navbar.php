<?php
session_start();
require './conn.php';
// Include the database connection file

// Check if the email is set in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Assign the email from the session to the $email variable

    // Prepare and execute the SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the associative array for the user
        $user_data = $result->fetch_assoc();

        // Store user data in session variables
        $_SESSION['name'] = $user_data['name'];
        $_SESSION['role'] = $user_data['role'];
        $_SESSION['mobilenumber'] = $user_data['mobilenumber'];
        $_SESSION['city'] = $user_data['city'];
        $_SESSION['id'] = $user_data['id'];
    } else {
        // echo "No user found with this email.";
    }
} else {
    echo "User is not logged in.";
    // Optionally, you can redirect to the login page here
    // header('Location: login.php');
    exit();
}

function getIconClass($name) {
    $iconMap = [
        'Profile' => 'user',
        'Change Password' => 'key',
        'Applied Company List' => 'building',
        'Application Received' => 'envelope',
        'Posts Created' => 'file-alt',
        'Add New Post' => 'plus',
        'All Companies' => 'building',
        'All Users' => 'users',
        'Jobs' => 'briefcase'
    ];

    return isset($iconMap[$name]) ? 'fas fa-' . $iconMap[$name] : 'fas fa-cog';
}

function displaySidebarOptions($role) {
    $options = [
        'user' => [
            'Profile' => 'profile.php',
            'Jobs' => 'jobs.php',
            'Change Password' => 'change_password.php',
        ],
        'company' => [
            'Profile' => 'profile.php',
            'Change Password' => 'change_password.php',
            'Posts Created' => 'posts_created.php',
            'Add New Post' => 'add_new_post.php'
        ],
        'admin' => [
            'Profile' => 'profile.php',
            'Change Password' => 'change_password.php',
            'All Companies' => 'all_companies.php',
            'All Users' => 'all_users.php'
        ]
    ];

    if (isset($options[$role])) {
        foreach ($options[$role] as $name => $link) {
            $iconClass = getIconClass($name);
            echo '<li><a href="#" data-url="' . $link . '"><i class="' . $iconClass . '"></i><span class="label">' . $name . '</span></a></li>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Add favicon link -->
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #111;
      padding-top: 20px;
      transition: width 0.3s ease;
      overflow-y: hidden;
      overflow-x: hidden;
    }

    .sidebar .logo {
      text-align: center;
      margin-bottom: 30px;
      color: white;
      font-size: 24px;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .sidebar .logo span {
      margin-left: 10px;
    }

    .sidebar .profile {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 15px 20px;
      background-color: #1a1a1a;
      border-radius: 10px;
      margin: 0 20px 20px;
      color: white;
    }

    .sidebar .profile img {
      border-radius: 50%;
      margin-right: 15px;
      width: 50px;
      height: 50px;
    }

    .sidebar .profile .name {
      font-size: 18px;
      font-weight: bold;
    }

    .sidebar .profile .role {
      font-size: 14px;
      color: #999;
    }

    .sidebar .nav-list {
      list-style-type: none;
      text-align: center;
      padding: 0;
      margin: 0;
    }

    .sidebar .nav-list li {
      margin-bottom: 10px;
      text-align: center;
    }

    .sidebar .nav-list li a {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: background 0.3s ease;
    }

    .sidebar .nav-list li a:hover,
    .sidebar .nav-list li a.active {
      background-color: #333;
    }

    .sidebar .nav-list li a i {
      margin-right: 10px;
      font-size: 18px;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 60px;
      }

      .sidebar .profile,
      .sidebar .profile .name,
      .sidebar .profile .role,
      .sidebar .nav-list li a .label {
        display: none;
      }

      .sidebar .nav-list li a {
        justify-content: center;
      }

      .content {
        margin-left: 60px;
      }
      .com{
        display: none;
      }
      .toggle-btn{
        display: none;
      }
    }

    .toggle-btn {
      font-size: 20px;
      background-color: #111;
      color: #000;
      border: none;
      cursor: pointer;
      padding: 10px 15px;
      z-index: 100;
      border-radius: 4px;
      background: #fff;
    }

    .toggle-btn:hover {
      background-color: #333;
    }

    .sidebar.collapsed {
      width: 60px;
    }

    .sidebar.collapsed .logo span {
      display: none;
    }

    .content.collapsed {
      margin-left: 60px;
    }

    .sidebar.collapsed~.toggle-btn {
      left: 70px;
    }

    .sidebar.collapsed .profile,
    .sidebar.collapsed .profile .name,
    .sidebar.collapsed .profile .role,
    .sidebar.collapsed .nav-list li a .label {
      display: none;
    }

    .sidebar.collapsed .nav-list li a {
      justify-content: center;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <div class="logo">
      <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
      <span class="com">nirav Job portal</span>
    </div>
    <div class="profile" style="text-align:center;">
      <!-- <img src="https://via.placeholder.com/50" alt="User Profile"> -->
      <div style="text-align: center;">
        <div class="name"><?php echo ucwords($_SESSION['name']); ?></div>
        <div class="role"><?php echo ucfirst($_SESSION['role']); ?></div>
      </div>
    </div>
    <ul class="nav-list">
      <?php
      // Check if the session is set and role is valid
      if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
          displaySidebarOptions($_SESSION['role']);
      }
      ?>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span class="label">Logout</span></a></li>
    </ul>
  </div>

  <!-- <button class="toggle-btn" onclick="toggleSidebar()">☰</button> -->

  <div class="content">
    <!-- Content will be loaded here dynamically -->
    <?php require "profile.php"?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const navLinks = document.querySelectorAll('.nav-list li a[data-url]');
      // document.querySelector('.content').innerHTML = profile.php ;
      
      navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
          event.preventDefault();
          
          const url = this.getAttribute('data-url');
          fetch(url)
            .then(response => response.text())
            .then(data => {
              document.querySelector('.content').innerHTML = data 
            })
            .catch(error => console.error('Error loading content:', error));
        });
      });
    });

    function toggleSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const content = document.querySelector('.content');
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('collapsed');
    }
  </script>

</body>

</html>
