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
                        <li class="breadcrumb-item active">Department</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @can('department-create')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Department</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('department.store')}}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger" type="submit">ADD</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input name="name" type="text" class="form-control" placeholder="Enter department name">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Door List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=0)
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $department->name }}</td>

                                    <td>
                                        @can('department-edit')
                                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                              <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal{{ $department->id }}"><i class="fas fa-edit"></i></button>
                                            </span>
                                        @endcan

                                        <form action="{{ route('department.destroy',$department->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('department-delete')
                                                <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            @endcan
                                        </form>


                                        <!-- Modal -->
                                        <div class="modal fade" id="cardModal{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::model($department, ['method' => 'PATCH','route' => ['department.update', $department->id]]) !!}

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Department Name <span style="font-weight: normal; font-size: 10pt; color: red;"> (required)</span></label>
                                                                <input name="name" type="text" class="form-control" value="{{ $department->name }}" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
