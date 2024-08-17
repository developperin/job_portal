<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Job Portal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(
  45deg,
  hsl(240deg 100% 20%) 0%,
  hsl(289deg 100% 21%) 11%,
  hsl(315deg 100% 27%) 22%,
  hsl(329deg 100% 36%) 33%,
  hsl(337deg 100% 43%) 44%,
  hsl(357deg 91% 59%) 56%,
  hsl(17deg 100% 59%) 67%,
  hsl(34deg 100% 53%) 78%,
  hsl(45deg 100% 50%) 89%,
  hsl(55deg 100% 50%) 100%
);
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-container {
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #555;
            margin-bottom: 30px;
        }

        .btn-custom {
            font-size: 1rem;
            padding: 15px 30px;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
        }

        .btn-login:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-signup {
            background-color: #28a745;
            color: white;
        }

        .btn-signup:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .star-rating {
            font-size: 1.5rem;
            color: #f8c102;
            margin-bottom: 15px;
        }

        .star-rating .fa-star {
            color: #f8c102;
        }

        .star-rating .fa-star-o {
            color: #e4e5e9;
        }

        .review-summary {
            font-size: 1rem;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="hero-container">
            <h1 class="hero-title">Welcome to Job Portal</h1>
            <p class="hero-subtitle">Find your dream job or hire the perfect candidate with ease.</p>
            <div>
                <a href="login.php" class="btn-custom btn-login">Login</a>
                <a href="signup.php" class="btn-custom btn-signup">Sign Up</a>
            </div>
        </div>
        <div class="pt-8">
            <h2 class="text-center my-5">What Our Customers Are Saying</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nirav Mathukiya</h5>
                            <div class="star-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-half-alt"></span>
                            </div>
                            <p class="review-summary">"Absolutely love the clothing from NM - Clothing. Great quality
                                and fast shipping!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kava Tina</h5>
                            <div class="star-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p class="review-summary">"The customer service was excellent, but the delivery took a bit
                                longer than expected."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dhruvi Kachadiya</h5>
                            <div class="star-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p class="review-summary">"Fantastic experience! The clothes fit perfectly and the style is
                                on point. Highly recommend!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>