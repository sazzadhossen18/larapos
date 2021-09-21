<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use Auth;
class SupplierController extends Controller
{
    
 	public function view(){
    	$data['allData'] = Supplier::all();
    	return view('backend.supplier.view-supplier',$data);
    }


     public function add(){
    	return view('backend.supplier.add-supplier');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|unique:users,email',
    		'address'=>'required',
    		'phone'=>'required',
    	]);
    	 	$data = new Supplier();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->address=$request->address;
           
            $data->save();
    	return redirect()->route('suppliers.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
        $editData = Supplier::find($id);
        return view('backend.supplier.edit-supplier',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Supplier::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address; 
        $data->save();
        return redirect()->route('suppliers.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $user = Supplier::find($id);
        $user->delete();
        return redirect()->route('suppliers.view')->with('success','Data Deleted Successfully');
    }



}
