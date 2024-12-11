<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <link rel="stylesheet" href="css/styles.css">


    
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<!-- Include Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
        /* h1 {
            font-family: Arial, sans-serif;
            font-size: 2em;
            color: #333;
            text-align: center;
        } */

        i {
            color:  #ff6b6b; /* Car icon color */
            margin-right: 10px;
        }
    </style>

</head>
<body>
    <header>
        <h1> <i class="fas fa-car"></i> Welcome to Car Listings</h1>
        <nav>
            <a href="listing.php">Browse Cars</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="contact.php">Contact Us</a>
            <a href="store.php">Store</a>
        </nav>
    </header>

    <section>
        
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing Stores</title>
    <!-- Include Font Awesome for Car Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .car-praise-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;

        }

        .car-praise-container h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
     
        .car-icons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .car-icons .icon {
            background-color:  #efefef;
            border-radius: 50%;
            padding: 15px;
            font-size: 40px;
            color: #ff6b6b;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .car-icons .icon:hover {
            transform: scale(1.1);
            background-color: #ff6b6b;
            color: #fff;
        }

        .praise-text {
            font-size: 1.2em;
            color: #555;
            line-height: 1.6;
            margin: 0 10%;
        }

        @media (max-width: 600px) {
            .praise-text {
                margin: 0 5%;
            }

            .car-praise-container h1 {
                font-size: 2em;
            }

            .car-icons .icon {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="car-praise-container">
        <h1>Fredrick's  Car Listing Stores</h1>

        <div class="car-icons">
            <i class="fas fa-car icon"></i>
            <i class="fas fa-car-side icon"></i>
            <i class="fas fa-car-alt icon"></i>
            <i class="fas fa-taxi icon"></i>
            <i class="fas fa-car-crash icon"></i>
            <i class="fas fa-truck icon"></i>
        </div>

        <p class="praise-text">
            Car listing stores provide an incredible platform for buyers and sellers to connect. Whether you're looking for a sleek sedan, a family SUV, or a heavy-duty truck, car listing stores have something for everyone. Their vast inventory, trusted services, and user-friendly platforms make finding your dream car easier than ever.
        </p>

        <p class="praise-text">
            With updated listings, competitive prices, and reliable sellers, these stores redefine convenience. Whether you're a first-time buyer or an experienced dealer, the quality and accessibility offered by car listing platforms is unmatched.
        </p>
    </div>

</body>
</html>

        <div class="car-grid">
            <?php
            $query = "SELECT * FROM cars WHERE featured = 1";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                echo '<div class="car-item">';
                echo '<img src="images/' . $row['image'] . '" alt="' . $row['model'] . '">';
                echo '<h3>' . $row['model'] . '</h3>';
                echo '<p>Price: $' . $row['price'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <footer class="bg-dark text-light pt-5 pb-4">
    <div class="container text-center text-md-left">
        <div class="row text-center text-md-left">
            <!-- Company Info -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">CarZone</h5>
                <p>
                    The best place to advertise and find cars. Whether you're buying or selling, discover the perfect vehicle here.
                </p>
            </div>

            <!-- Contact Information -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact Us</h5>
                <p>
                    <i class="fas fa-home mr-3"></i>  Main Street, Nairobi, Country
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> support@carzone.com
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i> +254 719 165 149
                </p>
            </div>

            <!-- Social Media Links -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Follow Us</h5>
                <!-- Social media icons -->
                <a href="https://wa.me/1234567890" class="btn btn-outline-light btn-floating m-1" role="button" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/yourpage" class="btn btn-outline-light btn-floating m-1" role="button" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/yourhandle" class="btn btn-outline-light btn-floating m-1" role="button" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/yourprofile" class="btn btn-outline-light btn-floating m-1" role="button" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@kingfredy2" class="btn btn-outline-light btn-floating m-1" role="button" aria-label="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>

        <hr class="mb-4">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <p class="text-center text-md-left">
                    © 2024 CarZone. All Rights Reserved.
                </p>
            </div>

            <div class="col-md-4 col-lg-4">
                <p class="text-center text-md-right">
                    Designed by <a href="#" class="text-warning" style="text-decoration: none;">Fredrick Omondi</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Include Bootstrap and FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
