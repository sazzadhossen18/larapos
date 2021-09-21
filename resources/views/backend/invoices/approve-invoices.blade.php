@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Invoice no:#{{$invoice->invoice_no}}
                  <a class="btn btn-success float-right btn-sm" href="{{route('invoices.pending')}}"><i class="fa fa-list"></i> Pending Invoice List</a>
                </h3>
              </div><!-- /.card-header -->
             <div class="card-body">
                @php
                $payment=App\Payment::where('invoice_id',$invoice->id)->first();
                @endphp
                <table>
                  <tbody>
                    <tr>
                      <td width="15%"><strong>Customer name:</strong>{{$payment['customer']['name']}}</td>
                      <td width="15%"><strong>Customer phone no:</strong>{{$payment['customer']['phone']}}</td>
                      <td width="15%"><strong>Customer Address:</strong>{{$payment['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
                
                <form method="post" action="{{route('approve.store',$invoice->id)}}">
                  @csrf
                  <table width="100%" border="2" style="margin-top: 50px; margin-bottom: 10px;">
                  <thead>
                    <tr style="text-align: center;">
                      <td>SL</td>
                      <td>Category</td>
                      <td>Product Name</td>
                      <td>Quantity</td>
                      <td>Unit Price</td>
                     <td>Total price</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_sum = '0';
                    @endphp
                    @foreach($invoice['invoicedetails'] as $key => $details)
                    <tr style="text-align: center;">
                       <input type="hidden" value="{{$details->category_id}}" name="category_id[]">
                       <input type="hidden" value="{{$details->product_id}}" name="product_id[]">
                        <input type="hidden" value="{{$details->selling_qty}}" name="selling_qty[{{$details->id}}]">
                      <td>{{$key+1}}</td>
                      <td>{{$details['category']['name']}}</td>
                      <td>{{$details['product']['name']}}</td>
                      <td>{{$details->selling_qty}}</td>
                      <td>{{$details->unit_price}}</td>
                      <td>{{$details->selling_price}}</td>
                    </tr>
                     <?php
                      $total_sum +=$details->selling_price;
                     ?>
                    @endforeach
                    <tr>
                      <td colspan="5" class="text-right"><strong>
                        Sub Total
                      </strong></td>
                      <td class="text-center">{{$total_sum}}</td>
                    </tr>

                      <tr>
                      <td colspan="5" class="text-right"><strong>Discount</strong></td>
                      <td class="text-center">{{$payment->discount_amount}}</td>
                    </tr>

                      <tr>
                      <td colspan="5" class="text-right"><strong>Paid Amount</strong></td>
                      <td class="text-center">{{$payment->paid_amount}}</td>
                    </tr>
                      <tr>
                      <td colspan="5" class="text-right"><strong>Due Amount</strong></td>
                      <td class="text-center">{{$payment->due_amount}}</td>
                    </tr>
                      <tr>
                      <td colspan="5" class="text-right"><strong>Grount Total</strong> </td>
                      <td class="text-center">{{$payment->total_amount}}</td>
                    </tr>
                  
                  </tbody>
                </table>
                <button type="submit" class="btn btn-success">Approove Invoice</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection