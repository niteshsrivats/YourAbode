function passDetails() {
  if(validatePwd() && validateConfirmPwd())
 { owner = document.getElementById("details");
  newpass = document.getElementsByName("newpass")[0];
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      window.location = "../html/accounts.html";
  };
  pass = "newpass=" + newpass.value;
  xmlhttp.open("POST", "../php/change_pass.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);}
}
function create_form(){
    var division=document.getElementById("details");
    division.innerHTML="<input type='password' name='newpass' id='pwd' placeholder='New Password' onchange='validatePwd();'/><span class='error-message'></span><br><input type='password' name='confpass' id='confirm-pwd' placeholder='Confirm Password' onchange='validateConfirmPwd();'/><span class='error-message'></span><br><input type='button' value='Submit' onclick='passDetails();'/>";
}
function validatePwd() {
  var password = document.getElementById("pwd");
  var error = document.getElementsByClassName("error-message")[0];
  // Lowercase, Uppercase, Number, Special Character
  var flag = [0, 0, 0, 0];
  
  if (password.value.match(/^\S{8,18}$/)) {
    for (var index in password.value) {
      if (password.value[index].match(/^[a-z]$/))
        flag[0] = 1;
      else if (password.value[index].match(/^[A-Z]$/))
        flag[1] = 1;
      else if (password.value[index].match(/^[1-9]$/))
        flag[2] = 1;
      else
        flag[3] = 1;
    }
  }
  if (flag[0] == 1 && flag[1] == 1 && flag[2] == 1 && flag[3] == 1)
   { error.innerHTML = ""; return true;}
  else
   { error.innerHTML = "8-18 length atleast 1 uppercase, number, special";
        return false;}
}
function validateConfirmPwd() {
  var password = document.getElementById("pwd");
  var confirm = document.getElementById("confirm-pwd");
  var error = document.getElementsByClassName("error-message")[1];
  if (password.value == confirm.value) {
    error.innerHTML = "";
      return true;
  }
  else{
    error.innerHTML = "Passwords do not match";
    return false;}
}

function getDetails() {
  owner = document.getElementById("details");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      owner.innerHTML = this.responseText;
  };

  xmlhttp.open("POST", "../php/accounts.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}

function gotoUpload() {
  window.location = "../html/upload_property.html"
}


function del(values) {
  values = values.id.split("_");
  pass = "id=" + values[0] + "&type=" + values[1] + "&option=" + values[2];
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      window.location.reload();
  };
  xmlhttp.open("POST", "../php/del.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);

}