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
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $designation = $_POST["designation"];
    $course = $_POST["course"];
    $gender = $_POST["gender"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert data into the Lecturer table
    $sql = "INSERT INTO Lecturer (Name, Email, Designation, CourseID, Gender, Password) 
            VALUES ('$name', '$email', '$designation', '$course', '$gender', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecturer Registration</title>
</head>
<body>
    <h2>Lecturer Registration</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Designation: <input type="text" name="designation" required><br>
        Course:
        <select name="course" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row["CourseID"]; ?>"><?php echo $row["Title"]; ?></option>
            <?php endwhile; ?>
        </select><br>
        Gender:
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php
$conn->close();
?>

