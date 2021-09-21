<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryCategory extends Controller
{
   public function view(){
    	$data['allData'] = Category::all();
    	return view('backend.category.view-category',$data);
    }


     public function add(){
    	return view('backend.category.add-category');
    }

    public function store(Request $request){
    	 	$data = new Category();
            $data->name=$request->name;
            $data->save();
    	return redirect()->route('categorys.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
        $editData = Category::find($id);
        return view('backend.category.edit-category',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Category::find($id);
        $data->name=$request->name;
       
        $data->save();
        return redirect()->route('categorys.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $user = Category::find($id);
        $user->delete();
        return redirect()->route('categorys.view')->with('success','Data Deleted Successfully');
    }
}
