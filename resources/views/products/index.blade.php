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
              <li class="breadcrumb-item active">Product</li>
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
              <h3 class="card-title">Requisition History </h3>
              @can('product-create')
              <a href="{{ route('products.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>
              @endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Produts Name</th>
                  <th>Details</th>
                  <th>Quentity</th>
                  <th>Received By</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach ($products as $product)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                      @if($product->name == '0')
                        Proximity Card
                      @elseif($product->name == '1')
                        Plastic Card
                      @endif
                    </td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->quentity }}</td>
                    <td>
                      @foreach($users as $user)
                        @if($user->id == $product->author)
                          {{ $user->name }}
                        @endif
                      @endforeach
                    </td>
                    <td>

                      @can('product-edit')
                      <a href="{{ route('products.edit',$product->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                      @endcan
                   
                    
                      <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        @can('product-delete')
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



