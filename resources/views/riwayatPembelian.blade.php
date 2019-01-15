<!DOCTYPE html>
<html>
<head>
  <title>Riwayat</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
	<h3 class="text-center mt-5">RIWAYAT TRANSAKSI</h3>
	<hr class="mb-5" width="100px">
	@if (session('message'))
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
	      <strong>{{ session('message') }}</strong>
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	@endif

	<section>
		<div class="container">
			<div class="row">
				<table class="table ml-5 mr-5" id="myTable">
				  <thead>
				    <tr class="text-center">
				      <td scope="col">No.</td>
				      <th scope="col">ID pembayaran</th>
				      <th scope="col">Total</th>
				      <th scope="col">Aksi</th>
				      {{-- <th scope="col">NO SERIAL</th>
				      <th scope="col">QTY</th>
				      <th scope="col">HARGA SATUAN</th>
				      <th scope="col">SUB TOTAL</th>
				      <th scope="col">ACTION</th> --}}
				    </tr>
				  </thead>
				  @php
				  	$i=1
				  @endphp
				  @foreach ($master as $row)
				  	<tr class="text-center">
				  		<td>{{$i}}</td>
				  		<td>#{{$row->payment_id}}</td>
				  		<td>Rp.{{$row->total}}</td>
				  		{{-- <td>{{$row->no_serial}}</td>
				  		<td>{{$row->quantity}}</td>
				  		<td>{{$row->price}}</td>
				  		<td>{{$row->subtotal}}</td> --}}
				  		<td>
				  			<a href=""></a>
				  			<a class="btn btn-danger btn-sm" type="button" name="hapus" value="hapus"  href="hapus/{{$row->id}}">hapus</a>
				  			<a class="btn btn-warning btn-sm" type="button" name="edit"  value="detail" href="edit/{{$row->id}}">detail</a>
				  		</td>
				  	</tr>
				  	@php
				  		$i++
				  	@endphp
				  @endforeach

			</div>
		</div>
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>