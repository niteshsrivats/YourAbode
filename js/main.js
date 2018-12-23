function signout() {
  var xmlhttp = new XMLHttpRequest();
  var signs = document.getElementById("signs");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      signs.innerHTML = this.responseText;
      window.location = "../html/homepage.html";
    }
 
  };
  xmlhttp.open("POST", "../php/signout_button.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}

function getButtons() {
  var signs = document.getElementById("signs");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      signs.innerHTML = this.responseText;
    }
        
  };
  xmlhttp.open("POST", "../php/signin_button.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}

function search() {
  var xmlhttp = new XMLHttpRequest();
  var name = document.getElementsByName("search-bar")[0];
  pass = "name=" + name.value;
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      window.location = "../html/search_page.html";
  }
  xmlhttp.open("POST", "../php/search_valid.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);  
}

function valid_search() {
  var xmlhttp = new XMLHttpRequest();
  var properties = document.getElementById('property-list');
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      properties.innerHTML = this.responseText; 
  }
  xmlhttp.open("POST", "../php/search_page.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}