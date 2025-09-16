<?php
include 'db.php';

// Insert data when form submitted
if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql)) {
        echo "<p style='color:green;'>Record added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}

// Fetch records
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>todayassighment - Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Student</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Save">
    </form>

    <h2>All Students</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
