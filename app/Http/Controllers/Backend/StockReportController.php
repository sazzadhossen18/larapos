<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Unit;
use App\Supplier;
use App\Product;
use PDF;
class StockReportController extends Controller
{
    
	

	public function stockreport(){
    	$data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
    	return view('backend.stock.stock-report',$data);
    }


     public function stockreportpdf(){
     	$data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
     	$pdf = PDF::loadView('backend.stock.stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    	return view('backend.product.add-product',$data);
    }




}
