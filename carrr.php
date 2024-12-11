<?php include('includes/db.php'); 
$id = $_GET['id'];
$query = "SELECT * FROM cars WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['model']; ?> Details</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <h1><?php echo $row['model']; ?> Details</h1>
        <nav>
            <a href="listing.php">Back to Listings</a>
        </nav>
    </header>
   
    <section>
        <img src="images<?php echo $row['image']; ?>" alt="Car Image">
        <h2><?php echo $row['model']; ?></h2>
        <p>Price: $<?php echo $row['price']; ?></p>
        <p><?php echo $row['description']; ?></p>
    </section>
</body>
</html> -->
