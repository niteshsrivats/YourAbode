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
$id = $_POST["id"];
$type = $_POST["type"];
$option = $_POST["option"];

// SQL Query

if ($type == "RES") {
  $sql = "DELETE FROM residential WHERE house_id = $id";
  $result = $conn -> query($sql);
}
else if ($type == "COM") {
  $sql = "DELETE FROM commericial WHERE house_id = $id";
  $result = $conn -> query($sql);
  
  $sql = "DELETE FROM commericial_types WHERE house_id = $id AND type = '$type'";
  $result = $conn -> query($sql);
}
$sql = "DELETE FROM houses WHERE house_id = $id";
$result = $conn -> query($sql);
$conn->close();
?>
