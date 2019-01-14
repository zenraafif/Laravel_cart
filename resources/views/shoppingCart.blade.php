<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}" >
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
  <div class="container">
    <input type="button" id="more_fields" onclick="cloneRow();totalamount();" value="Add More" class="btn btn-info ml-3 mt-5 mb-4" />
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('message') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
      <form method="post" action="{{ url('pembelian/buat_pinjaman') }}"> 
        <table class="table" id="myTable">
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
          <tbody class="text-center body" id="tableToModify">
            <tr id="rowToClone" class="abc">
              <td><input type="text" name="part[]" placeholder="Part"></td>
              <td><input type="text" name="merk[]" placeholder="Merk"></td>
              <td><input type="text" name="serial[]" placeholder="No Serial"></td>
              <td><input type="number" class="product_quantities" id="qty" name="quantity[]" placeholder="Jumlah"></td>
              <td><input type="number" class="price" id="price" name="price[]" placeholder="Harga"></td>
              <td><input type="text" class="subtotal amount" id="subtotal" name="subtotal[]" placeholder="Sub Total" value="" readonly=""></td>
              <td>
                <input class="btn btn-danger" type="button" value="Hapus" onclick="deleteRow(this);totalamount();" ></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center bold" colspan="4"></td>
              <td class="text-center bold"><b>TOTAL :</b></td>
              <td class="text-center bold "><input id="total" class="total" name="total" readonly style="border: none;"></td>
            </tr>
          </tfoot>
        </table>
        <div class="text-right">
          <button class="btn btn-primary">Simpan</button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
    <script type="text/javascript">
      function totalamount() {
        // var q = parseInt(getElementById('#total')).value;
        var q = 0;
        var rows = document.getElementById('myTable').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
        
        for( var i = 0; i < rows; i++ ){
          var z = $('.amount:eq(' + i + ')').val();

          if (!isNaN(z)) {
            q +=Number(z);
          }
        }
        // document.getElementById("total").value=q; 
        $('#total').val(q);
      }

      $(function () { 
        $('tabel').find('tr[data-id=""]')
        $('.body').delegate('input','change',function(){
          var tr = $(this).parent().parent();
          var qty = tr.find('input.product_quantities').val();
          // var price = tr.data('price');
          var price = tr.find('input.price').val();
          var subtotal = (qty * price); 
          tr.find('.amount').val(subtotal).html(subtotal);
          totalamount();
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
  <!-- https://jsfiddle.net/fw8t3ehs/4/ -->
   