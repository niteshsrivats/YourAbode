function validateName() {
  var name = document.getElementById("name");
  var error = document.getElementsByClassName("error-message");
  error = error[0];
  // Module to Validate name and change to Title Case
  var tempName = "";
  // Acts are a flag for validity check and to convert Title Case
  var titleFlag = 0;

  name.value = name.value.trim();
  name.value = name.value.toLowerCase();

  if (name.value == "")
    error.innerHTML = "Name cannot be empty";
  else {
    for (var index in name.value) {
      if (name.value[index].match(/^[a-zA-Z]$/)) {
        // Checks for letter
        if (index == 0)
          // First letter is capitalized
          tempName += name.value[index].toUpperCase();
        else {
          if (titleFlag == 1) {
            // Letter following a space is capitalized
            tempName += name.value[index].toUpperCase();
            titleFlag = 0;
          }
          else
            // Lower case letter is not affected
            tempName += name.value[index];
        }
      
      }

      else if(name.value[index].match(/^\s$/)) {
        // Checks for space and updates flag
        tempName += name.value[index];
        titleFlag = 1;
      }

      else {
        // Invalid character check
        titleFlag = 1;
        break;
      }
    }

    if (titleFlag == 1)
      // Throws the error 
      error.innerHTML = "Invalid Name";
    else {
      // Updates value attribute
      error.innerHTML = "";
      name.value = tempName;
    }
  }
}

function validateEmail() {
  var email = document.getElementById("email");
  var error = document.getElementsByClassName("error-message");
  error = error[1];

  email.value = email.value.toLowerCase();
  if (email.value.match(/^\S+@\S+\.\S+$/))
    error.innerHTML = "";
  else
    error.innerHTML = "Invalid Email ID";
}

function validatePwd() {
  var password = document.getElementById("pwd");
  var error = document.getElementsByClassName("error-message");
  error = error[2];
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
    error.innerHTML = "";
  else
    error.innerHTML = "8-18 length atleast 1 uppercase, number, special";
}

function validateConfirmPwd() {
  var password = document.getElementById("pwd");
  var confirm = document.getElementById("confirm-pwd");
  var error = document.getElementsByClassName("error-message");
  error = error[3];
  if (password.value == confirm.value) {
    error.innerHTML = "";
  }
  else
    error.innerHTML = "Passwords do not match";
}

function validateNumber() {
  var phone = document.getElementsByName("number")[0];
  if (phone.value.length == 10 && isNaN(Number(phone.value)) == false)
    return true
  else
    phone.value = "";
  return false;
}

function validate() {  
  fields = [document.getElementById("name"),
             document.getElementById("email"),
             document.getElementById("pwd"),
             document.getElementById("confirm-pwd")]
  var error = document.getElementsByClassName("error-message");
  var flag = 0;
  validateName();
  validateEmail();
  validatePwd();
  validateConfirmPwd();
  var x = validateNumber();
  if (!x) 
    return false;
    
  for (var i = 0; i < 4; i++) {
    if (fields[i].value == "") {
      flag = 1;
      break;
    }
  }
  for (var i = 0; i < 4; i++) {
    if (error[i].innerHTML != "") {
      flag = 1;
      break;
    }
  }
  
  if (flag == 1)
    return false;
  else
    return true;
}