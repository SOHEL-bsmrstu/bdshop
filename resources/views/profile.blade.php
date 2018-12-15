@extends('basic.header')
@section('header')
@parent
@endsection
@section('content')
<!-- Font-icon css-->

<div class="container">
	<div class="row">
		<div class="col-md-8"></div>
		<table class="table table-bordered table-dark" style="margin-top: 3%;">
			<thead>
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Order Quantity</th>
					<th scope="col">Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td>{{$order->product_name}}</td>
					<td>{{$order->quantity}}</td>
					<td>{{$order->price}}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3" style="text-align: right;">Total : ${{$total}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- Google analytics script-->

@endsection
@section('footer')
@parent
@endsection