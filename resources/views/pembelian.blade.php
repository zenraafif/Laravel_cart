<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style type="text/css">
  .container table tbody tr td input {
    width: auto;
    max-width: 100px;
    border-radius: 5px;
    padding: 5px;
  }
  .container table thead tr td input {
    width: 100%;
    border-radius: 5px;
    padding: 5px;
  }
</style>
</head>
<body>
  <div class="container">
    <input type="button" id="more_fields" onclick="addFields();" value="Add More" class="btn btn-info ml-3 mt-5 mb-4" />  
    <table class="table" id="table">
      <thead>
        <tr class="text-center">
          <th scope="col">PART</th>
          <th scope="col">MERK</th>
          <th scope="col">NO SERIAL</th>
          <th scope="col">QTY</th>
          <th scope="col">HARGA SATUAN</th>
          <th scope="col">SUB TOTAL</th>
          <th scope="col">HAPUS</th>
        </tr>
      </thead>
      <div id="readroot" style="display: none"></div>
        <tbody class="text-center">
          <tr>
            <td><input type="text" name="data[]" placeholder="Part"></td>
            <td><input type="text" name="data[]" placeholder="Merk"></td>
            <td><input type="text" name="data[]" placeholder="No Serial"></td>
            <td><input type="number" onchange=" return subtotal();" class="qty" id="qty" name="qty" placeholder="Quantity"></td>
            <td><input type="number" onchange=" return subtotal();" class="price" id="price" name="price" placeholder="Harga"></td>
            <td><input type="number" class="subtotal" id="subtotal" name="subtotal" placeholder="Sub Total" readonly></td>
            <td><input type="button" name="" value="Hapus" onclick="deleteRow(this)" disabled></td>
          </tr>
        </tbody>
        <thead>
          <tr class="text-center">
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ><b>Total :</b></td>
            <td colspan="10" rowspan="10" ><input type="text" name="data[]" placeholder="Total"></td>
          </tr>
        </thead>
      </table>
    </div>

   {{--  <a class="test" name="Name 1"></a>
    <a class="test" name="Name 2"></a>
    <a class="test" name="Name 3"></a>
    <a class="test" name="Name 3"></a> --}}

  
    {{-- <script type="text/javascript">
      var elements = document.getElementsByClassName("test");
      var qty = document.getElementsByClassName("qty").value;
    var price = document.getElementsByClassName("price").value;
     var result = parseInt(qty)*parseInt(price);

      var names = '';
      for(var i=0; i<elements.length; i++) {
          names += elements[i].name;
      }
      document.write(names);
    </script> --}}

    <script type="text/javascript">
      function addNumber(divName){    
        var sum = document.getElementById('sum');
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<input type='text' name='number" + counter + "'>";
        document.getElementById(divName).appendChild(newdiv);
        sum.value = getSum(counter);
        counter++;    
        
   }
      function getSum(numberOfDivs) {
        var sum = 0;
        for (var i=0 ; i<numberOfDivs; i++) {
          sum += parseInt(document.getElementsByName('number' + i)[0].value);
        }
        return sum;
      }
    </script>
    </body>
    </html>