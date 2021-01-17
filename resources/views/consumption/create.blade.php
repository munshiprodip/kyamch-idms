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
              <li class="breadcrumb-item "><a href="#">Products</a></li>
              <li class="breadcrumb-item active">Damage</li>
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
            <h3 class="card-title">Add Damage Product </h3>
            <a href="{{ route('consumptions.index') }}" class="btn btn-outline-secondary float-right">VIEW LIST</a>
          </div>


          {!! Form::open(array('route' => 'consumptions.store','method'=>'POST')) !!}
            <div class="card-body">
              <div class="row">


                <div class="col-md-6">

                  <div class="form-group">
                    <label>Product</label>
                    <select class="form-control select2" name="name" required>
                      <option value="">Select Product</option>
                      <option value="0">Proximity Card</option>
                      <option value="1">Plastic Card</option>                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Employee</label>
                    <select class="form-control select2" name="employee_id" required>
                      <option value="">Select Employee ID</option>
                      @foreach($employees as $employee)
                      <option value="{{$employee->id}}">{{ $employee->employee_id}} - {{ $employee->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employeeDesig">Quantity</label>
                    <input class="form-control" name="quentity" type="number" value="1" >
                  </div>                 
                </div>
                <input type="hidden" name="consumption_type" value="1">
                <input type="hidden" name="author" value="{{ Auth::user()->id }}">
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


