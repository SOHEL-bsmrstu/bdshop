<?php

namespace App\Http\Controllers;
use App\Order;
use DB;
use Session;
use App\Product;
use App\DeliveredOrder;
use App\Timer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function currentOrder(){
     $orders = Order::all();
     return view('admin.current-order')->with(compact('orders'));
    }

    public function orderDeliver(Request $request){
        //dd($request->id);
        $orders = DB::table('orders')
                    ->where('id', $request->id)
                    ->get();
        //dd($orders);
        $output = "";
        foreach ($orders as $order) {
            # code...
        $deliver = new DeliveredOrder;
        $name = $order->fname.' '.$order->lname;
        $deliver->user_name = $name;
        $deliver->user_id = $order->user_id;
        $deliver->product_name = $order->product_name;
        $deliver->product_id = $order->product_id;
        $deliver->quantity = $order->quantity;
        $deliver->total_price = $order->price;
        $deliver->save();
            $output = array(
    'success'   =>  "order delevered"
    );
        $order_delete = Order::find($request->id);
        $order_delete->delete();
    echo json_encode($output);
    break;
        }
    }

     public function deliveredOrder(){
         $deliveredOrders = DeliveredOrder::all();
        return view('admin.delivered-order')->with(compact('deliveredOrders'));
     }

    public function timer(){
    $timers = Timer::all();
    return view('admin.timer')->with(compact('timers'));
    }

    public function saveTimer(Request $request){
    $timer = new Timer;
    if(strlen($request->hours) == 1)
    $request->hours = '0'.$request->hours;
    if(strlen($request->minutes) == 1)
    $request->minutes = '0'.$request->minutes;
    $timer->date = $request->input('date');
    $timer->clock_hours = $request->hours;
    $timer->clock_minutes = $request->minutes;
    $timer->status = 0;
    $timer->save();
    $output = "";
    $output = array(
    'success'   =>  "order delevered"
    );
    echo json_encode($output);
    }

    public function startTimer(Request $request){
    $start_timer = Timer::find($request->id);
    //  dd($start_timer);
    $start_timer->status = 1;
    $start_timer->save();
    return redirect()->back();
    }

    public function closeTimer(Request $request){
    $close_timer = Timer::find($request->id);
    //  dd($start_timer);
    $close_timer->status = 0;
    $close_timer->save();
    return redirect()->back();
    }
}
