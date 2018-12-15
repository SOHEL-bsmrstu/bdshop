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

<!-- Modal For Update -->
<div id="studentModal" class="modal fadein" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <form role="form" method="post" enctype="multipart/form-data" id="student_form">
    <div class="modal-header">
      <h4 class="modal-title">Edit Data</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      
    </div>
    <div class="modal-body">
      {{csrf_field()}}
      <span id="form_output"></span>
      <div class="form-group">
        <label>Product Name</label>
        <input type="text"  name="product_name" id="product_name" class="form-control" style="height: 40px;" required />
      </div>
      <div class="form-group">
        <label>Product Category</label>
        <select name="produt_catecory" id="produt_catecory" class="form-control" style="height: 40px;" required>
          <option value="laptop">Laptop</option>
          <option value="destop">Destop</option>
          <option value="mobile">Mobile</option>
          <option value="headphone">HeadPhone</option>
        </select>
      </div>
      <div class="form-group">
        <label>Product Image</label>
        <input type="file" name="product_image" id="product_image" class="form-control" style="height: 40px;"/>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="student_id" id="student_id" value="" />
      <input type="submit" name="submit" id="submit" value="Edit" class="btn btn-info" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </form>
</div>
</div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Delete Product Model-->
<div id="productModal" class="modal fadein" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <form role="form" method="post"  id="product_form">
    <div class="modal-header">
      <h3 class="modal-title"><i class="fa fa-trash-o" style="font-size: 30px;"></i> Delete ! </h3>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      
    </div>
    <div class="modal-body">
      {{csrf_field()}}
      <p style="font-size: 16px;">Are you sure you want to Delete this data?</p>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="product_id" id="product_id" value="" />
      <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      <input type="submit" name="delete" id="delete" class="btn btn-danger" value="Yes!"/>
    </div>
  </form>
</div>
</div>
</div>

<!-- data table -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table style="width: 100%;">
          <tr>
            <td style="width: 50%;"><button type="button" data-toggle="modal" data-target="#addProducts" class="btn btn-xs btn-primary" style="background-color: #009688;">Add</button></td>
            <td><h3>Products</h3></td>
          </tr>
        </table>
        <!-- Table created by category -->
        <div style="width: 100%; margin-top: 0; text-align: center;">Category
          <select id="category" style="height: 40px;  border-radius: 5px 5px 5px 5px; margin-left: 0%; margin-top: 20px;">
            <option value="laptop">Laptop</option>
            <option value="camera">Camera</option>
            <option value="mobile">Mobile</option>
            <option value="headphone">HeadPhone</option>
          </select>
        </div>
        <div id="laptop" style="display: none;">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Product Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $value)
              @if($value->produt_catecory == "laptop")
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->product_name}}</td>
                <td>{{$value->produt_catecory}}</td>
                <td><img src = "images/{{$value->product_image}}" style="height: 80px; width: 80px;" /></td>
                <td><a  class="btn btn-primary edit" id="{{$value->id}}" style="background-color: #009688; color: white;">Edit</a>
                <a class="btn btn-primary delete" id="{{$value->id}}" style="background-color: #009688; color: white;"> Delete</a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div id="camera" style="display: none;">
        <table class="table table-hover table-bordered" id="sampleTable2">
          <thead>
            <tr>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Product Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $value)
            @if($value->produt_catecory == "camera")
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->product_name}}</td>
              <td>{{$value->produt_catecory}}</td>
              <td><img src = "images/{{$value->product_image}}" style="height: 80px; width: 80px;" /></td>
              <td><a class="btn btn-xs btn-primary edit" id="{{$value->id}}" style="background-color: #009688; color: white;"> Edit</a>
              <a class="btn btn-xs btn-primary delete" id="{{$value->id}}" style="background-color: #009688; color: white;"> Delete</a>
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="mobile" style="display: none;">
      <table class="table table-hover table-bordered" id="sampleTable3">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Product Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $value)
          @if($value->produt_catecory == "mobile")
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->product_name}}</td>
            <td>{{$value->produt_catecory}}</td>
            <td><img src = "images/{{$value->product_image}}" style="height: 80px; width: 80px;" /></td>
            <td><a class="btn btn-xs btn-primary edit" id="{{$value->id}}" style="background-color: #009688; color: white;"> Edit</a>
            <a class="btn btn-xs btn-primary delete" id="{{$value->id}}" style="background-color: #009688; color: white;"> Delete</a>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="headphone" style="display: none;">
      <table class="table table-hover table-bordered" id="sampleTable4">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Product Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $value)
          @if($value->produt_catecory == "headphone")
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->product_name}}</td>
            <td>{{$value->produt_catecory}}</td>
            <td><img src = "images/{{$value->product_image}}" style="height: 80px; width: 80px;" /></td>
            <td><a class="btn btn-xs btn-primary edit" id="{{$value->id}}" style="background-color: #009688; color: white;"> Edit</a>
            <a class="btn btn-xs btn-primary delete" id="{{$value->id}}" style="background-color: #009688; color: white;"> Delete</a>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<!--Product add Modal-->
<div class="modal fade" id="addProducts">
<div class="modal-dialog">
<div class="modal-content">
  <!-- Modal Header -->
  <div class="modal-header">
    <h4 class="modal-title">Products</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  
  <!-- Modal body -->
  <form method="post" enctype="multipart/form-data" id="addProducts-form">
    <div class="modal-body">
      {{csrf_field()}}
      <div class="form-group">
        <label> Name</label>
        <input type="text"  name="productname" id="productname" class="form-control" style="height: 40px;" required />
      </div>
      <div class="form-group">
        <select class="form-control" name="produtcatecory" required>
          <option value="">Select product category</option>>
          @foreach($category as $categories)
          <option value="{{$categories->category}}">{{$categories->category}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" id="productimage" name="productimage"  required>
    </div>
    <div class="form-group">
        <select class="form-control" name="productstategy" required>
          <option value="">Select product stategy</option>>
          <option value="new">new</option>
         <option value="old">old</option>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price" id="price" required>
    </div>
    <div class="form-group">
        <label>Discount</label>
         <input type="number" class="form-control" name="discount" id="discount" required>
    </div>
    <div class="form-group">
        <label>Description</label>
         <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
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


<!-- Data Update -->
<script type="text/javascript">
$(document).ready(function(){

$('#addProducts-form').on('submit',function(event){
event.preventDefault();
var form_data = new FormData(this);
//alert(form_data);
$.ajax({
url:"{{ route('save.products') }}",
method:"POST",
data:form_data,
dataType:"json",
cache:false,
contentType: false,
processData: false,
success:function(data)
{
alert("Successfully stored!!!");
// $('#addTimer').modal('hide');
$('#addProducts-form')[0].reset();
}
});
});

$(document).on('click', '.edit', function(){
var id = $(this).attr("id");
  //alert(id);
  //$('#addProducts').modal('show');
$.ajax({
url:"{{route('product.fetchdata')}}",
method:'get',
data:{id:id},
dataType:'json',
success:function(data)
{
$('#product_name').val(data.product_name);
$('#produt_catecory').val(data.produt_catecory);
$('#description').val(data.description);
$('#student_id').val(id);
$('#studentModal').modal('show');
}
});
});
$('#student_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
//alert(form_data);
$.ajax({
url:"{{ route('product.updatedata') }}",
method:"POST",
data:form_data,
dataType:"json",
success:function(data)
{
$('#studentModal').modal('hide');
alert("Successfully data edited!!!");
//$('#form_output').html(data.success);
$('#student_form')[0].reset();
}
});
});
$(document).on('click', '.delete', function(){
$('#productModal').modal('show');
var id = $(this).attr('id');
//alert(id);
$.ajax({
url:"{{route('product.fetchdata')}}",
method:'get',
data:{id:id},
dataType:'json',
success:function(data)
{
$('#product_id').val(id);
$('#productModal').modal('show');
}
});
});
$('#product_form').on('submit', function(){
event.preventDefault();
var form_data = $(this).serialize();
$.ajax({
url:"{{ route('product.detetedata') }}",
method:"POST",
data:form_data,
dataType:"json",
success:function(data)
{
$('#productModal').modal('hide');
alert("Successfully data deleted!!!");
//$('#form_output').html(data.success);
//$('#student_form')[0].reset();
}
});
});
});
</script>
<!--Table Swtich -->
<script>
$(document).ready(function(){
$('#laptop').show();
$("#category").on('change',function(){
var category_val = $("#category option:selected").val();
//alert(category_val);
if(category_val == "laptop"){
$('#laptop').show();
}
if(category_val != "laptop")
{
$('#laptop').hide();
}
if(category_val == "camera"){
$('#camera').show();
}
if(category_val != "camera")
{
$('#camera').hide();
}
if(category_val == "headphone"){
$('#headphone').show();
}
if(category_val != "headphone")
{
$('#headphone').hide();
}
if(category_val == "mobile"){
$('#mobile').show();
}
else{
$('#mobile').hide();
}
});
});
</script>
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">$('#sampleTable2').DataTable();</script>
<script type="text/javascript">$('#sampleTable3').DataTable();</script>
<script type="text/javascript">$('#sampleTable4').DataTable();</script>
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