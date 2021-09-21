@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Paid Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paid Customer</li>
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
                <h3>Customer Paid List
                  <a class="btn btn-success float-right btn-sm" href="{{route('customers.paid.pdf')}}" target="_blank"><i class="fa fa-download"></i>Download PDF </a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
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
                    $total_paid = '0';
                    @endphp
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data['customer']['name']}}</td>
                      <td>{{$data['invoice']['invoice_no']}}</td>
                      <td>{{$data['invoice']['date']}}</td>
                      <td>{{$data->paid_amount}}Tk</td>
                     
                    </tr>
                    @php
                    $total_paid  +=$data->paid_amount; 
                    @endphp
                    @endforeach
                    <tr>
                      <td colspan="4"><strong>Grand Total</strong></td>
                      <td><strong>{{$total_paid}}</strong>Tk</td>
                    </tr>
                  </tbody>
                </table>
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
@endsection