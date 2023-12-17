<?php
//include 'db.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ATIWEB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];

// Retrieve lecturer information
$result = $conn->query("SELECT * FROM Lecturer WHERE Email = '$email'");

if ($result->num_rows == 1) {
    $lecturer = $result->fetch_assoc();
    $courseID = $lecturer["CourseID"];

    // Retrieve course information
    $courseResult = $conn->query("SELECT * FROM Course WHERE CourseID = '$courseID'");

    if ($courseResult->num_rows == 1) {
        $course = $courseResult->fetch_assoc();
        $courseTitle = $course["Title"];
        $courseDescription = $course["Description"];
    } else {
        $courseTitle = "N/A";
        $courseDescription = "N/A";
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Courses</title>
</head>
<body>
    <h2>View Courses</h2>
    <p>Lecturer: <?php echo $lecturer["Name"]; ?></p>
    <p>Email: <?php echo $lecturer["Email"]; ?></p>
    
    <h3>Course Information:</h3>
    <p>Course Title: <?php echo $courseTitle; ?></p>
    <p>Course Description: <?php echo $courseDescription; ?></p>
    
    <a href="dashboard.php">Back to Dashboard</a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>
