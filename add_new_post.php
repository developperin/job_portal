<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .form-container h2 {
            font-size: 1.75rem;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-control,
        .form-control-file {
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1rem;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            .form-container h2 {
                font-size: 1.5rem;
            }
            .btn-custom {
                width: 100%;
                padding: 12px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="text-center">Add Job Post</h2>
        <form action="add_job.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="jobTitle">Job Title</label>
                <input type="text" class="form-control" id="jobTitle" name="job_title" required>
            </div>
            <div class="form-group">
                <label for="jobDescription">Job Description</label>
                <textarea class="form-control" id="jobDescription" name="job_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="jobRequirements">Job Requirements</label>
                <textarea class="form-control" id="jobRequirements" name="job_requirements" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="location">Job Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <!-- <div class="form-group ">
                <label for="companyLogo">Hiring Poster</label>
                <input type="file" class="form-control-file p-4" id="companyLogo" name="company_logo" accept="image/*" required>
            </div> -->
            <button type="submit" class="btn btn-custom">Submit Job Post</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
