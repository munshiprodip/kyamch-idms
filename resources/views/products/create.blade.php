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
            <h3 class="card-title">Receive New Product</h3>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary float-right">VIEW LIST</a>
          </div>


          {!! Form::open(array('route' => 'products.store','method'=>'POST')) !!}
            <div class="card-body">
              <div class="row">


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Product</label>
                    {!! Form::select('name', array('0' => 'Proximity Card' , '1' => 'Plastic Card') ,'null', ['class' => 'form-control select2']) !!}
                  </div>
                  <div class="form-group">
                    <label for="employeeName">Quantity</label>
                    {!! Form::number('quentity', null, array('placeholder' => '000','class' => 'form-control')) !!}
                  </div>
                </div>




                <div class="col-md-6">
                  <div class="form-group">
                    <label for="employeeName">Detail</label>
                    {!! Form::textarea('detail', null, array('rows' => '3', 'placeholder' => 'Description','class' => 'form-control')) !!}
                  </div>
                </div>

              </div>
            </div>
                <!-- /.card-body -->
            <div class="card-footer">
            <input type="hidden" name="author" value="{{ Auth::user()->id }}">
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


