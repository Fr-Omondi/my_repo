<?php include('includes/db.php'); session_start(); ?>

<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: listing.php');  
    exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <a href="listing.php">View Cars</a> | <a href="logout.php">Logout</a>
     
    <!-- Admin actions like adding/removing cars could go here -->
</body>
</html>
