@extends('admin.layouts.master')
@section('title', 'home')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table>
        <tr>
        <td style="width: 80%;"><button type="button" data-toggle="modal" data-target="#addCategory" class="btn btn-xs btn-primary" style="background-color: #009688;">Add</button></td>
         <td><h3>Category</h3></td>
       </tr>
     </table>
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th> Id</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $value)
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->category}}</td>
            <td><a class="btn btn-xs btn-primary edit" id="{{$value->id}}" style="background-color: #009688; color: white;"> Edit</a>
            <a href="{{url('category-delete/'.$value->id)}}" class="btn btn-xs btn-primary " id="{{$value->id}}" style="background-color: #009688; color: white;"> Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!--Category Add Modal-->
<div class="modal fade" id="addCategory">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Products Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>     
      <!-- Modal body -->
      <form method="post" enctype="multipart/form-data" id="addCategory-form">
        <div class="modal-body">
          {{csrf_field()}}
          <div class="form-group">
            <label>Category</label>
            <input type="text"  name="product_category" placeholder="Product Category" id="product_category" class="form-control" style="height: 40px;" required />
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" name="submit" id="submit" value="Add" class="btn btn-info" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal For Update -->
<div id="category_update" class="modal fadein" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data" id="category_edit_form">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          {{csrf_field()}}
          <span id="form_output"></span>
          <div class="form-group">
            <label>Product Name</label>
            <input type="text"  name="category_name" id="category_name" class="form-control" style="height: 40px;" required />
          </div>
          <div class="modal-footer">
            <input type="hidden" name="category_product_id" id="category_product_id" value="" />
            <input type="submit" name="submit" id="submit" value="Edit" class="btn btn-info" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){

     $('#addCategory-form').on('submit',function(event){
      event.preventDefault();
      var form_data = $(this).serialize();
      //alert(form_data);
          $.ajax({
      url:"{{ route('save.category') }}",
      method:"POST",
      data:form_data,
      dataType:"json",
      success:function(data)
      {
      alert("Category added!!!");
      $('#addCategory-form')[0].reset();
      // $('#addTimer').modal('hide');
      }
      });
    });

  $(document).on('click', '.edit', function(){
  var id = $(this).attr("id");
  $.ajax({
  url:"{{route('category.fetchdata')}}",
  method:'get',
  data:{id:id},
  dataType:'json',
  success:function(data)
  {
  $('#category_name').val(data.category);
  $('#category_product_id').val(id);
  $('#category_update').modal('show');
  }
  });
  
  });
  $('#category_edit_form').on('submit',function(event){
  // alert('okk');
  event.preventDefault();
  var form_data = $(this).serialize();
  // alert(form_data);
  $.ajax({
  url:"{{ route('category.edit') }}",
  method:"POST",
  data:form_data,
  dataType:"json",
  success:function(data){
  alert("Category successfully edited!!!");
  $('#category_update').modal('hide');
  }
  });
  });
  });
  </script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
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