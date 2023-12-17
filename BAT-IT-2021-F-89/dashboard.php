<?php
session_start();

// Check if lecturer is logged in
if (!isset($_SESSION["lecturer_email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecturer Dashboard</title>
</head>
<body>
    <h2>Lecturer Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION["email"]; ?></p>
    
    <h3>Dashboard Functionalities:</h3>
    <ul>
        <li><a href="view_courses.php">View Courses</a></li>
        <!-- Add more dashboard functionalities as needed -->
    </ul>
    
    <a href="logout.php">Logout</a>
</body>
</html>

