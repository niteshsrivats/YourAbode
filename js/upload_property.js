function validateNames(name) {
  // Module to Validate name and change to Title Case
  var tempName = "";
  // Acts are a flag for validity check and to convert Title Case
  var titleFlag = 0;

  name.value = name.value.trim();
  name.value = name.value.toLowerCase();

  if (name.value != "") {
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
        console.log(name.value[index]);
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
      name.value = "";
    else {
      name.value = tempName;
    return 1
    }
  }
  return 0;
}

function validateText(name) {
  // Module to Validate name and change to Title Case
  var tempName = "";
  // Acts are a flag for validity check and to convert Title Case
  var titleFlag = 0;

  name.value = name.value.trim();
  name.value = name.value.toLowerCase();

  if (name.value != "") {
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

      else if(name.value[index].match(/^[ .,]$/)) {
        // Checks for space and updates flag
        console.log(name.value[index]);
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
      name.value = "";
    else {
      name.value = tempName;
    return 1
    }
  }
  return 0;
}

function validateNumber() {
  var phone = document.getElementsByName("number")[0];
  if (phone.value.length == 10 && isNaN(Number(phone.value)) == false)
    return 1
  else
    phone.value = "";
  return 0;
}

function validateType() {
  var type = document.getElementsByName("type");
  for (var i = 0; i < 2; i++) {
    if (type[i].checked) 
      return 1
  }
  return 0;
}

function validatePrice() {
  var type = document.getElementsByName('type'); 
   if (type[0].checked || type[1].checked) {
      var cell = document.getElementsByClassName("price");
      for (var index = 0; index < cell.length; index++)
        if (isNaN(Number(cell[index].value))) {
          cell[index].value = "";
          return 0;
        }
      return 1;
  }
}

function validateCity() {
  var city = document.getElementsByName("city")[0];
  var state = document.getElementsByName("state")[0];
  for (var i = 0; i < 5; i++) {
    if (city[i].selected) {
      if (city[i].value == "BLR")
        state.value = "Karnataka";
      else if (city[i].value == "MAS")
        state.value = "Tamil Nadu";
      else if (city[i].value == "DEL")
        state.value = "Delhi";
      else if (city[i].value == "BOM")
        state.value = "Maharashtra";
      else {
        state.value = "";
        return 0;
      }
      return 1
    }
  }
}

function validateCode() {
  var code = document.getElementsByName("code")[0];
  if (code.value.length == 6 && isNaN(Number(code.value)) == false)
    return 1
  else
  code.value = "";
  return 0;
}

function validate() {
  var fields = new Array(10);
  // Name
  fields[0] = validateNames(document.getElementsByName("owner-name")[0]);
  // Phone Number
  fields[1] = validateNumber();
  // Type
  fields[2] = validateType();
  // Property Name
  fields[3] = validateNames(document.getElementsByName("property-name")[0]);
  // Description
  fields[4] = validateText(document.getElementsByName("description")[0]);
  // Address
  fields[5] = validateCity();
  // Postal Code
  fields[6] = validateCode();
  // Features
  fields[7] = validateText(document.getElementsByName("features")[0]);
  // Table
  fields[8]= validatePrice();
 
  for (var i = 0; i < 9; i++)
    if (fields[i] == 0)
      return false;
  return true;
}

function get_ops() {
	var type = document.getElementsByName('type');
  var options = document.getElementById('extra_op');
  
  if (type[1].checked) {
    options.innerHTML = '<tr>                                                                          <td>                                                                          Sell Price:<input type="text" name="r1"                                     class="price" placeholder="Sell Price"/>                                  </td>                                                                     </tr>                                                                       <tr>                                                                          <td>                                                                          <br>Rent Price:<input type="text"                                           name="r2"class="price" placeholder="price"/>                             </td>                                                                     </tr>                                                                       <tr>                                                                          <td>                                                                          <br>Area:<input type="text"                                                 name="r3" "class="price" placeholder="Area"/>                             </td>                                                                     </tr>                                                                       <tr>                                                                          <td>                                                                          <br>Residential Type:                                                       <select name="r4" "class="price">                                             <option value="SEL">--SELECT--</option>                                     <option value="OP">Owner Properties</option>                                <option value="RM">Ready to Move</option>                                   <option value="VI">Villas</option>                                        </select>                                                                 </td>                                                                     </tr>';
  }
  else if (type[0].checked) {
    options.innerHTML = '<table>                                                                       <tr>                                                                          <th>Commercial Type</th>                                                    <th>Hourly Price</th>                                                       <th>Weekly Price</th>                                                       <th>Rent price</th>                                                         <th>Seats</th>                                                            </tr>                                                                       <tr>                                                                          <td>Personal Cabin</td>                                                     <td>                                                                          <input type="text" size ="6" name="c1"                                      class="price" placeholder="price"/>                                       </td>                                                                       <td>                                                                          <input type="text" size ="6" name="c2"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" size ="6" name="c3"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" size ="6" name="c4"                                      placeholder="area" "class="price"/>                                       </td>                                                                     </tr>                                                                       <tr>                                                                          <td>Meeting Room</td>                                                       <td>                                                                          <input type="text" name="c5" size ="6"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c6" size ="6"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c7" size ="6"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c8" size ="6"                                      placeholder="area" "class="price"/>                                       </td>                                                                     </tr>                                                                       <tr>                                                                          <td>Open Desk</td>                                                          <td>                                                                          <input type="text" name="c9" size ="6"                                      placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c10" size ="6"                                     placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c11" size ="6"                                     placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c12" size ="6"                                     placeholder="area" "class="price"/>                                       </td>                                                                     </tr>                                                                       <tr>                                                                          <td>Event Hall</td>                                                         <td>                                                                          <input type="text" name="c13" size ="6"                                     placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c14" size ="6"                                     placeholder="price" "class="price"/>                                      </td>                                                                       <td>                                                                          <input type="text" name="c15" size ="6"                                    placeholder="price" "class="price"/>                                       </td>                                                                       <td>                                                                          <input type="text" name="c16" size ="6"                                     placeholder="area" "class="price"/>                                       </td>                                                                     </tr>                                                                     </table>';
  }
}
