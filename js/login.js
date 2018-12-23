function check_credentials() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      if (this.responseText[0] == ".")
        window.location = this.responseText;
      else
        document.getElementById("error-message").innerHTML = this.responseText;
  };
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var pass = "username=" + username + "&password="+password;
  xmlhttp.open("POST", "../php/login.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);
}