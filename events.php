<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles2.css">
    <title>Post an Event</title>
</head>
<body>
<nav>
        <a href="home.php">Home</a> 
        <a href="events.php">Events</a>
        <a href="register.html">Sign Up</a>
    </nav>
    <h1>Post an Event</h1>
    <form action="post_event.php" method="post">
        <label for="eventName">Event Name:</label>
        <input type="text" name="event_name" id="eventName" required><br>
        
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" required><br>
        
        <label for="eventTime">Time:</label>
        <input type="time" name="event_time" id="eventtime" required><br>
        
        <label for="stakeholder">Stakeholder:</label>
        <input type="text" name="stakeholder" id="stakeholder" required><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br>
        
        <input type="submit" value="Post Event">
    </form>
    <h1>Events List</h1>
    <?php
    include "connect.php";
    $sql = "SELECT * FROM events";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h2>" . $row['event_name'] . "</h2>";
        echo "<p>Deadline: " . $row['deadline'] . "</p>";
        echo "<p>Time: " . $row['event_time'] . "</p>";
        echo "<p>Stakeholder: " . $row['stakeholder'] . "</p>";
        echo "<p>Location: " . $row['location'] . "</p>";
        echo "<form action='register_event.php' method='post'>";
        echo "<input type='hidden' name='event_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Register for Event'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</body>
</html>
