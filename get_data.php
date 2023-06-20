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


// Retrieve all patients data from the database
$result = $conn->query("SELECT * FROM patients");

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td class='mobile'>" . $row["mobile"] . "</td>";
    echo "<td class='email'>" . $row["email"] . "</td>";
    echo "<td>
            <button class='edit-btn' data-id='" . $row["id"] . "'>Edit</button>
            <button class='delete-btn' data-mobile='" . $row["mobile"] . "'>Delete</button>
          </td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>No patients registered</td></tr>";
}

$conn->close();
?>
