<!DOCTYPE html>
<html>
<head>
  <title>Daily Invoice Report DPF</title>
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
     <div class="container">
       <div class="row">
         

      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Daily Invoice Report </strong></h2>
      </div>

         <div class="col-md-12">
           
         </div>
       </div>

      <div class="row">
        <div class="col-md-12">
          <table border="1" width="100%">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                  
                      <th>Amount</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total = '0';
                    @endphp
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data['payment']['customer']['name']}}</td>
                      <td>#{{$data->invoice_no}}</td>
                      <td>{{$data->date}}</td>
                     
                      <td>{{$data['payment']['total_amount']}}</td>
                      @php
                     $total +=$data['payment']['total_amount']; 
                    @endphp
                    </tr>
                  
                    @endforeach
                    <tr>
                      <td colspan="5">Grand Total</td>
                      {{ $total}}
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



