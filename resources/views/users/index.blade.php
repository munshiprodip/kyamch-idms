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
              <li class="breadcrumb-item active">User</li>
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
              <h3 class="card-title">User List of ID Card Management System </h3>
              @can('user-create')
              <a href="{{ route('users.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $user)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                          @if($v=='Super Admin')
                            <label class="badge badge-dark">{{ $v }}</label>
                          @elseif($v=='Admin')
                            <label class="badge badge-primary">{{ $v }}</label>
                          @else
                            <label class="badge badge-info">{{ $v }}</label>
                          @endif
                        @endforeach
                      @endif
                    </td>
                    <td>
                    @can('user-edit')
                      <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                    @endcan
                    @can('user-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                    @endcan
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              {!! $data->render() !!}
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



