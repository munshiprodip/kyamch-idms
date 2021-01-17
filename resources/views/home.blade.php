@extends('layouts.app')



@section('style')



@endsection



@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1 class="m-0 text-dark">Welcome to ID Card Management System</h1>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">EMPLOYEE</span>
              <span class="info-box-number">{{ $total_employee }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ACCESS CARD</span>
              <span class="info-box-number">{{ $total_access_employee }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-address-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NON ACCESS CARD</span>
              <span class="info-box-number">{{ $total_nonaccess_employee }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SERVICE CARD</span>
              <span class="info-box-number">
                  {{$servicecard_total}}
                  <small></small>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Overview</h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->




            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Access Card Summery</strong>
                  </p>

                  <div class="progress-group">
                    Requisirion / Received
                    <span class="float-right"><b>{{ $total_product_access }}</b>/{{ $total_product_access }}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group">
                    Consumption
                    <span class="float-right"><b>{{$total_consumption_access}}</b>/{{ $total_product_access }}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-danger" style="width: {{$consumption_per_access}}%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Damage</span>
                    <span class="float-right"><b>{{$total_damage_access}}</b>/{{ $total_product_access }}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-success" style="width: {{$damage_per_access}}%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    Balance
                    <span class="float-right"><b>{{$total_balance_access}}</b>/{{ $total_product_access }}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width: {{$balence_per_access}}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>


                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Plastic Card Summery</strong>
                  </p>

                  <div class="progress-group">
                    Requisirion / Received
                    <span class="float-right"><b>{{$total_product_nonaccess}}</b>/{{$total_product_nonaccess}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group">
                    Consumption
                    <span class="float-right"><b>{{$total_consumption_nonaccess}}</b>/{{$total_product_nonaccess}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-danger" style="width: {{$consumption_per_nonaccess}}%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Damage</span>
                    <span class="float-right"><b>{{$total_damage_nonaccess}}</b>/{{$total_product_nonaccess}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-success" style="width: {{$damage_per_nonaccess}}%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    Balance
                    <span class="float-right"><b>{{$total_balance_nonaccess}}</b>/{{$total_product_nonaccess}}</span>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-warning" style="width: {{$balence_per_nonaccess}}%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>




                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>

            <div class="card-footer">
              <div class="row">

                <div class="col-sm-12 col-12" style="border-bottom: 1px solid #ddd; ">
                  Pending Tasks
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-danger">Issue</span>
                    <h5 class="description-header" style="color: red;">{{$total_pending_issue}} <span style="font-weight: normal; color: #c7c3bc;">/{{$total_access_employee}}</span></h5>
                    <span class="description-text">ISSUE CARD</span>
                  </div>
                  <!-- /.description-block -->
                </div>

                <!-- /.col -->
                <div class="col-sm-2 col-2">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success">Print</span>
                    <h5 class="description-header" style="color: red;">{{$total_pending_print_access}} <span style="font-weight: normal; color: #c7c3bc;">/{{$total_access_employee}}</span></h5>
                    <span class="description-text">ACCESS CARD</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-2 ">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success">Print</span>
                    <h5 class="description-header" style="color: red;">{{$total_pending_print_nonaccess}} <span style="font-weight: normal; color: #c7c3bc;">/{{$total_nonaccess_employee}}</span></h5>
                    <span class="description-text">NON-ACCESS CARD</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-2 col-2">
                  <div class="description-block border-right">
                    <span class="description-percentage text-info">Delevery</span>
                    <h5 class="description-header" style="color: red;">{{$total_pending_delivery_access}} <span style="font-weight: normal; color: #c7c3bc;">/{{$total_access_employee}}</span></h5>
                    <span class="description-text">ACCESS CARD</span>
                  </div>
                  <!-- /.description-block -->
                </div>


                <div class="col-sm-2 col-2">
                  <div class="description-block">
                    <span class="description-percentage text-info">Delevery</span>
                    <h5 class="description-header" style="color: red;">{{$total_pending_delivery_nonaccess}} <span style="font-weight: normal; color: #c7c3bc;">/{{$total_nonaccess_employee}}</span></h5>
                    <span class="description-text">NON ACCESS CARD</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
@endsection


