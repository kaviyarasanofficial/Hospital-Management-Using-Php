<?php
// Assuming you already have a database connection ($conn) established
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];

  // Prepare and execute the query to update patient data
  $stmt = $conn->prepare("UPDATE patients SET email = ? WHERE mobile = ?");
  $stmt->bind_param("ss", $email, $mobile);
  $stmt->execute();
  $stmt->close();

  // Send a response back to the AJAX request
  echo "success";
}

?>
