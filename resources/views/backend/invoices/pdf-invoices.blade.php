<!DOCTYPE html>
<html>
<head>
  <title>Invoice DPF</title>
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
                <h4><strong>ABC School</strong></h4>
                <h5><strong>Dhaka, Notun Bazar</strong></h5>
                <h6><strong>www.abcschool.com</strong></h6>
              </td>
              <td class="text-right" width="40%">
               <h2> <strong>Invoice no:</strong>#{{$invoice->invoice_no}}</h2>
              </td>
            </tr>
          </table>
      </div>

      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Customer Info</strong></h2>
      </div>

         <div class="col-md-12">
            @php
                $payment=App\Payment::where('invoice_id',$invoice->id)->first();
            @endphp

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
                <i style="font-size: 10px; float: right;">Print Date: {{date("d M Y")}} </i>
        </div>
      </div>


      <div class="col-md-12">
        <table border="0" width="100%">
          <tbody>
            <tr>
              <td style="width: 30%"></td>
              <td style="width: 30%"></td>
              <td style="width: 40%; text-align: center;">
                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
                <p style="text-align: center;">Seller Sinature</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>








     </div>
</body>
</html>



