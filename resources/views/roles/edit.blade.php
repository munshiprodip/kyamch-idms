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
          </div>

          @if (count($errors) > 0)
            <body onload="swalDefaultError('error', '@foreach ($errors->all() as $error) {{ $error }}</br> @endforeach')">

          @endif





          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="#">Kyamch</a></li>
              <li class="breadcrumb-item ">Role</li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Role </h3><a href="{{ route('roles.index') }}" class="btn btn-outline-secondary float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Name:</strong>
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-1 col-sm-1 col-md-1">
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <strong>Permission:</strong>
                    <div class="form-group clearfix">
                        <div class="row">
                            @foreach($permission as $value)
                                <div class="col-3">
                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    <label for="">{{ $value->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
              {!! Form::close() !!}
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



