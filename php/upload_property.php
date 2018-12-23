<?php

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
        $uploadOk = 1;
    else
        $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file))
    $uploadOk = 0;

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000)
    $uploadOk = 0;

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
    $uploadOk = 0;

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $uploadOk = 1;
    }
    else {
      $uploadOk = 0;
    }
  }

if ($uploadOk == 1) {
  $serverName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "your_abode";

  // Database Name
  $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
  
  // Connnection
  if ($conn -> connect_error)
    die("Connection failed: " . $conn -> connect_error);

  $name = $_POST["owner-name"];
  $phone = $_POST["number"];
  $type = $_POST["type"];
  $property = $_POST["property-name"];
  $description = $_POST["description"];
  $city = $_POST["city"];
  $address = $_POST["address"].', '.$city.', '.$_POST["state"].', '.$_POST["code"].'.';
  $city = $_POST["city"];
  $features = $_POST["features"];


  // SQL Query
  $sql = "SELECT * FROM accounts WHERE phone_number = $phone OR name = '$name'";
  $result = $conn -> query($sql);
  if ($result -> num_rows == 1) {
    $owner = $result -> fetch_assoc();
    $id = $owner["account_id"];
    if ($type == "RES") {
      $sell = $_POST["r1"];
      $rent = $_POST["r2"];
      $area = $_POST["r3"];
      $option = $_POST["r4"];
      $sql = "INSERT INTO residential (house_name, city, area, sell_price, rent_price, address, images, features, description, type) VALUES ('$property', '$city', $area, $sell, $rent, '$address', '$target_file', '$features', '$description', '$option')";
      $result = $conn -> query($sql);
      $sql = "SELECT house_id FROM residential WHERE images = '$target_file'";
      $result = $conn -> query($sql);
      $row = $result -> fetch_assoc();
      $house_id = $row["house_id"];
      $sql = "INSERT INTO houses (house_id, account_id) VALUES ($house_id, $id)";
      $result = $conn -> query($sql);
    }
    else if ($type == "COM") {
      $sql = "INSERT INTO commercial (house_name, city, address, images, features, description) VALUES ('$property', '$city', '$address', '$target_file', '$features', '$description')";
      $result = $conn -> query($sql);
      $sql = "SELECT house_id FROM commercial WHERE images = '$target_file'";
      $result = $conn -> query($sql);
      $row = $result -> fetch_assoc();
      $house_id = $row["house_id"];
      $c1 = $_POST["c1"];
      $c2 = $_POST["c2"];
      $c3 = $_POST["c3"];
      $c4 = $_POST["c4"];
      $c5 = $_POST["c5"];
      $c6 = $_POST["c6"];
      $c7 = $_POST["c7"];
      $c8 = $_POST["c8"];
      $c9 = $_POST["c9"];
      $c10 = $_POST["c10"];
      $c11 = $_POST["c11"];
      $c12 = $_POST["c12"];
      $c13 = $_POST["c13"];
      $c14 = $_POST["c14"];
      $c15 = $_POST["c15"];
      $c16 = $_POST["c16"];
      $sql = "INSERT INTO commercial_types (house_id, hourly_rate, weekly_rate, rent_price, area, type) VALUES ($house_id, $c1, $c2, $c3, $c4, 'PC')";
      $result = $conn -> query($sql);

      $sql = "INSERT INTO commercial_types (house_id, hourly_rate, weekly_rate, rent_price, area, type) VALUES ($house_id, $c5, $c6, $c7, $c8, 'MR')";
      $result = $conn -> query($sql);

      $sql = "INSERT INTO commercial_types (house_id, hourly_rate, weekly_rate, rent_price, area, type) VALUES ($house_id, $c9, $c10, $c11, $c12, 'OD')";
      $result = $conn -> query($sql);

      $sql = "INSERT INTO commercial_types (house_id, hourly_rate, weekly_rate, rent_price, area, type) VALUES ($house_id, $c13, $c14, $c15, $c16, 'EH')";
      $result = $conn -> query($sql);
    }
    $sql = "INSERT INTO houses (house_id, account_id) VALUES ($house_id, $id)";
    $result = $conn -> query($sql);
  }
  $conn->close();
  include "../html/accounts.html";
}
else 
  include "../html/upload_property.html";
?>
