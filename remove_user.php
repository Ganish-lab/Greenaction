<?php
include 'connect.php';

// Define variables and initialize with empty values
$user_id = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user ID
    if (empty(trim($_POST["user_id"]))) {
        echo "Please enter the user ID.";
    } else {
        $user_id = trim($_POST["user_id"]);

        // Prepare SQL statement
        $sql = "DELETE FROM users WHERE id = $user_id";

        if ($connect->query($sql) === TRUE) {
            echo "User with ID $user_id has been removed successfully";
        } else {
            echo "Error removing user: " . $connect->error;
        }

        // Close the connection
        $connect->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="remove-user-form">
        <h2>Remove User</h2>
        <div class="form-group">
            <label>User ID:</label>
            <input type="number" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Remove">
        </div>
    </form>
</body>
</html>
