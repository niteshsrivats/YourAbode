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

$house_id = $_POST["house_id"];
$type = $_POST["type"];
$option = $_POST["option"];
include "../html/property_page_header.html";
if ($type == "RES") {

  $sql = "SELECT * FROM residential WHERE house_id = $house_id";
  $result = $conn -> query($sql);
  $property = $result -> fetch_assoc();
  $type = $property["type"];

  $sql = "SELECT name, phone_number, email_id FROM accounts a, houses h WHERE a.account_id = h.account_id AND h.house_id = $house_id";
  $result = $conn -> query($sql);
  $owner = $result -> fetch_assoc();
  
  if ($type == "OP")
    $type = "Owner Properties";
  else if ($type == "RM")
    $type = "Ready to Move";
  else if ($type == "VI")
    $type = "Villas";

  echo '<div class="wrapper">
          <div id="house-name">'.$property["house_name"].'</div>
          <div id="description" style="background-image:url('.$property["images"].');"><br>
          </div>
          <div id="info"><b><u>Details</b></u><br>'
            .$type.'<br>Sale Price: '.$property["sell_price"].'₹<br>Rent Price: '.$property["rent_price"].'₹
          </div>
          <div id="info"><b><u>Description</b></u><br>'
            .$property["description"].'</div><div id="info"><b><u>Features</b></u><br>'.$property["features"].'
          </div>
          <div id="info"><b><u>Owner Info</b></u><br>'
            .$owner["name"].'<br>+91 '.$owner["phone_number"].'<br>'.$owner["email_id"].'<br>
          </div>
        </div>';
}
else if ($type == "COM") {
  $sql = "SELECT * FROM commercial c LEFT JOIN commercial_types ct ON c.house_id = ct.house_id WHERE c.house_id = $house_id AND type = '$option'";
  $result = $conn -> query($sql);
  $property = $result -> fetch_assoc();

  $type = $property["type"];
  $sql = "SELECT name, phone_number, email_id FROM accounts a, houses h WHERE a.account_id = h.account_id AND h.house_id = $house_id";
  $result = $conn -> query($sql);
  $owner = $result -> fetch_assoc();
  if ($type == "MR")
    $type = "Meeting Rooms";
  elseif ($type == "OD")
    $type = "Open Desks";
  else if ($type == "PC")
    $type = "Personal Cabin";
  else if ($type == "EH")
    $type = "Event Halls";
    // echo $type.' '.$types["hourly_rate"].' '.$types["weekly_rate"].' '.$types["rent_price"].'<br>';

  echo '<div class="wrapper">
          <div id="house-name">'.$property["house_name"].'</div>
          <div id="description" style="background-image:url('.$property["images"].');"><br>
          </div>
          <div id="info"><b><u>Details</b></u><br>'
          .$type.'<br>Hourly Price: '.$property["hourly_rate"].'₹<br>
          Weekly Price: '.$property["weekly_rate"].'₹<br>
          Rent Price: '.$property["rent_price"].'₹
          </div>
          <div id="info"><b><u>Description</b></u><br>'
            .$property["description"].'</div><div id="info"><b><u>Features</b></u><br>'.$property["features"].'
          </div>
          <div id="info"><b><u>Owner Info</b></u><br>'
            .$owner["name"].'<br>+91 '.$owner["phone_number"].'<br>'.$owner["email_id"].'<br>
          </div>
        </div>';
 
}

include "../html/property_page_footer.html";

$conn->close();
?>
