<?php include('includes/db.php'); session_start(); ?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Rehash the new password

        $updateQuery = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
        mysqli_query($conn, $updateQuery);
        header('Location: manage-users.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
        <label for="password">New Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
