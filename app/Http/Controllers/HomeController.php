<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        $timers = DB::table('timers')
                    ->where('status', '1')
                    ->limit(1)
                    ->get();
        $timer = "0";
        $hour = "0";
        $minute = "0";
        foreach ($timers as  $value) {
            # code...
            $timer = $value->date;
            $hour = $value->clock_hours;
            $minute = $value->clock_minutes;
        }
        return view('home')->with(compact('data','timer', 'hour', 'minute'));
    }

    public function validation(Request $request){
       return $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed|max:255',
            ]);
    }

    public function userCreate(Request $request){

         $password =  bcrypt($request->password);
        $this->validation($request);

        $data = ['name' => $request->name, 
                'email' => $request->email,
                'password' => $password
                ];

        User::create($data);
        return redirect('home');
    }

    public function customlogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back();
        }
        else
        {
            //return '<script type="text/javascript">alert("LogIn Failed!!!");</script>';
            return redirect()->back();
        }
    }

    public function customlogout(){
        Auth::logout();
        return redirect('home');
    }

    public function profile(){

        $orders = DB::table('orders')
                        ->where('user_id',Auth::user()->id)
                        ->get();
        $total = 0;
        foreach ($orders as $key => $value) {
            # code...
            $total += $value->price;
        }
        return view('profile')->with(compact('orders', 'total'));
    }

    public function hotDeal(){
        $data = Product::all();
        $timers = DB::table('timers')
                    ->where('status', '1')
                    ->limit(1)
                    ->get();
        $timer = "0";
        $hour = "0";
        $minute = "0";
        foreach ($timers as  $value) {
            # code...
            $timer = $value->date;
            $hour = $value->clock_hours;
            $minute = $value->clock_minutes;
        }
        return view('hot-deal')->with(compact('data','timer', 'hour', 'minute'));
    }

    public function laptop(){
        $data = DB::table('products')
                    ->where('produt_catecory', 'laptop')
                    ->get();
       // dd($data);
        return view('product')->with(compact('data'));
    }

    public function mobile(){
        $data = DB::table('products')
                    ->where('produt_catecory', 'mobile')
                    ->get();
       // dd($data);
        return view('product')->with(compact('data'));
    }

    public function camera(){
        $data = DB::table('products')
                    ->where('produt_catecory', 'camera')
                    ->get();
       // dd($data);
        return view('product')->with(compact('data'));
    }

    public function headphone(){
        $data = DB::table('products')
                    ->where('produt_catecory', 'headphone')
                    ->get();
       // dd($data);
        return view('product')->with(compact('data'));
    }
}
