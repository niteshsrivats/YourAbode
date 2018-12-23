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
$username = $_POST["username"];
$password = $_POST["password"];
// SQL Query
$sql = "SELECT * FROM accounts WHERE phone_number = '$username' OR email_id = '$username' OR account_id = '$username'";
// Result of SQL Query
$result = $conn -> query($sql);

// Checks for non-empty result with a matching password
if ($result -> num_rows == 1) {
  $row = $result -> fetch_assoc();
  if ($row["password"] == $password) {
    $_SESSION["name"] = $row["name"];
    $_SESSION["phone"] = $row["phone_number"];
    $_SESSION["email"] = $row["email_id"];
    echo "../html/homepage.html";
  }
  else
    echo "*Incorrect Username or Password";
}
else 
  echo "*Incorrect Username or Password";

$conn->close();
?>
