<?php
session_start();
session_unset();
echo '<a class="signin" href="../html/login.html">Sign In</a>
<a class="signin" href="../html/signup.html">Sign Up</a>';
?>