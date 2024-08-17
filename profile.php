<?php
// session_start();
require './conn.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Profile Image">
                    <div class="card-body text-center">
                        <?php if (isset($_SESSION['name'])) { ?>
                            <h3 class="card-title"><?php echo $_SESSION['name']; ?></h3>
                        <?php } else { ?>
                            <h3 class="card-title">User Name</h3>
                        <?php } ?>
                        <?php if (isset($_SESSION['role'])) { ?>
                            <p class="card-text"><?php echo $_SESSION['role']; ?></p>
                        <?php } else { ?>
                            <p class="card-text">Role</p>
                        <?php } ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Edit
                            Profile</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Details</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Email:</strong>
                                <?php if (isset($_SESSION['email'])) {
                                    echo $_SESSION['email'];
                                } else {
                                    echo "user@example.com";
                                } ?>
                            </li>
                            <li class="list-group-item"><strong>Phone:</strong>
                                <?php if (isset($_SESSION['mobilenumber'])) {
                                    echo $_SESSION['mobilenumber'];
                                } else {
                                    echo "(123) 456-7890";
                                } ?>
                            </li>
                            <li class="list-group-item"><strong>Address:</strong>
                                <?php if (isset($_SESSION['city'])) {
                                    echo $_SESSION['city'];
                                } else {
                                    echo "123 Main St, City, Country";
                                } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editProfileForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="profileName">Name</label>
                            <input type="text" class="form-control" id="profileName"
                                value="<?php if (isset($_SESSION['user_name'])) {
                                    echo $_SESSION['user_name'];
                                } else {
                                    echo "John Doe";
                                } ?>">
                        </div>
                        <div class="form-group">
                            <label for="profileEmail">Email</label>
                            <input type="email" class="form-control" id="profileEmail"
                                value="<?php if (isset($_SESSION['user_email'])) {
                                    echo $_SESSION['user_email'];
                                } else {
                                    echo "john.doe@example.com";
                                } ?>">
                        </div>
                        <div class="form-group">
                            <label for="profilePhone">Phone</label>
                            <input type="text" class="form-control" id="profilePhone"
                                value="<?php if (isset($_SESSION['user_phone'])) {
                                    echo $_SESSION['user_phone'];
                                } else {
                                    echo "(123) 456-7890";
                                } ?>">
                        </div>
                        <div class="form-group">
                            <label for="profileAddress">Address</label>
                            <input type="text" class="form-control" id="profileAddress"
                                value="<?php if (isset($_SESSION['user_address'])) {
                                    echo $_SESSION['user_address'];
                                } else {
                                    echo "123 Main St, City, Country";
                                } ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card-img-top {
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }

        .modal-body {
            padding: 2rem;
        }
    </style>
    <script>
        document.getElementById('editProfileForm').addEventListener('submit', function (event) {
            event.preventDefault();
            // Get values from form inputs
            var name = document.getElementById('profileName').value;
            var email = document.getElementById('profileEmail').value;
            var phone = document.getElementById('profilePhone').value;
            var address = document.getElementById('profileAddress').value;

            // Update session variables
            <?php
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_phone'] = $phone;
            $_SESSION['user_address'] = $address;
            ?>

            // Redirect or update the page dynamically based on your needs
            alert('Profile updated successfully!');
            $('#editProfileModal').modal('hide');
        });
    </script>
</body>

</html>