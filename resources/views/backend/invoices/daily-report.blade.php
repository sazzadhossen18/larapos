@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Search</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Search</li>
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
              <form action="{{route('daily.report.pdf')}}" method="GET" id="myForm" target="_blank">
              <div class="card-body">
                  <div class="form-row">
                     <div class="form-group col-md-4">
                        <label>Start Date</label>
                        <input type="date" class="form-control datepicker form-control-sm" name="start_date" id="start_date" placeholder="YYYY-MM-DD">
                      </div>
                     <div class="form-group col-md-4">
                        <label>End Date</label>
                        <input type="date" class="form-control datepicker form-control-sm" name="end_date" id="end_date" placeholder="YYYY-MM-DD">
                      </div>
                      <div class="form-group col-md-2" style="padding-top: 30px;">
                          <Button type="submit" class="btn btn-primary">Search</Button>
                      </div>


                  </div>
              </div><!-- /.card-body -->

              </form>

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


<script>
$(function () {
  $('#myForm').validate({
    rules: {

      start_date: {
        required: true,
      },

      end_date: {
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