<?php
// Retrieve the message from the form
$message = $_POST["message"];

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "message";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the message into the database
$sql = "INSERT INTO messages (message) VALUES ('$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
