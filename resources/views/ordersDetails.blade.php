<!DOCTYPE html>
<html>
<head>
  <title>Details</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}" >
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
  <div class="container">
  	<h2 class="text-center mt-5">Order Details</h2>
  	<hr width="100px" class="mb-5">
    @if (session('alert-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('alert-success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
    @endif
    @foreach ($master as $rows)	
      <form method="post" action="action/{{ $rows->id }}">
    @endforeach
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
          @foreach ($orders_details as $row)
            <tr id="rowToClone" class="abc">
              <td><input type="text" name="part[]" placeholder="Part" value="{{$row->part}}"></td>
              <td><input type="text" name="merk[]" placeholder="Merk" value="{{$row->merk}}"></td>
              <td><input type="text" name="serial[]" placeholder="No Serial" value="{{$row->no_serial}}"></td>
              <td><input type="number" class="product_quantities" id="qty" name="quantity[]" placeholder="Jumlah" value="{{$row->quantity}}"></td>
              <td><input type="number" class="price" id="price" name="price[]" placeholder="Harga" value="{{$row->price}}"></td>
              <td><input type="text" class="subtotal amount" id="subtotal" name="subtotal[]" placeholder="Sub Total" readonly="" value="{{$row->subtotal}}"></td>
              <td>
                <input class="btn btn-danger" type="button" value="Hapus"></td>
            </tr>
		  @endforeach
          </tbody>
          <tfoot>
          	@foreach ($master as $row)
            <tr>
              <td class="text-center bold" colspan="4"></td>
              <td class="text-center bold"><b>TOTAL :</b></td>
              <td class="text-center bold "><input id="total" class="total" name="total" readonly style="border: none;" value="{{$row->total}}"></td>
            </tr>
          	@endforeach
          </tfoot>
        </table>
        <div class="text-right">
          <input class="btn btn-primary" type="submit" name="simpan" value="Simpan" />
          {{-- <input class="btn btn-warning" type="submit" name="checkout" value="CheckOut" /> --}}
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
