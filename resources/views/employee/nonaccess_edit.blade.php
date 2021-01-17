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
              <li class="breadcrumb-item active">Edit</li>
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
            <h3 class="card-title">Update Employee Data</h3>
            <a href="{{ route('nonaccess') }}" class="btn btn-outline-secondary float-right">VIEW LIST</a>
          </div>

          {!! Form::model($employee, ['method' => 'PATCH','route' => ['employee.update', $employee->id], 'enctype'=>'multipart/form-data']) !!}

            <div class="card-body">
              <div class="row">


                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employeeId">Employee ID</label>
                    {!! Form::text('employee_id', null, array('placeholder' => 'Enter Employee ID','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label for="employeeName">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                  </div>

                  <div class="form-group">
                    <label>Department</label>
                    {!! Form::select('department_id', $departments, $employeeDepartment, array('class' => 'form-control select2','')) !!}
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Select Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" data-preview="#preview" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employeeDesig">Designation</label>
                    {!! Form::text('designation', null, array('placeholder' => 'Enter Designation','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label for="employeeMob">Mobile Number</label>
                    {!! Form::text('mobile', null, array('placeholder' => 'Enter Mobile Number','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label>Blood Group</label>
                    {!! Form::select('blood_id', $bloods,$employeeBlood, array('class' => 'form-control select2','')) !!}
                  </div> 

                </div>
              </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
              <input type="hidden" name="card_type" value="NonAccess">
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


