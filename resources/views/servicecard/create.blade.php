@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


                <div class="col-sm-6">

                    @if ($message = Session::get('success'))
                        <body onload="swalDefaultSuccess('success', '{{ $message }}')">
                        @endif



                        @if (count($errors) > 0)
                            <body onload="swalDefaultError('error', '@foreach ($errors->all() as $error) {{ $error }}</br> @endforeach')">

                    @endif

                </div>



                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Kyamch</a></li>
                        <li class="breadcrumb-item "><a href="#">employee</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card ">

                <div class="card-header">
                    <h3 class="card-title">Register New Service Card</h3>
                    <a href="{{ route('servicecard.index') }}" class="btn btn-outline-secondary float-right">VIEW LIST</a>
                </div>


                {!! Form::open(array('route' => 'servicecard.store','method'=>'POST')) !!}
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeId">Service ID</label>
                                {!! Form::text('service_id', null, array('placeholder' => 'Enter Service ID','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label>Department</label>
                                {!! Form::select('department_id', $departments,[], array('class' => 'form-control select2','')) !!}
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeName">Place</label>
                                {!! Form::text('place', null, array('placeholder' => 'Place or Comment','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <input type="hidden" name="status" value="Issue card">
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->



    </section>
    <!-- /.content -->


@endsection


@section('script')

@endsection


