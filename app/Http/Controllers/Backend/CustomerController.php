<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Payment;
use App\PaymentDetail;
use PDF;
class CustomerController extends Controller
{
    public function view(){
    	$data['allData'] = Customer::all();
    	return view('backend.customer.view-customer',$data);
    }


     public function add(){
        return view('backend.customer.add-customer');
    }



    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'address'=>'required',
            'phone'=>'required',
        ]);
            $data = new Customer();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->address=$request->address;
           
            $data->save();
        return redirect()->route('customers.view')->with('success','Data Inserted Successfully');
    }



     public function edit($id){
        $editData = Customer::find($id);
        return view('backend.customer.edit-customer',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Customer::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->address=$request->address; 
        $data->save();
        return redirect()->route('customers.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $user = Customer::find($id);
        $user->delete();
        return redirect()->route('customers.view')->with('success','Data Deleted Successfully');
    }





    public function credit(){
    	$data['allData'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
    	return view('backend.customer.credit-customer',$data);
    }


    public function creditpdf(){
        $data['allData'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        $pdf = PDF::loadView('backend.customer.credit-customer-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }



    public function invoiceedit($invoice_id){
    	$payment = Payment::where('invoice_id',$invoice_id)->first();
    return view('backend.customer.edit-invoice',compact('payment'));

    }
    

    public function invoiceupdate(Request $request,$invoice_id){
    	if ($request->new_paid_amount<$request->paid_amount){
            return redirect()->back()->with('error','Sorry! You Have Paid Maximum Value');
          }else{
          	$payment = Payment::where('invoice_id',$invoice_id)->first();
          	 $PaymentDetail= new PaymentDetail();
          	 $payment->paid_status = $request->paid_status;
          	if($request->paid_status == 'full_paid'){
            $payment->paid_amount =Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
            $payment->due_amount = '0';
            $PaymentDetail->current_paid_amount=$request->new_paid_amount;
        	}elseif($request->paid_status == 'partial_paid'){
             $payment->paid_amount =Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount =Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
            $PaymentDetail->current_paid_amount=$request->paid_amount;                
        	}

        $payment->save();
        $PaymentDetail->invoice_id = $invoice_id;
        $PaymentDetail->date=date('Y-m-d',strtotime($request->date));
        $PaymentDetail->save();

          }

        return redirect()->route('customers.credit')->with('success','Data Save Successfully');
    }





    public function invoicedetails($invoice_id){
    	$payment = Payment::where('invoice_id',$invoice_id)->first();
    	$pdf = PDF::loadView('backend.customer.invoice-details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }


    public function paid(){
      $data['allData'] = Payment::where('paid_status','full_paid')->get();
    return view('backend.customer.paid-customer',$data);  
    }

     public function paidpdf(){
         $data['allData'] = Payment::where('paid_status','full_paid')->get();
        $pdf = PDF::loadView('backend.customer.paid-customer-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }


    public function customerswise(){
        $customers = Customer::orderBy('id','asc')->get();
        return view('backend.customer.customer-wise-report',compact('customers'));
    }


    public function customerspaid(Request $request){
         $data['allData'] = Payment::where('customer_id',$request->customer_id)->where('paid_status','full_paid')->get();
      
        $pdf = PDF::loadView('backend.customer.customer-wise-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }





 

}
