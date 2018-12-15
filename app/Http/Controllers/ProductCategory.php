<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use DB;

class ProductCategory extends Controller
{
    //
    public function index(){
    	return view('admin.add-category');
    }

    public function store(Request $request){

    	$output = "";
    	$product_category = new Category;
    	$product_category->category = $request->product_category;
    	$product_category->save();
    	$success_output = '<div class="alert alert-success">Data Inserted</div>';
    	 $output = array(
            'success'   =>  $success_output,
        );
        echo json_encode($output);
    }

    public function category_details(){
    	$category = Category::all();
    	return view('admin.category-details')->with(compact('category'));
    }

    public function fetchdata(Request $request){
    	$id = $request->input('id');
    	$category = Category::find($id);
    	$output = array(
    		'category' => $category->category, 
    		'id' => $category->id
    );
    	    echo json_encode($output);
    }

    public function edit(Request $request){
		$categories = Category::find($request->get('category_product_id'));
    	$categories->category = $request->get('category_name');
    	$categories->save();
    	$output = array('success' => 'Data Edited Succefully' );
    	echo json_encode($output);
    }

    public function categorydelete(Request $request){
        $category = Category::find($request->category_id);
        $category->delete();
        return redirect(route('category'));
    }
}
