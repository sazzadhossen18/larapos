<!DOCTYPE html>
<html>
<head>
  <title>Invoice DPF Detail</title>
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
     <div class="container">
       <div class="row">
          <div class="col-md-12">
          <table width="100%">
            <tr>
              <td class="text-center" width="60%">
                <h4><strong>Digital Shop</strong></h4>
                <h5><strong>Dhaka, Notun Bazar</strong></h5>
                <h6><strong>www.digitalshop.com</strong></h6>
              </td>
              <td class="text-right" width="40%">
               <h2> <strong>Invoice no:</strong>#{{$payment['invoice']['invoice_no']}}</h2>
              </td>
            </tr>
          </table>
      </div>

      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Customer Invoice Details</strong></h2>
      </div>

         <div class="col-md-12">
            <table width="100%">
                  <tbody>
                    <tr>
                      <td width="30%"><strong>Name:</strong>{{$payment['customer']['name']}}</td>
                      <td width="30%"><strong>Phone no:</strong>{{$payment['customer']['phone']}}</td>
                      <td width="30%"><strong>Address:</strong>{{$payment['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
         </div>
       </div>

      <div class="row">
        <div class="col-md-12">
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
                     @php
                      $total_sum +=$details->selling_price;
                    @endphp
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
                    <tr>
                      <td colspan="6" style="text-align:center;font-weight:bold">Paid Summery</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="text-align:center;font-weight:bold"><strong>Date</strong></td>
                       <td colspan="3" style="text-align:center;font-weight:bold"><strong>Paid Amount</strong></td>
                    </tr>
                    @php
                    $payment_detail = App\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
                    @endphp
                    @foreach($payment_detail as $details)
                    <tr>
                       <td colspan="3" style="text-align:center;font-weight:bold"><strong>{{$details->date}}</strong></td>
                       <td colspan="3" style="text-align:center;font-weight:bold"><strong>{{$details->current_paid_amount}}</strong></td>
                    </tr>
                    @endforeach
                  
                  </tbody>
            </table>
            @php
            $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            @endphp
          <i style="font-size: 10px; float: right;">Printing Time: {{$date->format('F j, Y, g:i a')}} </i>
        </div>
      </div>

      <div class="col-md-12">
        <table border="0" width="100%">
          <tbody>
            <tr>
              <td style="width: 40%">
                <p style="text-align: center; margin-left:20px;">Customer Signature</p>
              </td>
              <td style="width: 20%"></td>
              <td style="width: 40%; text-align: center;">
                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
                <p style="text-align: center;">Seller Signature</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</body>
</html>



