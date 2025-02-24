<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: user_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages - ProfilePlus</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        img
        {
            height: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ProfilePlus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user_dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myprofile.php">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Create Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="packages.php">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://cdn.filestackcontent.com/pbMe99njQ6ea8tAfsg1Z" class="card-img-top" alt="Basic Plan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Basic Plan</h5>
                        <p class="card-text">Price: 1000 rupees</p>
                        <p class="card-text">1 basic template available at the time of creation</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjQ3oc6WuBfHTjWa196eNaJMGHMxrhnBfyYw&s" class="card-img-top" alt="Silver Plan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Silver Plan</h5>
                        <p class="card-text">Price: 3000 rupees</p>
                        <p class="card-text">Choice of 3 templates</p>
                        <p class="card-text">Change template anytime</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJbc9X2Lf_zh7y-G1I0CGn0wuuhaQj0niTsw&s" class="card-img-top" alt="Gold Plan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gold Plan</h5>
                        <p class="card-text">Price: 5000 rupees</p>
                        <p class="card-text">Choice of 5 templates</p>
                        <p class="card-text">Change template anytime</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
