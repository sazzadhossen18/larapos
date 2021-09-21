@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                <h3>Purchase List
                  <a class="btn btn-success float-right btn-sm" href="{{route('puschases.add')}}"><i class="fa fa-plus-circle"></i> Add Purchase</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Date</th>
                      <th>Supplier Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Buying Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data->date}}</td>
                      <td>{{$data['supplier']['name']}}</td>
                      <td>{{$data['category']['name']}}</td>
                      <td>{{$data['product']['name']}}</td>
                      <td>{{$data->description}}</td>
                      <td>{{$data->buying_qty}}
                      {{$data['product']['unit']['name']}}

                      </td>
                      <td>{{$data->unit_price}}</td>
                      <td>{{$data->buying_price}}</td>
                      <td>
                        
                        @if($data->status=='0')
                        <span style="background:#FF5733; padding:10px;color:#fff;">Pending</span>
                        @else($data->status=='1')
                        <span class="btn btn-success">Approved</span>
                        @endif
                      </td>
                      <td>
                         @if($data->status=='0')
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('puschases.delete',$data->id)}}"><i class="fa fa-trash"></i></a>
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