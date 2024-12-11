<?php
include('includes/db.php');

// Get car ID from URL
$carId = $_GET['id'];

// Fetch the car data to be edited
$conn = new mysqli('localhost', 'root', '', 'car_ads');
$query = "SELECT * FROM cars WHERE id = $carId";
$result = $conn->query($query);
$car = $result->fetch_assoc();

// Handle form submission to update the car
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carModel = $_POST['carModel'];
    $carPrice = $_POST['carPrice'];
    $carDescription = $_POST['carDescription'];

    // Update the car in the database
    $updateQuery = "UPDATE cars SET model='$carModel', price='$carPrice', description='$carDescription' WHERE id=$carId";
    if ($conn->query($updateQuery) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car - Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="content">
    <h1>Edit Car Listing</h1>

    <form action="edit-car.php?id=<?= $carId ?>" method="POST">
        <div class="form-group">
            <label for="carModel">Car Model:</label>
            <input type="text" name="carModel" class="form-control" id="carModel" value="<?= $car['model'] ?>" required>
        </div>
        <div class="form-group">
            <label for="carPrice">Car Price:</label>
            <input type="number" name="carPrice" class="form-control" id="carPrice" value="<?= $car['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="carDescription">Car Description:</label>
            <textarea name="carDescription" class="form-control" id="carDescription" required><?= $car['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Car</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
