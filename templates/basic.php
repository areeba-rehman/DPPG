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
    <title>Basic CV Template 1</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
            <img src="../<?php echo $profile['picture']; ?>" alt="Profile Picture" class="img-thumbnail mt-2" width="150">            <h1><?php echo $profile['name']; ?></h1>
                <p><?php echo $profile['email']; ?></p>
                <p><?php echo $profile['phone']; ?></p>
                <p><?php echo $profile['address']; ?></p>
                <hr>
            </div>
            <div class="col-md-12">
                <h2>About Me</h2>
                <p><?php echo $profile['narrative']; ?></p>
                <hr>
                <h2>Skills</h2>
                <p><?php echo $profile['skills']; ?></p>
                <hr>
                <h2>Tools</h2>
                <p><?php echo $profile['tools']; ?></p>
                <hr>
                <h2>Education</h2>
                <p><?php echo $profile['education']; ?></p>
                <hr>
                <h2>Experience</h2>
                <p><?php echo $profile['experience']; ?></p>
                <hr>
                <h2>Projects</h2>
                <p><?php echo $profile['projects']; ?></p>
                <hr>
                <h2>Services</h2>
                <p><?php echo $profile['services']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
