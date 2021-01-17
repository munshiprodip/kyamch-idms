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
              <li class="breadcrumb-item active">Roles</li>
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
              <h3 class="card-title">Role List of ID Card Management System </h3>@can('role-create')
              @can('role-create')
              <a href="{{ route('roles.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>@endcan
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="70px">#</th>
                  <th>Role Name</th>
                  <th  width="150px">Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($roles as $key => $role)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                    @can('role-edit')
                      <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                    @endcan
                    @can('role-delete')

                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                    @endcan
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              {!! $roles->render() !!}
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



