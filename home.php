<?php
	//ensure that the user has logged in before accessing this page
	session_start();
	if (!isset($_SESSION['username'],$_SESSION['id'])) {
		header("location:login.html");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage with Image Slider</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="home.html">Home</a> 
        <a href="events.html">Events</a>
        <a href="register.html">Sign Up</a>
    </nav>
    <?php
		//session_start();
		$username = $_SESSION['username'];
		echo "Welcome $username";
	?>
    <a href="logout.php">Logout</a>
    <div class="slider">
        <img src="img1.jpg" alt="Image 1">
        <img src="image2.jpg" alt="Image 2">
        <img src="image3.jpg" alt="Image 3">
    </div>
    <div class="navigation-button">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <footer>
        <div class="footer-section">
            <h2>About</h2>
            <p>Our platform serves as a catalyst for community-driven environmental stewardship, facilitating meaningful engagement between volunteers, stakeholders, and administrators. At our core, we believe in the power of collective action to address environmental challenges and create cleaner, healthier communities for all.</p>
        </div>
        <div class="footer-section">
            <h2>Mission</h2>
            <p>We are dedicated to empowering individuals and organizations to actively participate in community cleaning efforts. By providing a user-friendly platform, we aim to streamline the process of organizing and participating in cleaning events, while also fostering a culture of continuous improvement through feedback and collaboration.</p>
        </div>
        <div class="footer-section">
            <h2>Vision</h2>
            <p>We envision a world where every individual feels a sense of responsibility towards environmental cleanliness and actively contributes to community cleaning initiatives. Through our platform, we strive to create an inclusive and supportive environment where everyone can make a meaningful impact.</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
