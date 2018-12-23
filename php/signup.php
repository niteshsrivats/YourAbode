<?php
session_start();
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "your_abode";

// Database Name
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Connnection
if ($conn -> connect_error)
  die("Connection failed: " . $conn -> connect_error);

// Username & Password from Form
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["number"];
// SQL Query

$sql = "INSERT INTO accounts (name, phone_number, email_id, password)
        VALUES ('$name', $phone, '$email', '$password')";
// Result of SQL Query
if ($conn -> query($sql) === true) {
  $_SESSION["name"] = $name;
  $_SESSION["phone"] = $phone;
  $_SESSION["email"] = $email;
  include "../html/homepage.html";
}
else
  include "../html/signup.html";

$conn->close();
?>
