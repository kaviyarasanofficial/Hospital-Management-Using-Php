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
  // Retrieve the data from the AJAX request
  $phoneNumber = $_POST["phoneNumber"];

  // Prepare and execute the query to delete patient data
  $stmt = $conn->prepare("DELETE FROM patients WHERE mobile = ?");
  $stmt->bind_param("s", $phoneNumber); // Assuming the mobile column is of string type
  $stmt->execute();
  $stmt->close();

  // Send a response back to the AJAX request
  echo "success";
}
?>
