<?php
include 'connect.php';
$sql = "SELECT * FROM feedback";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // Output feedback data in a table format
    echo "<h2>Feedback Report</h2>";
    echo "<table border='1'>";
    echo "<tr><th>event_id</th><th>feedback_content</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["event_id"] . "</td>";
        echo "<td>" . $row["feedback_content"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No feedback data found.";
}

// Close the connection
$connect->close();
?>