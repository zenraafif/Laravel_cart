@extends('cart.template.master')
@section('title', 'Pembelian')
<style type="text/css">
	body{
		background-color: #2099e2;
	}
	footer{
		position: absolute;
		bottom: 0px;
		width: 100%;
	}
	main{
		margin-top: 10%;
	}
</style>

@section('content')
  <body class="text-center">
      <main role="main" class="inner cover">
      	<img src="{{ asset('images/shopping.png') }}" width="150px">
        <p class="lead">
          <a href="{{ url('pembelian') }}" class=" mt-2 btn btn-secondary">Mulai Transaksi</a>
        </p>
      </main>
    </div>
  </body>
</html>
@endsection