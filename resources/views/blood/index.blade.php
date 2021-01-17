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
                        <li class="breadcrumb-item active">Blood</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @can('blood-create')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Blood Group</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('blood.store')}}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger" type="submit">ADD</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input name="name" type="text" class="form-control" placeholder="Enter bloog group">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blood Group List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Blood Group</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=0)
                            @foreach ($bloods as $blood)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $blood->name }}</td>

                                    <td>

                                        @can('blood-edit')
                                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                              <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal{{ $blood->id }}"><i class="fas fa-edit"></i></button>
                                            </span>
                                        @endcan


                                        <form action="{{ route('blood.destroy',$blood->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('blood-delete')
                                                <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            @endcan
                                        </form>

                                            <!-- Modal -->
                                        <div class="modal fade" id="cardModal{{ $blood->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Blood</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        {!! Form::model($blood, ['method' => 'PATCH','route' => ['blood.update', $blood->id]]) !!}

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Blood Group <span style="font-weight: normal; font-size: 10pt; color: red;"> (required)</span></label>
                                                                <input name="name" type="text" class="form-control" value="{{ $blood->name }}" required="required">
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




