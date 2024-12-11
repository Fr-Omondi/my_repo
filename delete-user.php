<?php include('includes/db.php'); session_start(); ?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: manage-users.php');
    } else {
        echo "Error deleting user.";
    }
}
?>
