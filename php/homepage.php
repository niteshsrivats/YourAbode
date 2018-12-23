<?php
  session_start();
  $type = $_POST["type"];
  $option = $_POST["option"];
  $_SESSION["valid_tile"] = 1;
  $_SESSION["tile_type"] = $type;
  $_SESSION["tile_option"] = $option;
?>