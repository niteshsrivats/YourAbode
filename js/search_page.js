function get_properties() {
  // Declarations
  var xmlhttp = new XMLHttpRequest();
  
  var city = document.getElementsByName('city');
  var type = document.getElementsByName('type');
  var min = document.getElementById('min').value;
  var max = document.getElementById('max').value;
  var properties = document.getElementById('property-list');
  var option = "";
  var flag = 0;
  // Validity Checks

  for (var i = 0; i < 4; i++)
    if (city[i].checked) {
      city = city[i].value;
      flag = 1;
      break;
    }
  if (flag == 0)
    city = "";
  else
    flag = 0;

  
  for (var i = 0; i < 2; i++)
    if (type[i].checked) {
      type = type[i].value;
      option = document.getElementById('option').value;
      if (option == "SEL")
        option = "";
      flag = 1;
      break;
    }
  if (flag == 0)
    type = "";
  if (isNaN(Number(min)))
    min = "";
  if (isNaN(Number(max)))
    max = "";

  // To PHP
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      properties.innerHTML = this.responseText;
  };
  
  var pass = "city=" + city + "&type=" + type + "&min=" + min + "&max=" + max + "&option=" + option + "&confirm=1";
  xmlhttp.open("POST", "../php/search_page.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(pass);
}

function goto_property(property) {
  var hidden = document.getElementById("hidden");
  var values = property.id.split("_");
  hidden[0].value = values[0];
  hidden[1].value = values[1];
  hidden[2].value = values[2];
  hidden.submit();
}

function get_options() {
  var type = document.getElementsByName('type');
  var options = document.getElementById('options');
  
  if (type[0].checked) {
    options.innerHTML = 'RESIDENTIAL TYPES<br><select id="option"><option value="SEL">--SELECT--</option> <option value="OP">Owner Properties</option><option value="RM">Ready to Move</option><option value="VI">Villas</option></select>';
  }
  else if (type[1].checked) {
    options.innerHTML = 'COMMERCIAL TYPES<br><select id="option"><option value="SEL">--SELECT--</option> <option value="MR">Meeting Rooms</option><option value="OD">Open Desks</option><option value="PC">Personal Cabins</option><option value="EH">Event Halls</option></select>';
  }
}

function valid_tile() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var retval = this.responseText;
      if (retval != "") {
        retval = retval.split(' ');
        if (retval[0] == "RES") {
          var type = document.getElementById("RES");
          type.checked = true;
        }
        else if (retval[0] == "COM") {
          var type = document.getElementById("COM");
          type.checked = true;
        }
        get_options();
        if (retval[1] == "OP") {
          var option = document.getElementById("option");
          option.value = "OP";
        }
        else if (retval[1] == "RM") {
          var option = document.getElementById("option");
          option.value = "RM";
        }
        else if (retval[1] == "VI") {
          var option = document.getElementById("option");
          option.value = "VI";
        }
        else if (retval[1] == "MR") {
          var option = document.getElementById("option");
          option.value = "MR";
        }
        else if (retval[1] == "PC") {
          var option = document.getElementById("option");
          option.value = "PC";
        }
        else if (retval[1] == "OD") {
          var option = document.getElementById("option");
          option.value = "OD";
        }
        else if (retval[1] == "EH") {
          var option = document.getElementById("option");
          option.value = "EH";
        }

        sb = document.getElementById("sb");
        sb.click();
      }
    } 
  }
  xmlhttp.open("POST", "../php/get_tile.php" , true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}
