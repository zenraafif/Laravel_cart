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
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function addRow() {
  var table = document.getElementById("table");
  var row = table.insertRow(2);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "NEW CELL1";
  cell2.innerHTML = "NEW CELL2";
}
function add_fields() {    
document.getElementById("table").insertRow(-1).innerHTML = 
'<td><input type="text" ></td> <td><input type="text" id="answer" ></td ></td> <td><input type="text" id="answer" ></td ></td> <td><input type="text" id="answer" ></td ><td><input type="text" id="answer" ></textarea></td ><td><input type="text" id="answer" ></textarea></td ><td><input type="button" name="" value="hapus" onclick="deleteRow(this)"></td></tr>';
}

function addFields() {
  var table = document.getElementById("table");
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  var cell8 = row.insertCell(7);
  cell1.innerHTML = '<td><input name="data[]" type="text" ></td>';
  cell2.innerHTML = '<td><input name="data[]" type="text" ></td>';
  cell3.innerHTML = '<td><input name="data[]" type="text" ></td>';
  cell4.innerHTML = '<td><input name="data[]" type="number" ></td>';
  cell5.innerHTML = '<td><input name="data[]" type="number" ></td>';
  cell6.innerHTML = '<td><input name="data[]" type="number"></td>';
  cell7.innerHTML = '<td><input type="button" name="" value="hapus" onclick="deleteRow(this)"></td>';
}

window.onload = moreFields;