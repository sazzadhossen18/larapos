@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customer</h1>
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
                <h3>Customer Credit List
                  <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit.pdf')}}" target="_blank"><i class="fa fa-download"></i>Download PDF </a>
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
                      <th>Action</th>
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
                      <td>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('invoice.edit',$data->invoice_id)}}"><i class="fa fa-edit"></i></a>
                      <a title="Details" class="btn btn-sm btn-primary" href="{{route('invoice.details',$data->invoice_id)}}" target="_blank"><i class="fa fa-eye"></i></a> 
                    </td>
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