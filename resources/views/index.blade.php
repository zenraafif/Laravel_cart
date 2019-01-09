<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style type="text/css">
  input {
    width: 100px;
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
            <td><input type="text" name="data[]" placeholder="Quantity"></td>
            <td><input type="text" name="data[]" placeholder="Harga"></td>
            <td><input type="text" name="data[]" placeholder="Sub Total"></td>
            <td><input type="button" name="" value="Hapus" onclick="deleteRow(this)"></td>

          </tr>
        </tbody>
      </table>
    </div>

    </body>
    </html>



