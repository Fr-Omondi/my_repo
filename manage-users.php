<?php include('includes/db.php'); session_start(); ?>
<?php


$query = "SELECT id, username, password FROM users"; // Fetch password instead of email
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f7f9;
}

/* Table Container */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 16px;
    text-align: left;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Table Header */
table th {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
}

/* Table Rows */
table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

/* Alternate Row Colors */
table tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Hover Effect on Rows */
table tr:hover {
    background-color: #d1e7dd;
    cursor: pointer;
}

/* Action Buttons */
table td a {
    text-decoration: none;
    color: black;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
}

table td a.edit {
    background-color: #2196F3; /* Blue */
}

table td a.delete {
    background-color: #f44336; /* Red */
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    table {
        font-size: 14px;
    }
    table th, table td {
        padding: 10px;
    }
}

        </style>
</head>
<body>

    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th> <!-- Change Email to Password -->
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td> <!-- Display hashed password -->
            <td>
                <a href="edit-user.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete-user.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
