<?php include('includes/db.php'); session_start(); ?>
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
