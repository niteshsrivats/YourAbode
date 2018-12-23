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

$inner = "";
function display($result, $type) {
  while($row = $result -> fetch_assoc()) {
    if ($type == "RES")
      $area = $row["area"]." Sqft";
    else
      $area = $row["area"]." Seater";

    $city = $row["city"];
    if ($city == "BLR")
      $city = "Bangalore";
    else if ($city == "MAA")
      $city = "Chennai";
    else if ($city == "DEL")
      $city = "Delhi";
    else if ($city == "BOM")
      $city = "Mumbai";
      
    $property_type = $row["type"];
    if ($property_type == "OP")
      $property_type = "Owner Properties";
    else if ($property_type == "RM")
      $property_type = "Ready to Move";
    else if ($property_type == "VI")
      $property_type = "Villas";
    else if ($property_type == "MR")
      $property_type = "Meeting Rooms";
    else if ($property_type == "OD")
      $property_type = "Open Desks";
    else if ($property_type == "PC")
      $property_type = "Personal Cabin";
    else if ($property_type == "EH")
      $property_type = "Event Halls";

    $GLOBALS['inner'] .= '<div class="property_tiles" id="'.$row["house_id"].'_'.$type.'_'.$row["type"].'" onclick="goto_property(this);"><div class="inner" style="background-image:url('.$row["images"].');">'.$row["house_name"].'</div><div class="info">City: '.$city.'<br>Area: '.$area.'<br>Rent Price: ₹'.$row["rent_price"].'<br>Type: '.$property_type.'</div></div>';
  }
}

function search_bar($name) {

  $sql = "SELECT area, house_id, house_name, images, city, rent_price, type FROM residential WHERE house_name LIKE '%$name%'";
  
  $result = $GLOBALS['conn'] -> query($sql);
  if ($result -> num_rows > 0){
    $type = "RES";
    display($result, $type);
  }

  $sql = "SELECT area, c.house_id, house_name, images, city, rent_price, type FROM commercial c LEFT JOIN commercial_types ct ON c.house_id = ct.house_id WHERE house_name LIKE '%$name%' ORDER BY house_name";
  $result = $GLOBALS['conn'] -> query($sql);
  if ($result -> num_rows > 0) {
    $type = "COM";
    display($result, $type);
  }
}

function search($type) {
  // Elements from Form
  $city = $_POST["city"];
  $min = $_POST["min"];
  $max = $_POST["max"];
  $option = $_POST["option"];
  // Declarations for preparing query
  $flag = 0;
  $hflag = 0;
  $where = "";
  $having = "";
  $order = "";

  $from = "SELECT area, house_id, house_name, images, city, rent_price, type FROM residential";

  // Query Preparation
  if ($type == "COM") {
    $from = "SELECT area, c.house_id, house_name, images, city, rent_price, type FROM commercial c LEFT JOIN commercial_types ct ON c.house_id = ct.house_id";
    $order = "ORDER BY house_name";
    if ($option != NULL) {
        $where .= " WHERE type= '$option'";
        $flag = 1;
    }
  }
  else if($type == "RES"){
    if ($option != NULL) {
      $where = " WHERE type = '$option'";
      $flag = 1;
    }
  }

  if ($city != NULL) {
    if ($flag == 1)
      $where .= " AND city = '$city'";
    else
      $where = " WHERE city = '$city'";
  }

  if ($min != NULL) {
    $having = " HAVING rent_price >= $min";
    $hflag = 1;
  }

  if ($max != NULL) {
    if ($hflag == 1)
      $having .= " AND rent_price <= $max";
    else
      $having = " HAVING rent_price <= $max";
  }

  // SQL Query
  $sql = "$from $where $having $order";

  // Result of SQL Query
  $result = $GLOBALS['conn'] -> query($sql);
  $inner = "";
  if ($result -> num_rows > 0) 
    display($result, $type); 
}

if (isset($_SESSION["valid_search"])) {
  if ($_SESSION["valid_search"] == 1) {
    $_SESSION["valid_search"] = 0;
    $name = $_SESSION["search_name"];
    search_bar($name);
  }
  else {
    $type = $_POST["type"];
    if ($type == "COM")
      search($type);
    else if ($type == "RES")
      search($type);
    else {
      $type = "RES";
      search($type);
      $type = "COM";
      search($type);
    }
  }
}
else if (isset($_POST['confirm'])){
  $type = $_POST["type"];
    if ($type == "COM")
      search($type);
    else if ($type == "RES")
      search($type);
    else {
      $type = "RES";
      search($type);
      $type = "COM";
      search($type);
    }
}
echo $inner;
$conn->close();
?>
