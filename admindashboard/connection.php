<?php
// Connect to the database
$conn = new mysqli('localhost', 'username', 'password', 'carlisting_db');

// Get form data
$carName = $_POST['carName'];
$carPrice = $_POST['carPrice'];
$carDescription = $_POST['carDescription'];

// Insert the car into the database
$query = "INSERT INTO cars (name, price, description) VALUES ('$carName', '$carPrice', '$carDescription')";
$conn->query($query);

// Redirect to the dashboard
header('Location: dashboard.php');
?>
