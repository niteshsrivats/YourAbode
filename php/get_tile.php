<?php
  session_start();
  $inner = "";
  if (isset($_SESSION["valid_tile"])) {
    if ($_SESSION["valid_tile"] == 1) {
      $_SESSION["valid_tile"] = 0;
      $type = $_SESSION["tile_type"];
      $option = $_SESSION["tile_option"];
      $inner = $type." ".$option;
    }
  }
  echo $inner;
?>