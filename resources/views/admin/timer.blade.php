@extends('admin.layouts.master')
@section('title', 'home')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="admin">Timer</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table style="width: 100%;">
          <tr>
            <td style="width: 50%;"><button type="button" data-toggle="modal" data-target="#addTimer" class="btn btn-xs btn-primary" style="background-color: #009688;">Add</button></td>
            <td><h3>Timer</h3></td>
          </tr>
        </table>
        <br>
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th> Id</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($timers as $timer)
          <tr>
            <td>{{$timer->id}}</td>
            <td>{{$timer->date}}</td>
            <td>{{$timer->clock_hours}}:{{$timer->clock_minutes}}:00</td>
            @if($timer->status == 0)
            <td><a href="{{url('start-timer/'.$timer->id)}}" class="btn btn-xs btn-primary start" id="{{$timer->id}}" style="color: white;"> Start</a>
            @else
            <td><a href="{{url('close-timer/'.$timer->id)}}" class="btn btn-xs btn-primary start" id="{{$timer->id}}" style="color: white;"> Close</a>
            @endif
            <button style="color: white;" class="btn btn-xs btn-primary delete"  timer_id="{{$timer->id}}"> Delete</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--Timer add Modal-->
<div class="modal fade" id="addTimer">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Timer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <form method="post" enctype="multipart/form-data" id="addTimer-form">
        <div class="modal-body">
          {{csrf_field()}}
          <div class="form-group">
            <label>Chose Date</label>
            <input type="date"  name="date" id="date" class="form-control" style="height: 40px;" required />
          </div>
          <div class="form-group">
            <label>Clock Hours</label>
            <input type="number"  name="hours" id="hours" class="form-control" style="height: 40px;" required />
          </div>
          <div class="form-group">
            <label>Clock Minutes</label>
            <input type="number"  name="minutes" id="minutes" class="form-control" style="height: 40px;" required />
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
<!--Timer add Modal-->
<div class="modal fadein" id="deleteTimer" >
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Timer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <form method="post" enctype="multipart/form-data" id="deleteTimer-form">
        <div class="modal-body">
          {{csrf_field()}}
          
          <p style="font-size: 16px;">Are you sure you want to Delete this data?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="timer_id" id="timer_id" value="" />
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
          <input type="submit" name="delete" id="delete" class="btn btn-danger" value="Yes!"/>          
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#addTimer-form').on('submit',function(event){
event.preventDefault();
var form_data = $(this).serialize();
//alert(form_data);
$.ajax({
url:"{{ route('save.timer') }}",
method:"POST",
data:form_data,
dataType:"json",
success:function(data)
{
alert("Timer setup!!!");
// $('#addTimer').modal('hide');
}
});
});

$('.delete').click(function(){
  var id = $(this).attr('timer_id');
 // alert(id);
 $('#deleteTimer').modal('show');
});
});
</script>
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