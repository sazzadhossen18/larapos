<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
class UnitController extends Controller
{
   


public function view(){
    	$data['allData'] = Unit::all();
    	return view('backend.unit.view-unit',$data);
    }


     public function add(){
    	return view('backend.unit.add-unit');
    }

    public function store(Request $request){
    	 	$data = new Unit();
            $data->name=$request->name;
            $data->save();
    	return redirect()->route('units.view')->with('success','Data Inserted Successfully');
    }


    public function edit($id){
        $editData = Unit::find($id);
        return view('backend.unit.edit-unit',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Unit::find($id);
        $data->name=$request->name;
       
        $data->save();
        return redirect()->route('units.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $user = Unit::find($id);
        $user->delete();
        return redirect()->route('units.view')->with('success','Data Deleted Successfully');
    }












}
