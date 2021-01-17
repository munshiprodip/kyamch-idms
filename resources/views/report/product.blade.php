@extends('layouts.app')
@section('style')

@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    @if ($message = Session::get('success'))
                        <body onload="swalDefaultSuccess('success', '{{ $message }}')">
                    @endif
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Kyamch</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Requisition Reports </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('inventory_report_view')}}" method="GET" target="_blank">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio1" name="product_type" value="all" required>
                                            <label for="customRadio1" class="custom-control-label">All Product</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio2" name="product_type" value="0" required>
                                            <label for="customRadio2" class="custom-control-label">Proximity Card</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio3" name="product_type" value="1" required>
                                            <label for="customRadio3" class="custom-control-label">Plastic Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group date" id="fromdate" data-target-input="nearest">
                                            <input type="text" name="fromdate" class="form-control datetimepicker-input" data-target="#datetimepicker4"placeholder="Start Date"/>
                                            <div class="input-group-append" data-target="#fromdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group date" id="todate" data-target-input="nearest">
                                            <input type="text" name="todate" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="End Date"/>
                                            <div class="input-group-append" data-target="#todate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <button  type="reset" class="btn btn-secondary">Reset</button>
                            <button  type="submit" class="btn btn-primary float-right">View</button>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consumption Reports </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('consumption_report_view')}}" method="GET" target="_blank">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio4" name="product_type" value="all" required>
                                            <label for="customRadio4" class="custom-control-label">All Product</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio5" name="product_type" value="0" required>
                                            <label for="customRadio5" class="custom-control-label">Proximity Card</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio6" name="product_type" value="1" required>
                                            <label for="customRadio6" class="custom-control-label">Plastic Card</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio7" name="consumption_type" value="0" required>
                                            <label for="customRadio7" class="custom-control-label">Regular Consumption</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio8" name="consumption_type" value="1" required>
                                            <label for="customRadio8" class="custom-control-label">Damage Consumption</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group date" id="fromdate2" data-target-input="nearest">
                                            <input type="text" name="fromdate" class="form-control datetimepicker-input" data-target="#datetimepicker4"placeholder="Start Date"/>
                                            <div class="input-group-append" data-target="#fromdate2" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group date" id="todate2" data-target-input="nearest">
                                            <input type="text" name="todate" class="form-control datetimepicker-input" data-target="#datetimepicker" placeholder="End Date"/>
                                            <div class="input-group-append" data-target="#todate2" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <button  type="reset" class="btn btn-secondary">Reset</button>
                            <button  type="submit" class="btn btn-primary float-right">View</button>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection

@section('script')

    <script type="text/javascript">
        $(function () {
            $('#fromdate').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'ru',
                useCurrent: false
            });

            $('#todate').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'ru',
                useCurrent: false
            });

            $('#fromdate2').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'ru',
                useCurrent: false
            });

            $('#todate2').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'ru',
                useCurrent: false
            });
        });
    </script>
@endsection
