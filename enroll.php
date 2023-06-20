<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
<body>
    <!-- enroll.php -->

<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$insert_query = "INSERT INTO patient (name, phone, email) VALUES ('$name', '$mobile','$email')";

if ($conn->query($insert_query) === TRUE) {
    echo "Enrollment successful";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Patient_Name</th>";
    echo "<th>phone </th>";
    echo "<th>Email</th>";
    // Add more table headers for each column in your table

    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        // Add more table cells for each column in your table

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data available";
}

$conn->close();
?>



</body>
</html>