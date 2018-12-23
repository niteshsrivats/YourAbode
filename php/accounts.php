<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "your_abode";
// Database Name
session_start();
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
// Connnection
if ($conn -> connect_error)
  die("Connection failed: " . $conn -> connect_error);

// Username & Password from Form
$inner = "";
$phone = $_SESSION["phone"];

// SQL Query
$sql = "SELECT * FROM accounts WHERE phone_number = $phone";

$result = $conn -> query($sql);
$owner = $result -> fetch_assoc();
$account_id = $owner["account_id"];
$inner = '<div id="inf"><b><u>Owner Details</b></u><br>
            ID: '.$owner["account_id"].'<br>
            Type: '.$owner["type"].'<br>
            Name: ' .$owner["name"].'<br>
            Phone Number: '.$owner["phone_number"].'<br>
            Email: '.$owner["email_id"].'<br>
          </div>
          <div id="inf"><br>
            <table class="tg" border="1">
                <caption><b><u>Property Details</b></u></caption>
              <tr>
                <th class="tab">House Id</th>
                <th class="tab">House Name<br></th>
                <th class="tab">City <br></th>
                <th class="tab">Area<br></th>
                <th class="tab">Rent Price<br></th>
                <th class="tab">Address<br></th>
                <th class="tab">Type<br></th>
                <th class="tab">Delete<br></th>
              </tr>';
$sql = "SELECT house_id FROM houses WHERE account_id = $account_id";
$result = $conn -> query($sql);


if ($result -> num_rows > 0) {
  $flag_c = 0;
  $flag_r = 0;
  $sqlr = 'SELECT * FROM residential';
  $sqlc = 'SELECT * FROM commercial c LEFT JOIN commercial_types ct ON ct.house_id = c.house_id';
  while($row = $result -> fetch_assoc()) {
    if ($row["house_id"] < 500000){
      if ($flag_r == 0) {
        $flag_r = 1; 
        $sqlr .= " WHERE house_id = ".$row["house_id"];
      }
      else
        $sqlr .= " OR house_id = ".$row["house_id"];
    }
    else {
      if ($flag_c == 0) {
        $flag_c = 1; 
        $sqlc .= " WHERE c.house_id = ".$row["house_id"];
      }
      else 
        $sqlc .= " OR c.house_id = ".$row["house_id"];
    }
  }

  $result = $conn -> query($sqlr);
  if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      if ($row["city"] == "BLR")
        $city = "Bangalore";
      else if ($row["city"] == "MAS")
        $city = "Chennai";
      else if ($row["city"] == "DEL")
        $city = "Delhi";
      else if ($row["city"] == "BOM")
        $city = "Mumbai";
      if ($row["type"] == "OP")
        $type = "Owner Property";
      else if ($row["type"] == "RM")
        $type = "Ready To Move";
      else if ($row["type"] == "VI")
        $type = "Villa";

      $inner .= '<tr >
                  <td class="tab">'.$row["house_id"].'</td>
                  <td class="tab">'.$row["house_name"].'</td>
                  <td class="tab">'.$city.'</td>
                  <td class="tab">'.$row["area"].'</td>
                  <td class="tab">'.$row["rent_price"].'</td>
                  <td class="tab">'.$row["address"].'</td>
                  <td class="tab">'.$type.'</td>
                  <td class="tab"><input type="button" id="'.$row["house_id"].'_RES_'.$row["type"].'" value="Delete" onclick="del(this);"/></td>
                </tr>';
    }
  }

  $result = $conn -> query($sqlc);
  if ($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      if ($row["city"] == "BLR")
        $city = "Bangalore";
      else if ($row["city"] == "MAS")
        $city = "Chennai";
      else if ($row["city"] == "DEL")
        $city = "Delhi";
      else if ($row["city"] == "BOM")
        $city = "Mumbai";
      
      if ($row["type"] == "MR")
        $type = "Meeting Room";
      else if ($row["type"] == "OD")
        $type = "Open Desk";
      else if ($row["type"] == "PC")
        $type = "Personal Cabin";
      else if ($row["type"] == "EH")
        $type = "Event Hall";

      $inner .= '<tr>
                  <td class="tab">'.$row["house_id"].'</td>
                  <td class="tab">'.$row["house_name"].'</td>
                  <td class="tab">'.$city.'</td>
                  <td class="tab">'.$row["area"].'</td>
                  <td class="tab">'.$row["rent_price"].'</td>
                  <td class="tab">'.$row["address"].'</td>
                  <td class="tab">'.$type.'</td>
                  <td class="tab"><input type="button" id="'.$row["house_id"].'_'.'COM_'.$row["type"].'" value="Delete" onclick="del(this);"/></td>
                </tr>';
    }
  }
}
echo $inner;
$conn->close();
?>
<!-- 
  <tr>
    <td class="tab"></td>
    <td class="tab"></td>
    <td class="tab"></td>
    <td class="tab"></td>
    <td class="tab"></td>
    <td class="tab"></td>
    <td class="tab"></td>
  </tr>
</table> -->
