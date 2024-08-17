<?php
require './conn.php';

// SQL query to join jobs with users and select relevant columns
$sql = "
SELECT 
    jobs.id AS job_id,
    jobs.job_title,
    jobs.job_description,
    jobs.job_requirements,
    jobs.salary,
    jobs.location,
    jobs.created_at AS job_created_at,
    users.id AS user_id,
    users.name AS user_name,
    users.email AS user_email,
    users.mobilenumber AS user_mobilenumber,
    users.city AS user_city,
    users.role AS user_role,
    users.created_at AS user_created_at
FROM jobs
JOIN users 
;
";

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .job-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .job-card .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 15px;
            text-align: center;
        }

        .job-card .card-body {
            padding: 20px;
        }

        .job-card .card-body .contact-info {
            font-size: 0.875rem;
            color: #666;
        }

        .job-card .job-image {
            max-height: 200px;
            object-fit: cover;
            width: 100%;
            border-bottom: 1px solid #ddd;
        }

        .btn-apply {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-apply:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .job-card .card-body {
                padding: 15px;
            }

            .job-card .card-body .contact-info {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4 text-center">Job Listings</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-6 col-lg-4">';
                    echo '<div class="card job-card">';
                    
                    // Optionally, include a job-related image
                    // echo '<img src="path/to/job-image.jpg" class="job-image" alt="Job Image">';
                    
                    echo '<div class="card-header">' . htmlspecialchars($row['job_title']) . '</div>';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo '<div class="col-md-6">';
                    echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p class="card-text"><strong>Salary:</strong> ' . htmlspecialchars($row['salary']) . '</p>';
                    echo '<p class="card-text"><strong>Description:</strong> ' . nl2br(htmlspecialchars($row['job_description'])) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-6">';
                    echo '<p class="card-text"><strong>Requirements:</strong> ' . nl2br(htmlspecialchars($row['job_requirements'])) . '</p>';
                    echo '<div class="contact-info">';
                    echo '<p><strong>Posted by:</strong> ' . htmlspecialchars($row['user_name']) . '</p>';
                    echo '<p><strong>Email:</strong> ' . htmlspecialchars($row['user_email']) . '</p>';
                    echo '<p><strong>Contact Number:</strong> ' . htmlspecialchars($row['user_mobilenumber']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="text-center mt-3">';
                    echo '<p class="text-success"> For apply Job send Resumes to given email and contect now ...</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No jobs available at the moment.</p>';
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
