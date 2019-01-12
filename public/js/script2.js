var counter = 0;

function moreFields() {
    counter++;
    var newFields = document.getElementById('readroot').cloneNode(true);
    newFields.id = '';
    newFields.style.display = 'block';
    var newField = newFields.childNodes;
    for (var i=0;i<newField.length;i++) {
        var theName = newField[i].name
        if (theName)
            newField[i].name = theName + counter;
    }
    // var insertHere = document.getElementById('writeroot');
    // insertHere.parentNode.insertBefore(newFields,insertHere);
}



function del() {
var inputs = document.getElementsByTagName("input");
for (var i = 0; i < inputs.length; i++)
{
    if (document.getElementsByTagName("input")[i].value.length == 0) {
        var id = document.getElementsByTagName("input")[i].id;
        (elem=document.getElementById(id)).parentNode.removeChild(elem);    
        // (elem=document.getElementById(id + 'label')).parentNode.removeChild(elem)
    }
}
}



function row() {
  document.getElementById("table").deleteRow(0);
}



function deleteRow(btn) {
    var add = document.getElementById('myTable').rows.length;
    console.log(add); 
    if (add <= 3) {
        alert('tabel terakhir tidak bisa dihapus');
    } else{
        var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    }
    
}

function cloneRow() {
      var row = document.getElementById("rowToClone"); // find row to copy
      var table = document.getElementById("tableToModify"); // find table to append to
      var clone = row.cloneNode(true); // copy children too
      clone.id = "newID"; // change id or other attributes/contents
      table.appendChild(clone); // add new row to end of table
    }


function add_fields() {    
document.getElementById("table").insertRow(-1).innerHTML = 
'<td><input type="text" ></td> <td><input type="text" id="answer" ></td ></td> <td><input type="text" id="answer" ></td ></td> <td><input type="text" id="answer" ></td ><td><input type="text" id="answer" ></textarea></td ><td><input type="text" id="answer" ></textarea></td ><td><input type="button" name="" value="hapus" onclick="deleteRow(this)"></td></tr>';
}



function addFields() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  var cell8 = row.insertCell(7);
  cell1.innerHTML = '<td><input type="text" name="data[]"></td>';
  cell2.innerHTML = '<td><input type="text"     name="data[]"   placeholder="Merk"                                                                                      ></td>';
  cell3.innerHTML = '<td><input type="text"     name="data[]"   placeholder="No Serial"                                                                                 ></td>';
  cell4.innerHTML = '<td><input type="number"   name="data[]"   placeholder="Quantity"  onchange="return subt();" class="qty"               id="qty"                    ></td>';
  cell5.innerHTML = '<td><input type="number"   name="data[]"   placeholder="Harga"     onchange="return subt();" class="price"             id="price"                  ></td>';
  cell6.innerHTML = '<td><input type="number"   name="data[]"   placeholder="Sub Total"                           class="subtotal"          id="subtotal"               ></td>';
  cell7.innerHTML = '<td><input type="button"   name="" value="hapus" onclick="deleteRow(this)"></td>';
}





function subtotal(){
    var qty = parseInt(document.getElementById("qty").value);
    var price = parseInt(document.getElementById("price").value);
    var result = qty*price;

    document.getElementById("subtotal").value=result; 
}

function total(){
    var qty = parseInt(document.getElementById("subtotal").value);


    document.getElementById("total").value=qty; 
}

function subt(){
    var y = document.getElementsByClassName('foo');
var aNode = y[0];
    var qty = document.getElementsByClassName('qty').value;
    var price = document.getElementsByClassName("price")    .value;
    var test = document.getElementsByClassName("qty")   .value;
     var result = parseInt(qty)*parseInt(price);


     document.getElementsByClassName("subtotal").value=result; 
}


window.onload = moreFields;