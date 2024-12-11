<?php include('includes/db.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == 'admin') {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: user_dashboard.php');
            }
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Style for the Login heading */
        h1 {
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style for the form container */
        form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style for the input fields */
        input[type="text"], 
        input[type="password"] {
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

        /* Responsive adjustments */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="submit"] {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
