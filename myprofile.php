<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: user_login.php");
    exit();
}

// Fetch existing profile data if available
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_profiles WHERE user_id = $user_id";
$result = $conn->query($sql);
$profile = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $social_media = $_POST['social_media'];
    $narrative = $_POST['narrative'];
    $skills = $_POST['skills'];
    $tools = $_POST['tools'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $projects = $_POST['projects'];
    $services = $_POST['services'];

    $picture = "";
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        $picture = "uploads/" . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $picture);
    }

    if ($profile) {
        $sql = "UPDATE user_profiles SET 
                    picture='$picture', name='$name', email='$email', phone='$phone', address='$address', social_media='$social_media', narrative='$narrative', skills='$skills', tools='$tools', education='$education', experience='$experience', projects='$projects', services='$services' 
                WHERE user_id = $user_id";
    } else {
        $sql = "INSERT INTO user_profiles (user_id, picture, name, email, phone, address, social_media, narrative, skills, tools, education, experience, projects, services) VALUES ('$user_id', '$picture', '$name', '$email', '$phone', '$address', '$social_media', '$narrative', '$skills', '$tools', '$education', '$experience', '$projects', '$services')";
    }

    if ($conn->query($sql) === TRUE) {
        $message = "Profile saved successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfilePlus - My Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>My Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($message)) { echo '<div class="alert alert-info">' . $message . '</div>'; } ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="file" name="picture" class="form-control-file" id="picture">
                                <?php if ($profile && $profile['picture']) { ?>
                                    <img src="<?php echo $profile['picture']; ?>" alt="Profile Picture" class="img-thumbnail mt-2" width="150">
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $profile['name'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $profile['email'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo $profile['phone'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" placeholder="Address"><?php echo $profile['address'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="social_media">Social Media</label>
                                <textarea name="social_media" class="form-control" id="social_media" placeholder="Social Media"><?php echo $profile['social_media'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="narrative">Narrative</label>
                                <textarea name="narrative" class="form-control" id="narrative" placeholder="Narrative"><?php echo $profile['narrative'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <textarea name="skills" class="form-control" id="skills" placeholder="Skills"><?php echo $profile['skills'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tools">Tools</label>
                                <textarea name="tools" class="form-control" id="tools" placeholder="Tools"><?php echo $profile['tools'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="education">Education</label>
                                <textarea name="education" class="form-control" id="education" placeholder="Education"><?php echo $profile['education'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea name="experience" class="form-control" id="experience" placeholder="Experience"><?php echo $profile['experience'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="projects">Projects</label>
                                <textarea name="projects" class="form-control" id="projects" placeholder="Projects"><?php echo $profile['projects'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="services">Services</label>
                                <textarea name="services" class="form-control" id="services" placeholder="Services"><?php echo $profile['services'] ?? ''; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
                        </form>
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
