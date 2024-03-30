<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Post an Event</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.html">Home</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="register.html">Sign Up</a></li>
        </ul>
    </div>
</nav>
<h1 class="text-center my-4">Post an Event</h1>
<form action="post_event.php" method="post">
    <div class="form-group">
        <label for="eventName">Event Name:</label>
        <input type="text" class="form-control" name="event_name" id="eventName" required>
    </div>
    <div class="form-group">
        <label for="deadline">Deadline:</label>
        <input type="date" class="form-control" name="deadline" id="deadline" required>
    </div>
    <div class="form-group">
        <label for="eventTime">Time:</label>
        <input type="time" class="form-control" name="event_time" id="eventtime" required>
    </div>
    <div class="form-group">
        <label for="stakeholder">Stakeholder:</label>
        <input type="text" class="form-control" name="stakeholder" id="stakeholder" required>
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" name="location" id="location" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Post Event">
</form>
<h1 class="text-center my-4">Events List</h1>
<div class="container">
    <?php
    include "connect.php";
    $sql = "SELECT * FROM events";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card my-3'>";
        echo "<div class='card-body'>";
        echo "<h2 class='card-title'>" . $row['event_name'] . "</h2>";
        echo "<p class='card-text'>Deadline: " . $row['deadline'] . "</p>";
        echo "<p class='card-text'>Time: " . $row['event_time'] . "</p>";
        echo "<p class='card-text'>Stakeholder: " . $row['stakeholder'] . "</p>";
        echo "<p class='card-text'>Location: " . $row['location'] . "</p>";
        echo "<form action='register_event.php' method='post' class='mt-3'>";
        echo "<input type='hidden' name='event_id' value='" . (isset($row['event_id']) ? $row['event_id'] : '') . "'>";
        echo "<input type='submit' class='btn btn-primary' value='Register for Event'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
