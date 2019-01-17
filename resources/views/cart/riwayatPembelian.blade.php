@extends('cart.template.master')
@section('title', 'Riwayat')

@section('content')

<body>
	<div class="container">
	<h2 class="text-center mt-4">Riwayat Transaksi</h2>
	<hr class="mb-5" width="100px">
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
	</div>
	<section>
		<div class="container">
			<div class="row">
				<table class="table ml-5 mr-5" id="myTable">
				  <thead>
				    <tr class="text-justify">
				      <th scope="col">No.</th>
				      <th scope="col">Waktu Transaksi</th>
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
				  	<tr class="text-justify">
				  		<td>{{$i}}</td>
				  		<td>{{date('d F Y', strtotime($row->created_at))}}</td>
				  		<td><a href="">#{{$row->payment_id}}</a></td>
				  		<td>Rp.{{$row->total}}</td>
				  		{{-- <td>{{$row->no_serial}}</td>
				  		<td>{{$row->quantity}}</td>
				  		<td>{{$row->price}}</td>
				  		<td>{{$row->subtotal}}</td> --}}
				  		<td>
				  			<a id="hapus" class="btn btn-danger btn-sm" name="hapus"  href="hapus/{{$row->id}}">hapus</a>
				  			<a id="hapus" class="btn btn-warning btn-sm" name="edit"  	 href="edit/{{$row->id}}">detail</a>
				  		</td>
				  	</tr>
				  	@php
				  		$i++
				  	@endphp
				  @endforeach

			</div>
		</div>
	</section>
</body>
</html>
@endsection