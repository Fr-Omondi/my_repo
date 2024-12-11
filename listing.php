<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Car Listings</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

    <section>
        <div class="car-grid">
            <?php
            $query = "SELECT * FROM cars";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                echo '<div class="car-item">';
                echo '<img src="./images/' . $row['image'] . '" alt="' . $row['model'] . '">';
                echo '<h3>' . $row['model'] . '</h3>';
                echo '<p>Price: $' . $row['price'] . '</p>';
                echo '<a href="car.php?id=' . $row['id'] . '">View Details</a>';
                echo '</div>';
            }
           
            ?>
            
        </div>
    </section>
</body>
</html>
