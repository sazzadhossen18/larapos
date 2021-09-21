<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Unit;
use App\Supplier;
use App\Product;
class ProductController extends Controller
{
    

	public function view(){
    	$data['allData'] = Product::all();
    	return view('backend.product.view-product',$data);
    }


     public function add(){
     	$data['suppliers'] = Supplier::all();
     	$data['categorys'] = Category::all();
     	$data['units'] = Unit::all();
    	return view('backend.product.add-product',$data);
    }

    public function store(Request $request){
    	 	$data = new Product();
    	 	$data->supplier_id=$request->supplier_id;
    	 	$data->category_id=$request->category_id;
            $data->unit_id=$request->unit_id;
            $data->name=$request->name;
            $data->unit_price=$request->unit_price;
            $data->selling_price=$request->selling_price;
            $data->quantity=$request->quantity;

            if ($request->file('image')){
        	$file = $request->file('image');
        	$filename =date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('upload/user_images'), $filename);
        	$data['image']= $filename;
        	}
            $data->save();
    	return redirect()->route('products.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['categorys'] = Category::all();
        $data['units'] = Unit::all();
        return view('backend.product.edit-product',$data);
    }

    public function update(Request $request,$id){
        $data = Product::find($id);
        $data->supplier_id=$request->supplier_id;
        $data->category_id=$request->category_id;
        $data->unit_id=$request->unit_id;
        $data->name=$request->name;
        $data->unit_price=$request->unit_price;
        $data->selling_price=$request->selling_price;
        $data->quantity=$request->quantity;
         if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image']= $filename;
        }

        $data->save();
        return redirect()->route('products.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $user = Product::find($id);
        @unlink(public_path('upload/user_images/'.$user->image));
        $user->delete();
        return redirect()->route('products.view')->with('success','Data Deleted Successfully');
    }






}
