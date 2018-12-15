@extends('admin.layouts.master')
@section('title', 'home')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')

<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{route('current-order')}}">order</a></li>
  </ul>
</div>
<!--Order Table-->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h3 style="text-align: center; "><b>Develvered Orders </b></h3><br>
      </div>
      <table class="table table-hover table-bordered" id="deliveredOrder">
        <thead>
          <tr>
            <th> Id</th>
            <th>User Name</th>
            <th>User Id</th>
            <th>Product Name</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($deliveredOrders as $deliveredOrder)
          <tr>
            <td> {{$deliveredOrder->id}}</td>
            <td>{{$deliveredOrder->user_name}}</td>
            <td>{{$deliveredOrder->id}}</td>
            <td>{{$deliveredOrder->product_name}}</td>
            <td>{{$deliveredOrder->product_id}}</td>
            <td>{{$deliveredOrder->quantity}}</td>
            <td>{{$deliveredOrder->total_price}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#deliveredOrder').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
if(document.location.hostname == 'pratikborsadiya.in') {
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-72504830-1', 'auto');
ga('send', 'pageview');
}
</script>
@endsection