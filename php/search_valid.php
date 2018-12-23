<?php
  session_start();
  $name = $_POST["name"];
  $_SESSION["valid_search"] = 1;
  $_SESSION["search_name"] = $name;
?>