@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Credit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Credit Customer</li>
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
                <h3>Edit Invoice
                  <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit')}}"><i class="fa fa-list"></i>Customer Credit List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table width="100%">
                  <tbody>
                    <tr>
                      <td width="30%"><strong>Name:</strong>{{$payment['customer']['name']}}</td>
                      <td width="30%"><strong>Phone no:</strong>{{$payment['customer']['phone']}}</td>
                      <td width="30%"><strong>Address:</strong>{{$payment['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
            <form action="{{route('invoice.update',$payment->invoice_id)}}" method="post">
              @csrf
            <table border="1" width="100%"  style="margin-top: 50px; margin-bottom: 10px;">
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
                    $invoice_details= App\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                    @endphp
                    @foreach($invoice_details as $key => $details)
                    <tr style="text-align: center;">
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
                      <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                      <td class="text-center">{{$payment->due_amount}}</td>
                    </tr>
                      <tr>
                      <td colspan="5" class="text-right"><strong>Grount Total</strong> </td>
                      <td class="text-center">{{$payment->total_amount}}</td>
                    </tr>
                  
                  </tbody>
            </table>

            <div class="row">
                  <div class="form-group col-md-3">
                     <label>Paid Status</label>
                     <select name="paid_status" class="form-control" id="paid_status">
                         <option value="">Select Paid Ptatus</option>    
                         <option value="full_paid">Full Paid</option>
                          <option value="partial_paid">Partial Paid</option>    
                      </select>
                      <input type="text" name="paid_amount"  class="form-control paid_amount"style="display: none;" placeholder="Enter Paid Amount">
                    </div>
                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control datepicker form-control-sm" name="date" id="date" placeholder="YYYY-MM-DD">
                  </div>
                  <div class="form-group col-md-3">
                     <button class="btn btn-primary" type="submit">Invoice Update
                    </button>
                  </div>
            </div>
        </form>


              </div><!-- /.card-body -->
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


 <script type="text/javascript">
     
        $(document).on('change','#paid_status',function(){

          var paid_status = $(this).val();
           
           if ( paid_status == 'partial_paid' ) {

            $('.paid_amount').show();
            
           }else
           {
              $('.paid_amount').hide();
           }

    });

    </script>







@endsection