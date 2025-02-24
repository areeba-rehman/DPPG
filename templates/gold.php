<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_profiles WHERE user_id = $user_id";
$result = $conn->query($sql);
$profile = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold CV Template 1</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .profile-section {
            margin-bottom: 30px;
        }
        .profile-section h2 {
            border-bottom: 2px solid #343a40;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .user_image {
            border: 5px solid black;
            border-radius: 100%;
            width: 15%;
            height: 57%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 profile-header text-center">
            <img src="../<?php echo $profile['picture']; ?>" class="img-thumbnail user_image" alt="Profile Picture" width="150">
            <h1><?php echo $profile['name']; ?></h1>
                <p><?php echo $profile['email']; ?></p>
                <p><?php echo $profile['phone']; ?></p>
                <p><?php echo $profile['address']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-12">
                <h2>About Me</h2>
                <p><?php echo $profile['narrative']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-6">
                <h2>Skills</h2>
                <p><?php echo $profile['skills']; ?></p>
            </div>
            <div class="col-md-6">
                <h2>Tools</h2>
                <p><?php echo $profile['tools']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-12">
                <h2>Education</h2>
                <p><?php echo $profile['education']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-12">
                <h2>Experience</h2>
                <p><?php echo $profile['experience']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-12">
                <h2>Projects</h2>
                <p><?php echo $profile['projects']; ?></p>
            </div>
        </div>
        <div class="row profile-section">
            <div class="col-md-12">
                <h2>Services</h2>
                <p><?php echo $profile['services']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
