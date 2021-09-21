<!DOCTYPE html>
<html>
<head>
  <title>Stock Report DPF</title>
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
     <div class="container">
       <div class="row">
         

      <div class="col-md-12">
        <h2 style="font-weight: bold; padding-top:50px; text-align: center;"><strong>Stock Report </strong></h2>
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
                      
                      <th>Category Name</th>
                      <th>Supplier Name</th>
                    
                      <th>Product Name</th>
                      <th>Quantity</th>
                        <th>Unit Name</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $user)
                    <tr>
                      <td>{{$key+1}}</td>
                    
                     
                      <td>{{$user['category']['name']}}</td>
                      <td>{{$user['supplier']['name']}}</td>
                      
                      <td>{{$user->name}}</td>
              
                      <td>{{$user->quantity}}</td>
                      <td>{{$user['unit']['name']}}</td>
                     
                    </tr>
                    @endforeach
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



