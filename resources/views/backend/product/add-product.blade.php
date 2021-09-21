@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3>Add Product
                  <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-list"></i> Product List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('products.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">

                  <div class="form-group col-md-6">
                      <label >Supplier Name</label>
                      <select name="supplier_id" class="form-control">
                        <option value="0">Select Supplier</option>
                        @foreach($suppliers as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                      </select>
                    </div>

                  <div class="form-group col-md-6">
                    <label>Category</label>
                   <select name="category_id" class="form-control">
                    <option value="0">Select Category</option>
                    @foreach($categorys as $row)
                     <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                   </select>
                  </div>

                 <div class="form-group col-md-6">
                  <label>Unit</label>
                   <select name="unit_id" class="form-control">
                     <option value="0">Select Unit</option>
                    @foreach($units as $row)
                     <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                   </select>
                  </div>
                    
                    <div class="form-group col-md-6">
                      <label>Product Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>

                  <div class="form-group col-md-6">
                      <label>Buying price</label>
                      <input type="text" name="unit_price" class="form-control">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Selling Price</label>
                      <input type="text" name="selling_price" class="form-control">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Quantity</label>
                      <input type="text" name="quantity" class="form-control">
                  </div>

                 <div class="form-group col-md-6">
                      <label>Image</label>
                      <input type="file" name="image" class="form-control" id="image">
                      
                 </div>

                 <div class="form-group col-md-6">
                      <img id="showImage" src="{{url('public/upload/no_image.png')}}" style="width: 150px;height: 160px;border:1px solid #000;">
                  </div>
                   
                   
                    <div class="form-group col-md-6" style="margin-top: 50px;">
                      <input type="submit" value="Submit" class="btn btn-primary">
                    </div>


                  </div>
                  
                </form>

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

  <!-- Page specific script -->
<script>
$(function () {
  $('#myForm').validate({
    rules: {

      Supplier_id: {
        required: true,
        email: true,
      },

      category_id: {
        required: true,
       
      },

      unit_id: {
        required: true,
      
      },
      
      name: {
        required: true,
      },
      
      

      unit_price: {
        required: true,
       
      },

      selling_price: {
        required: true,
      
      },

      quantity: {
        required: true,
      
      },
     
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection