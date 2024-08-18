<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Roles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .card-body p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .no-results {
            text-align: center;
            margin-top: 50px;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <?php
        require './conn.php';

        // Prepare the SQL statement
        $sql = "SELECT * FROM users WHERE role = 'company'";

        // Execute the query
        $result = $con->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            ' . htmlspecialchars($row["name"]) . '
                        </div>
                        <div class="card-body">
                            <p><strong>ID:</strong> ' . htmlspecialchars($row["id"]) . '</p>
                            <p><strong>Email:</strong> ' . htmlspecialchars($row["email"]) . '</p>
                            <p><strong>Mobile Number:</strong> ' . htmlspecialchars($row["mobilenumber"]) . '</p>
                            <p><strong>City:</strong> ' . htmlspecialchars($row["city"]) . '</p>
                            <p><strong>Role:</strong> ' . htmlspecialchars($row["role"]) . '</p>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="no-results">No company roles found.</div>';
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
