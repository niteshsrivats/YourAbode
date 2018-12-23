<?php
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
//$id=$_SESSION["account_id"];
$id=3;
$password = $_POST["newpass"];
// SQL Query
$sql = "UPDATE accounts SET password='$password' WHERE account_id='$id'";
// Result of SQL Query
$result = $conn -> query($sql);
$conn->close();
?>
