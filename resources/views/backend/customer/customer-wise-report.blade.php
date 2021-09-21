@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Wise Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3>
                  Select Criteria
                </h3>
              </div><!-- /.card-header -->
<div class="card-body">
    <div class="row">
      <div class="col-sm-12 text-center">
        <strong>Customer Wise Credit Report</strong>
        <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value">
        <strong>Customer Wise Paid Report</strong>
        <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">
      </div>
    </div>

    <div class="show-credit" style="display:none">
     <form action="{{route('customers.credit.report')}}" method="GET" target="_blank">
        <div class="form-row">
          <div class="col-sm-8">
            <label>Customer Name</label>
            <select name="customer_id" class="form-control select2" required>
              <option value="0">Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}({{$customer->phone}})</option>
                @endforeach
            </select>
          </div>
          <div class="col-sm-4" style="padding-top: 30px;">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>


    <div class="show-paid" style="display:none">
      <form action="{{route('customers.paid.report')}}" method="GET" target="_blank">
        <div class="form-row">
          <div class="col-sm-8">
             <label>Customer Name</label>
           <select name="customer_id" class="form-control select2" required>
              <option value="0">Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}({{$customer->phone}})</option>
                @endforeach
            </select>
          </div>
          <div class="col-sm-4" style="padding-top: 30px;">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>





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
    $(document).on('change','.search_value',function(){
      var search_value = $(this).val();
      if (search_value == 'customer_wise_credit' ){
          $('.show-credit').show();
           }else
           {
            $('.show-credit').hide();
           }

      });
</script>

<script type="text/javascript">
    $(document).on('change','.search_value',function(){
      var search_value = $(this).val();
      if (search_value == 'customer_wise_paid' ){
          $('.show-paid').show();
           }else
           {
            $('.show-paid').hide();
           }

      });
</script>






@endsection