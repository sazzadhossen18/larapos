<!DOCTYPE html>
<html>
<head>
  <title>Customer Wise Credit Report DPF</title>
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
     <div class="container">
       <div class="row">
         

      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Customer Wise Credit Report</strong></h2>
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
                      <th>Due Amount</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_due = '0';
                    @endphp
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data['customer']['name']}}</td>
                      <td>{{$data['invoice']['invoice_no']}}</td>
                      <td>{{$data['invoice']['date']}}</td>
                      <td>{{$data->due_amount}}Tk</td>
                     
                    </tr>
                    @php
                    $total_due  +=$data->due_amount; 
                    @endphp
                    @endforeach
                    <tr>
                      <td colspan="4"><strong>Grand Total</strong></td>
                      <td><strong>{{$total_due}}</strong>Tk</td>
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



