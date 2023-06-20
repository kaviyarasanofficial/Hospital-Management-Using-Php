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

// Check if the patient's mobile number or email already exists in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];

  // Prepare the SQL statement with placeholders to prevent SQL injection
  $sql = "SELECT * FROM patients WHERE mobile = ? OR email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $mobile, $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Patient already exists
    echo "exists";
  } else {
    // Patient does not exist
    echo "not_exists";
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>