@extends('basic.master')
@section('title', 'home')
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
@section('header')
@parent
@endsection
@section('products')
@parent
@endsection
@section('footer')
@parent
@endsection
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{$timer}} {{$hour}}:{{$minute}}:00").getTime();
// Update the count down every 1 second
var x = setInterval(function() {
// Get todays date and time
var now = new Date().getTime();

// Find the distance between now and the count down date
var distance = countDownDate - now;
// alert(distance);
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
document.getElementById("day").innerHTML = days;
document.getElementById('hour').innerHTML =  hours;
document.getElementById("minute").innerHTML = minutes;
document.getElementById('second').innerHTML =  seconds;

// If the count down is over, write some text
if (distance < 0) {
clearInterval(x);
//document.getElementById("hot-deal").innerHTML = "EXPIRED";
        var link = document.getElementById("btn-hot-deal");
        link.href = "";
        link.className = "primary-btn cta-btn";
    document.getElementById("day").innerHTML = "0";
    document.getElementById('hour').innerHTML =  "00";
    document.getElementById("minute").innerHTML = "00";
    document.getElementById('second').innerHTML =  "00";
document.getElementById("btn-hot-deal").disabled = false;
}
}, 1000);
</script>