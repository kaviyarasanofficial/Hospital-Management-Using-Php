<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Store patient data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];

  // Prepare the SQL statement with placeholders to prevent SQL injection
  $sql = "INSERT INTO patients (mobile, email) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $mobile, $email);
  $stmt->execute();

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>