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
                        <h3 class="card-title">Door wise  Employee Report </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('doorwise_report_view')}}" method="GET" target="_blank">
                            <div class="form-group">
                                <label>Select Department</label>
                                {!! Form::select('door_id', $doors,[], array('class' => 'form-control select2','')) !!}
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
                        <form action="{{route('employeewise_report_view')}}" method="GET" target="_blank">
                            <div class="form-group">
                                <label>Select Employee</label>
                                {!! Form::select('employee_id', $employees,[], array('class' => 'form-control select2','')) !!}
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

