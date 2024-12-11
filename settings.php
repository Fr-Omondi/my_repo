<?php include('includes/db.php'); session_start(); ?>

<?php
// Fetch current password from the settings table
$query = "SELECT admin_password FROM settings WHERE id = 1"; // Assuming you are using id = 1 for global settings
$result = mysqli_query($conn, $query);
$setting = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT); // Hash the new password

    // Update the password in the settings table
    $updateQuery = "UPDATE settings SET admin_password = '$new_password' WHERE id = 1";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Settings updated successfully!";
    } else {
        echo "Error updating settings: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
    <h2>Settings</h2>

    <!-- Form for updating settings -->
    <form method="POST" action="settings.php">
        <label for="admin_password">Change Admin Password:</label><br>
        <input type="password" name="admin_password" required><br><br>
        <input type="submit" value="Update Settings">
    </form>

    <!-- Show current password (hashed for security) -->
    <p>Current Hashed Password: <?php echo $setting['admin_password']; ?></p> 
</body>
</html>

