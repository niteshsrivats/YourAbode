<?php
session_start();
if (isset($_SESSION["phone"])) {
  echo '<div class="signin" onclick="signout();">Sign Out</div><a class="signin" href="../html/accounts.html">'.$_SESSION["name"].'</a>';
}
else {
  echo '<a class="signin" href="../html/login.html">Sign In</a>
  <a class="signin" href="../html/signup.html">Sign Up</a>';
}
?>