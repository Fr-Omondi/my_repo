<?php include('includes/db.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($query) === TRUE) {
        echo "Message sent!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Style for the Contact Us heading */
h1 {
    font-family: Arial, sans-serif;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Style for the form container */
form {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Style for the input fields and textarea */
input[type="text"], 
input[type="email"], 
textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    font-size: 16px;
}

/* Style for the submit button */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effect for submit button */
input[type="submit"]:hover {
    background-color: #45a049;
}

/* Style for the textarea */
textarea {
    height: 150px;
    resize: none;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }
    
    input[type="submit"] {
        font-size: 16px;
    }
}


/* Footer Styles */
.footer {
  background-color: #333;
  color: #fff;
  padding: 60px 0;
  text-align: center;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.footer-content {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.footer-content p {
  margin-bottom: 10px;
}

.social-media {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 20px;
}

.social-media li {
  display: inline;
}

.social-media a {
  color: #fff;
  font-size: 20px;
  transition: color 0.3s;
}

.social-media a:hover {
  color: #1da1f2; /* Change to match platform color on hover */
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
  }
  
  .social-media {
    gap: 15px;
  }
}

@media (max-width: 480px) {
  .social-media a {
    font-size: 18px;
  }
}


        </style>
</head>
<body>
    <h1>Contact Us</h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br>
        <input type="submit" value="Send">
    </form>


    <footer class="footer">
  <div class="footer-container">
    <div class="footer-content">
      <p>&copy; 2024 Your Company. All Rights Reserved.</p>
      <ul class="social-media">
        <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
      </ul>
    </div>
  </div>
</footer>

</body>
</html>
