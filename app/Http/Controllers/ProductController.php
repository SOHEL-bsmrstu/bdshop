<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use Auth;
use DB;
use App\Temporary;
use Session;

class ProductController extends Controller
{

    public function addProducts(Request $request){

        $this->validate($request, [
        'productimage' => 'required|image',
        ]);

        $data = new Product;
        $new = ($request->price) - (($request->discount * $request->price) / 100);
        $data->product_name = $request->productname;
        $data->produt_catecory = $request->produtcatecory;
        $data->description = $request->description;
        $data->product_stategy = $request->productstategy;
        $data->product_price = $request->price;
        $data->new_price = $new;
        $data->discount = $request->discount;

        if($request->hasFile('productimage')){
            //$data->product_image = $request->productimage->store('public/images');
            $image = $request->file('productimage');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
             $data->product_image = $name;
            $image->move($destinationPath, $name);
            //$this->save();

        }
        $data->save();

        $output = "";
         $output = array(
            'success'   =>  "success"
        );
         echo json_encode($output);
    }

    public function product_details(){

    	//$data = DB::table('products')->Paginate(2);
    	$data = Product::all();
        $category = Category::all();
      //  dd($data);
    	return view('admin.product-details')->with(compact('data','category'));
    }

    public function fetchdata(Request $request){
          $id = $request->input('id');
        $Product = Product::find($id);
        $output = array(
            'product_name'    =>  $Product->product_name,
            'produt_catecory'     =>  $Product->produt_catecory,
            'product_price' => $Product->product_price,
            'product_image'     =>  $Product->product_image,
            'description'     =>  $Product->description
        );
        echo json_encode($output);
    }

    public function updatedata(Request $request){
     
        $success_output = '';
        $product = Product::find($request->get('student_id'));
        $product->product_name = $request->get('product_name');
        $product->produt_catecory = $request->get('produt_catecory');
        $product->description = $request->get('description');
        $product->save();
        $success_output = '<div class="alert alert-success">Data Inserted</div>';
         $output = array(
            'success'   =>  $success_output
        );
         echo json_encode($output);
      }

      public function detetedata(Request $request){
        $product = Product::find($request->input('product_id'));
        $product->delete();
        $output ="";
        $output = array(
            'success' => 'Data successfully deleted!!!'
        );
        echo json_encode($category);
      }

      public function getcart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart',$cart);
       // dd($request->session()->get('cart'));

        return redirect('home');
      }

      public function shopcart(){

       $user_id = Auth::user()->id;
       $user_cart = 0;
        $cartvalue = DB::table('temporaries')
                        ->where('user_id', $user_id)
                        ->get();
        foreach ($cartvalue as $value) {
            # code...
            if($value->user_id == $user_id)
                $user_cart++;
        }
        if($user_cart > 0){
        $cart = Temporary::all();
        $total = 0;
        foreach ($cart as $value) {
            # code...
            if($value->user_id == $user_id)
                $total += $value->price;
        }
        return view('shop-to-cart')->with(compact('cart','total'));
    }
    else
        return redirect('home');
 }

      public function checkout(){

        $user_id = Auth::user()->id;
       $cart = DB::table('temporaries')
                ->where('user_id', $user_id)
                ->get();
        $total = 0;
        foreach ($cart as $value) {
            # code...
            $total += $value->price;
        }
        return view('checkout')->with(compact('total'));
      }

      public function buy(Request $request){

        $user_id = Auth::user()->id;
        $tmp = DB::table('temporaries')
                        ->where('user_id', $user_id)
                        ->get();
        foreach ($tmp as $value) {
            # code...
            $order = new Order;
            $order->user_id = $user_id;
            $order->fname = $request->fname;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->country = $request->country_name;
            $order->city = $request->city;
            $order->zip_code = $request->zip_code;
            $order->phn_number = $request->phn_number;
            $order->product_id = $value->product_id;
            $order->quantity = $value->quanty;
            $order->product_name = $value->product_name;
            $order->price = $value->price;
            $order->save();

            $tmp_delete = Temporary::find($value->id);
            $tmp_delete->delete();         
        }

        $output = array(
               'buy_msg'     => 'successfully place ordered!!!'
            );
          echo json_encode($output);
      }

      public function temporarycart(Request $request){

        $output = "";
        $id = $request->input('id');
        $product = Product::find($id);
        $user_id = Auth::user()->id;
        $flag = 0;

         $tmp_quantity = DB::table('temporaries')
                        ->where('user_id', $user_id)
                        ->get();
        $TotalQty = 1;
        foreach ($tmp_quantity as  $value) {
             # code...
            $TotalQty += $value->quanty;
            
         } 


        $tmp = DB::table('temporaries')
                ->where('user_id', $user_id)
                ->where('product_id', $id)
                ->get();
        
        foreach ($tmp as $value) {
            # code...
            if($value->product_id == $id){
                $unitPrice = ($value->price) / ($value->quanty);
                $temporary = new Temporary;
                $temporary->user_id = $user_id;
                $temporary->product_id = $id;
                $temporary->quanty = ($value->quanty) + 1;
                $temporary->product_name = $product->product_name;
                $temporary->price = ($value->price) + $unitPrice;
                $temporary->save();
                $output = array(
                    'cartvalue'     => $TotalQty
                );
                 $tmp_delete = Temporary::find($value->id);
                 $tmp_delete->delete();
                echo json_encode($output);
                $flag++;
                break;
        }
    }
        if($flag == 0){
            $temporary = new Temporary;
            $temporary->user_id = $user_id;
            $temporary->product_id = $id;
            $temporary->quanty = '1';
            $temporary->product_name = $product->product_name;
            $temporary->price = $product->product_price;
            $temporary->save();
             $output = array(
               'cartvalue'     => $TotalQty
            );
          echo json_encode($output);
        }
 }

    public function tmpQty(Request $request){

        $user_id = Auth::user()->id;
         
         $tmp_quantity = DB::table('temporaries')
                        ->where('user_id', $user_id)
                        ->get();
        $TotalQty = 0;
        foreach ($tmp_quantity as  $value) {
             # code...
            $TotalQty += $value->quanty;
            
         } 
         $output = array(
            'cartvalue'     => $TotalQty
        );
        echo json_encode($output);
    }

    public function reduceAll(Request $request){
        $tmp = Temporary::find($request->id);
        $tmp->delete();
         return redirect('shop-to-cart');
    }

    public function reduceOne(Request $request){
        $tmp = Temporary::find($request->id);
        $user_id = Auth::user()->id;
        $unitPrice = ($tmp->price) / ($tmp->quanty);

        if($tmp->quanty > 1){
        $temporary = Temporary::find($request->id);
        $temporary->user_id = $user_id;
        $temporary->product_id = $tmp->product_id;
        $temporary->quanty = ($tmp->quanty) - 1;
       $temporary->product_name = $tmp->product_name;
        $temporary->price = ($tmp->price) - $unitPrice;
        $temporary->save();

        
         return redirect('shop-to-cart');
     }else{
         $tmp = Temporary::find($request->id);
        $tmp->delete();
         return redirect('shop-to-cart');
     }
    }

}



