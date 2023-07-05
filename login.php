<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; 
    $dbname = "register";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname); // Update the variable name here

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to check if the email and password match
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
     
        header("Location: user.html");
        exit(); 
    } else {
       
        $error = "Invalid email or password. Please try again.";
    }

  
    $conn->close();
}
?>
