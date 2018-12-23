var temp;
var images = [
"url(../css/images/ReadyToMove.jpg)",
"url(../css/images/OpenDesk.jpg)",
"url(../css/images/PersonalCabin.jpg)"];
var title = ["Ready To Move", "Open Desk", "Personal Cabin"];
slideIndex = 0;

function display() {
  x = document.getElementById("slide");
  x.style.display = "none";
  if (slideIndex >= 3) {
    slideIndex = 0;
  } 

  x.innerHTML = title[slideIndex];
  x.style.backgroundImage = images[slideIndex];
  x.style.display = "block";
  slideIndex += 1;
  temp = setTimeout(display, 3000);
}

function startShow() {
  display();
}


function SlideLink() {
  var pass;
  if (slideIndex == 1)
    pass = "type=RES&option=RM";
  else if (slideIndex == 2)
    pass = "type=COM&option=OD";
  else if (slideIndex == 3)
    pass = "type=COM&option=PC";
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      window.location = "../html/search_page.html"; 

  };
  xmlhttp.open("POST", "../php/homepage.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);
}

function TileLink(option) {
  var pass;
  if (option == "OP" || option == "VI")
    pass = "type=RES&option=" + option;
  else if (option == "EH" || option == "MR")
    pass = "type=COM&option=" + option;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      window.location = "../html/search_page.html";
  };
  xmlhttp.open("POST", "../php/homepage.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);
}