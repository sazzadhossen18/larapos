@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pending Puschase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending Puschase</li>
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
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data['payment']['customer']['name']}}</td>
                      <td>#{{$data->invoice_no}}</td>
                      <td>{{$data->date}}</td>
                      <td>{{$data->description}}</td>
                       <td>{{$data['payment']['total_amount']}}</td>
                      <td>
                        
                      @if($data->status=='0')
                        <span style="background:#FF5733; padding:10px;color:#fff;">Pending</span>
                        @else($data->status=='1')
                        <span class="btn btn-primary">Appoved</span>
                       @endif
                      </td>
                      <td>
                        @if($data->status=='0')
                        <a title="Approve"  class="btn btn-sm btn-success" href="{{route('invoices.approve',$data->id)}}"><i class="fa fa-check"></i></a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('invoices.delete',$data->id)}}"><i class="fa fa-trash"></i></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
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