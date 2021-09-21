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
use App\Invoice;
use App\InvoiceDetail;
use App\Payment;
use App\PaymentDetail;
use App\Customer;
class InvoiceController extends Controller
{
   

    public function view(){
    	$data['allData'] = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
    	return view('backend.invoices.view-invoices',$data);
    }


     public function add(){
     	$data['categorys'] = Category::all();
        $data['customers'] = Customer::all();
        $data['date']=date('Y-m-d');
     	$invoice_data=Invoice::orderBy('id','desc')->first();
        if ($invoice_data == null){
            $firstReg = '0';
            $data['invoice_no']= $firstReg+1;   
        }else{
            $invoice_data=Invoice::orderBy('id','desc')->first()->invoice_no; 
            $data['invoice_no']= $invoice_data+1;
        }
    return view('backend.invoices.add-invoices',$data);
    }

   
     public function store(Request $request){

        if ($request->category_id == null) {
            return redirect()->back()->with('error','Sorry! You Do not Select any Product');
        }else{

        if ($request->paid_amount>$request->estimated_amount){
            return redirect()->back()->with('error','Sorry! Paid Amount is Maximum Than Total Amount');
            }else{
               
        $invoice = new Invoice();
        $invoice->invoice_no = $request->invoice_no;
        $invoice->date =date('Y-m-d',strtotime($request->date));
        $invoice->description = $request->description;
        $invoice->status = '0';

        DB::transaction(function() use($request, $invoice){
            if($invoice->save()){
            $count_category = count($request->category_id);
            for($i=0; $i<$count_category; $i++) {
            $InvoiceDetail= new InvoiceDetail();
            $InvoiceDetail->date = date('Y-m-d',strtotime($request->date));;
            $InvoiceDetail->invoice_id = $invoice->id;
            $InvoiceDetail->product_id = $request->product_id[$i];
            $InvoiceDetail->category_id = $request->category_id[$i];
            $InvoiceDetail->selling_qty = $request->selling_qty[$i];
            $InvoiceDetail->selling_price = $request->selling_price[$i];
            $InvoiceDetail->unit_price = $request->unit_price[$i];
            $InvoiceDetail->status = '1';
            $InvoiceDetail->save();
            }

        if($request->customer_id == '0'){

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        $customer_id = $customer->id;
        }else{
        $customer_id = $request->customer_id; 
        }

        $Payment= new Payment();
        $PaymentDetail= new PaymentDetail();
        $Payment->invoice_id = $invoice->id;
        $Payment->customer_id = $customer_id;
        $Payment->paid_status = $request->paid_status;
        $Payment->discount_amount = $request->discount_amount;
        $Payment->total_amount = $request->estimated_amount;
        if ($request->paid_status == 'full_paid'){
            $Payment->paid_amount = $request->estimated_amount;
            $Payment->due_amount = '0';
            $PaymentDetail->current_paid_amount=$request->estimated_amount;
        }elseif ($request->paid_status == 'full_due') {
            $Payment->paid_amount = '0';
            $Payment->due_amount = $request->estimated_amount;
            $PaymentDetail->current_paid_amount='0';
        }elseif($request->paid_status == 'partial_paid'){
            $Payment->paid_amount = $request->paid_amount;
            $Payment->due_amount = $request->estimated_amount-$request->paid_amount; 
            $PaymentDetail->current_paid_amount=$request->paid_amount;                
        }
        $Payment->save();
        $PaymentDetail->invoice_id = $invoice->id;
        $PaymentDetail->date=date('Y-m-d',strtotime($request->date));
        $PaymentDetail->save();

             }

        });
     }

    }
                
    return redirect()->route('invoices.pending')->with('success','Data Save Successfully');
    }  




       public function pending(){
            $data['allData'] = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.invoices.pending-invoices',$data);
        }



    public function approve($id){
        $data['invoice'] = Invoice::with(['invoicedetails'])->find($id);
        return view('backend.invoices.approve-invoices',$data);
    }




public function approvestore(Request $request, $id){

     foreach ($request->selling_qty as $key => $val) {
       $invoice_details =InvoiceDetail::where('id',$key)->first();
       $product = Product::where('id', $invoice_details->product_id)->first(); 
        if ($product->quantity < $request->selling_qty[$key]) {
        return  redirect()->back()->with('error','You Approve Maximum Value');
        }
     }
    $invoice = Invoice::find($id);
    $invoice->status = '1';
    DB::transaction( function() use($request,$invoice,$id){
      foreach ($request->selling_qty as $key => $val) {
       $invoice_details = InvoiceDetail::where('id', $key)->first();
       $product = Product::where('id', $invoice_details->product_id)->first(); 
        $product->quantity=((float)$product->quantity)-((float)$request->selling_qty[$key]);
        $product->save();
        }
        $invoice->save();

    });

    return Redirect()->route('invoices.pending')->with('success','Invoice Successfully Approved');
}


    
    function print($id) {
        $data['invoice'] = Invoice::with(['invoicedetails'])->find($id);
        $pdf = PDF::loadView('backend.invoices.pdf-invoices', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }




    public function delete($id){
        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetail::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetail::where('invoice_id',$invoice->id)->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }




     public function getstock(Request $request){
         $product_id =$request->product_id;
         $allstock =Product::where('id', $product_id)->first()->quantity;
         return response()->json($allstock);

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
    return view('backend.invoices.daily-report');
   }


   public function dailyreportpdf(Request $request){
        $start_date =date('Y-m-d',strtotime($request->start_date));
        $end_date =date('Y-m-d',strtotime($request->end_date));
        $data['allData'] = Invoice::whereBetween('date',[$start_date,$end_date])->where('status','1')->get();
        $pdf = PDF::loadView('backend.invoices.pdf-invoices-daily', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

   }







}
