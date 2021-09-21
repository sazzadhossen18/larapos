<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Unit;
use App\Supplier;
use App\Product;
use App\Purchase;
use DB;
use PDF;
class PurchaseController extends Controller
{
   public function view(){
    	$data['allData'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();

    	return view('backend.puschases.view-puschases',$data);
    }


     public function add(){
     	$data['suppliers'] = Supplier::all();
     	$data['categorys'] = Category::all();
     	$data['products'] = Product::all();
    	return view('backend.puschases.add-puschases',$data);
    }

   
    public function store(Request $request){

    if ($request->category_id == null) {
        return redirect()->back()->with('error','Sorry ! You not select any item');      
    }else {
    $count_category = count($request->category_id);
    for ($i=0; $i<$count_category; $i++) { 
    $purchases= new Purchase();
    $purchases->date = date('Y-m-d',strtotime($request->date[$i]));
    $purchases->purchases_no =$request->purchases_no[$i]; 
    $purchases->supplier_id =$request->supplier_id[$i]; 
    $purchases->category_id =$request->category_id[$i];
    $purchases->product_id =$request->product_id[$i]; 
    $purchases->buying_qty =$request->buying_qty[$i];  
    $purchases->unit_price =$request->unit_price[$i];  
    $purchases->buying_price =$request->buying_price[$i];  
    $purchases->status ='0'; 
    $purchases->save();   
    }

}

return Redirect()->route('puschases.view')->with('success','Data Save Successfully');


}




    public function delete($id){
        $delete = Purchase::find($id);
        $delete->delete();
        return redirect()->route('products.view')->with('success','Data Deleted Successfully');
    }



        public function pending(){
            $data['allData'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.puschases.pending-puschases',$data);
        }


    public function approve($id){
        $puschase = Purchase::find($id);
        $product = Product::where('id',$puschase->product_id)->first();
        $puschase_qty= ((float)( $puschase->buying_qty))+((float)( $product->quantity));
        $product->quantity = $puschase_qty;
        if($product->save()){
            DB::table('purchases')
            ->where('id',$id)
            ->update(['status' => 1]);
        } 

    return redirect()->route('puschases.pending')->with('success','Data Approved Successfully');

    }



 	public function getcategory(Request $request){
   		$supplier_id =$request->supplier_id;
   		$allcategory =Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
   		return response()->json($allcategory);

   }


    public function getproduct(Request $request){
   		$category_id =$request->category_id;
   		$allproduct =Product::where('category_id',$category_id)->get();
   		return response()->json($allproduct);

   }



   public function dailyreport(){
    return view('backend.puschases.daily-report');
   }


   public function dailyreportpdf(Request $request){
        $start_date =date('Y-m-d',strtotime($request->start_date));
        $end_date =date('Y-m-d',strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date',[$start_date,$end_date])->where('status','1')->get();
        $data['start_date'] =date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('Y-m-d',strtotime($request->end_date));
        $pdf = PDF::loadView('backend.puschases.pdf-puschases-daily', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

   }













}
