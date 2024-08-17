<?php
session_start(); // Start the session
require './conn.php'; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo "<script>alert('You need to log in first.'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['id'];

// Fetch jobs posted by the current user
$sql = "SELECT * FROM jobs WHERE user_id = '$user_id'";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Job Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">My Job Posts</h1>
    <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Requirements</th>
                        <th>Salary</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_description']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_requirements']); ?></td>
                        <td><?php echo htmlspecialchars($row['salary']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td>
                            <form action="delete_job.php" method="POST" style="display:inline;">
                                <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No job posts found.
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="navbar.php" class="btn btn-success">Post a New Job</a>
    </div>
</div>
</body>
</html>
