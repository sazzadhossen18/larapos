@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Stock Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock Report</li>
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
                  <a class="btn btn-success float-right btn-sm" href="{{route('stocks.report.pdf')}}" target="_blank"><i class="fa fa-download"></i> Download</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover ">
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