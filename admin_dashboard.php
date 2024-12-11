<?php
include('includes/db.php');

// Connect to the database
 $conn = new mysqli('localhost', 'root', '', 'car_ads');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add a new car
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCar'])) {
    $carModel = $_POST['carModel'];
    $carPrice = $_POST['carPrice'];
    $carDescription = $_POST['carDescription'];

    // Insert the car into the database
    $query = "INSERT INTO cars (model, price, description) VALUES ('$carModel', '$carPrice', '$carDescription')";
    if ($conn->query($query) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Handle deletion of a car
if (isset($_GET['delete'])) {
    $carId = $_GET['delete'];
    $query = "DELETE FROM cars WHERE id = $carId";
    if ($conn->query($query) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all car listings
$query = "SELECT * FROM cars";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Car Listing Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; }
        .sidebar { height: 100vh; position: fixed; top: 0; left: 0; width: 250px; background-color: #343a40; color: #fff; padding-top: 20px; }
        .sidebar a { color: #fff; padding: 15px; text-decoration: none; display: block; }
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 20px; }
    </style>
</head>
<body>

<div class="sidebar">
    <h3 class="text-center">Admin Dashboard</h3>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="add-car.php">Add New Car</a>
    <a href="manage-users.php">Manage Users</a>
    <a href="settings.php">Settings</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h1>Welcome to Admin Dashboard</h1>
    <p>Here, you can manage car listings, users, and other settings for your car listing website.</p>

    <!-- Add New Car Form -->
    <h3>Add New Car</h3>
    <form action="admin_dashboard.php" method="POST">
        <div class="form-group">
            <label for="carModel">Car Model:</label>
            <input type="text" name="carModel" class="form-control" id="carModel" required>
        </div>
        <div class="form-group">
            <label for="carPrice">Car Price:</label>
            <input type="number" name="carPrice" class="form-control" id="carPrice" required>
        </div>
        <div class="form-group">
            <label for="carDescription">Car Description:</label>
            <textarea name="carDescription" class="form-control" id="carDescription" required></textarea>
        </div>
        <button type="submit" name="addCar" class="btn btn-primary">Add Car</button>
    </form>

    <!-- List of Cars -->
    <h3 class="mt-5">Manage Car Listings</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['model'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="edit-car.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="admin_dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
