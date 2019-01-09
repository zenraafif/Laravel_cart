<!DOCTYPE html>
<html>
<head>
  <title>Form</title>
</head>
<body>
        <button onclick="myFunction()">Tambah</button>

        <script>
        function myFunction() {

          barang = []
          merek = []

          var form = document.createElement("FORM");
          form.setAttribute("id", "myForm");
          document.body.appendChild(form);

          var barang = document.createElement("INPUT");
          barang.setAttribute("type", "text");
          barang.setAttribute("placeholder", "Nama Barang");
          barang.setAttribute("name", "data[]");
          document.getElementById("myForm").appendChild(barang);
          
          var merek = document.createElement("INPUT");
          merek.setAttribute("type", "text");
          merek.setAttribute("placeholder", "Merek");
          merek.setAttribute("name", "data[]");
          document.getElementById("myForm").appendChild(merek);
          onclick='delElement()';
          
          
          var buttonDelete = document.createElement("INPUT");
          buttonDelete.setAttribute("type", "button");
          buttonDelete.setAttribute("value", "hapus");
          buttonDelete.setAttribute("name", "data[]");
          buttonDelete.setAttribute("onClick", "delElement();");
          for (i=0; i<barang.length; i++){
            "<button onclick='delElement(" + i + ")'>Delete</button>"
          };

          document.getElementById("myForm").appendChild(buttonDelete);
          
          var p = document.createElement("br");
          document.getElementById("myForm").appendChild(p);
        }

        function delElement(myForm) {
          // Removes an element from the document
          this.parentNode.parentNode.removeChild(this.parentNode);
          var element = document.getElementById(myForm);
          element.parentNode.removeChild(element);
        }

        </script>
</body>
</html>