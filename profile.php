<?php
// Start the session
session_start();

// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}

// Include config file
include "connect.php";

// Define variables and initialize with empty values
$fullname = $email = $dob = $phone = "";
$fullname_err = $email_err = $dob_err = $phone_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate fullname
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Please enter your full name.";
    } else{
        $fullname = trim($_POST["fullname"]);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate date of birth
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Please enter your date of birth.";
    } else{
        $dob = trim($_POST["dob"]);
    }

    // Validate phone number
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number.";
    } else{
        $phone = trim($_POST["phone"]);
    }

    // Check if user account is set and valid
    if(isset($_POST["user_account"]) && ($_POST["user_account"] == "volunteer" || $_POST["user_account"] == "stakeholder")) {
        $user_account = $_POST["user_account"];
    } else {
        $user_account = ""; // Set to default or handle error
    }

    // Check if a file is uploaded
    $profile_picture = "";
    if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = "uploads/";
        $filename = uniqid() . '_' . basename($_FILES['profile_picture']['name']); // Generating a unique filename
        $targetPath = $uploadDirectory . $filename;

        if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetPath)) {
            // File uploaded successfully
            $profile_picture = $targetPath; // Update the profile picture variable with the path
        } else {
            // Error handling
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            echo "Error uploading file.";
        }
    }

    // Check input errors before updating the database
    if(empty($fullname_err) && empty($email_err) && empty($dob_err) && empty($phone_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET fullname='$fullname', email='$email', dob='$dob', phone='$phone', profile_picture='$profile_picture' WHERE id=".$_SESSION["id"];

        if(mysqli_query($connect, $sql)){
            // Profile updated successfully. Redirect to profile page
            header("location: profile.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close connection
        mysqli_close($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles2.css">
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .profile-picture-container {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }
        .profile-picture-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<nav>
        <a href="home.php">Home</a> 
        <a href="events.php">Events</a>
        <a href="profile.php">Profile</a>
        <a href="login.html">Admin</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Profile</h2>
                <p class="text-center">Please fill in your details to update your profile.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                                <span class="error"><?php echo $fullname_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                                <span class="error"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                                <span class="error"><?php echo $dob_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>">
                                <span class="error"><?php echo $phone_err; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-picture-container">
                                <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>User Account</label>
                        <select name="user_account" class="form-control">
                            <option value="volunteer" <?php if(isset($user_account) && $user_account == "volunteer") echo "selected"; ?>>Volunteer</option>
                            <option value="stakeholder" <?php if(isset($user_account) && $user_account == "stakeholder") echo "selected"; ?>>Stakeholder</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
