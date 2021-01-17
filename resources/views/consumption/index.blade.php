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





          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="#">Kyamch</a></li>
              <li class="breadcrumb-item "><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Consumption</li>
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
              <h3 class="card-title">Consumption List </h3>
              @can('consumption-create')
              <a href="{{ route('consumptions.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Produts Name</th>
                  <th>Employee ID</th>
                  <th>Quentity</th>
                  <th>Consumed By</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach ($consumptions as $consumption)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ ($consumption->name == '0')? 'Proximity Card' : 'Plastic Card'}}  </td>
                    <td>
                      @foreach($employees as $employee)
                        @if($employee->id == $consumption->employee_id)
                          {{ $employee->employee_id }}
                        @endif
                      @endforeach
                    </td>
                    <td>{{ $consumption->quentity }}</td>
                    <td>
                      @foreach($users as $user)
                        @if($user->id == $consumption->author)
                          {{ $user->name }}
                        @endif
                      @endforeach
                    </td>
                    <td>

                      @can('consumption-edit')
                      <a href="{{ route('consumptions.edit',$consumption->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                      @endcan
                   
                    
                      <form action="{{ route('consumptions.destroy',$consumption->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        @can('consumption-delete')
                        <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        @endcan
                      </form>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
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



