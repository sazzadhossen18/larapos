<!DOCTYPE html>
<html>
<head>
  <title>Daily Purchase Report DPF</title>
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
     <div class="container">
     


       <div class="row">
         
      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Daily Purchase Report </strong></h2>
      </div>

         <div class="col-md-12" style="font-weight: bold; padding-bottom:20px; text-align: center;">
           <strong>Date:</strong><span>{{date('Y-m-d',strtotime($start_date))}}  - {{date('Y-m-d',strtotime($end_date))}}</span>
         </div>
       </div>

      <div class="row">
        <div class="col-md-12">
          <table border="1" width="100%">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Date</th>
                      <th>Purchase No</th>
                     
                      <th>Product Name</th>
                     
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                
                      
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_sum = '0';
                    @endphp
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data->date}}</td>
                      <td>{{$data->purchases_no}}</td>
                     
                      <td>{{$data['product']['name']}}</td>
                    
                      <td>{{$data->buying_qty}}
                      {{$data['product']['unit']['name']}}

                      </td>
                      <td>{{$data->unit_price}}</td>
                      <td>{{$data->buying_price}}</td>
                     @php
                      $total_sum += $data->buying_price;
                    @endphp
                     
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="6" style="text-align:center"><strong>Grand Total</strong></td>
                      <td>{{$total_sum}}</td>
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
                <p style="text-align: center;">Owner Sinature</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

     </div>
</body>
</html>



