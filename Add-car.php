<?php include('includes/db.php'); session_start(); ?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_name = $_POST['car_name'];
    $car_model = $_POST['car_model'];
    $price = $_POST['price'];

    // Insert car data into the database
    $query = "INSERT INTO cars (name, model, price) VALUES ('$car_name', '$car_model', '$price')";
    if (mysqli_query($conn, $query)) {
        echo "Car added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
</head>
<body>
    <h2>Add a New Car</h2>
    <form action="add-car.php" method="POST">
        <label for="car_name">Car Name:</label><br>
        <input type="text" id="car_name" name="car_name" required><br>

        <label for="car_model">Car Model:</label><br>
        <input type="text" id="car_model" name="car_model" required><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <input type="submit" value="Add Car">
    </form>
</body>
</html>
