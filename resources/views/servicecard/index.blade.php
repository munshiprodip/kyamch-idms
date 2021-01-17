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
            <li class="breadcrumb-item active">Service Card</li>
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
            <h3 class="card-title">Services Card List </h3>
            @can('servicecard-create')
              <a href="{{ route('servicecard.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>
            @endcan
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>ID Number</th>
                <th>Department</th>
                <th>Place</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
              </thead>
              <tbody>
              @php($i=0)
              @foreach ($servicecards as $servicecard)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $servicecard->service_id }}</td>
                  <td>{{ $servicecard->dept }}</td>
                  <td>{{ $servicecard->place }}</td>
                  <td style="text-align: center;"><label class="badge badge-dark">{{ $servicecard->status }}</label></td>
                  <td>

                    @can('servicecard-edit')
                      <span data-toggle="tooltip" data-placement="top" title="Issued Card">
                        <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal2{{ $servicecard->id }}" {{($servicecard->status=='Issue card' ||$servicecard->status=='Delivered' )? '' : 'disabled'}} ><i class="fas fa-id-card"></i></button>
                      </span>
                    @endcan

                    @can('servicecard-edit')
                      <span data-toggle="tooltip" data-placement="top" title="Change Status">
                        <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal3{{ $servicecard->id }}" {{($servicecard->status=='Issue card' )? 'disabled' : ''}}><i class="fas fa-info-circle"></i></button>
                      </span>
                    @endcan

                    @can('servicecard-edit')
                      <span data-toggle="tooltip" data-placement="top" title="Print">
                        <button class="btn btn-outline-secondary btn-xs" data-toggle="modal" data-target="#cardModal{{ $servicecard->id }}" {{($servicecard->status=='Not Printed')? '' : 'disabled'}}><i class="fas fa-print"></i></button>
                      </span>
                    @endcan

                    @can('servicecard-edit')
                      <a href="{{ route('servicecard.edit',$servicecard->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                    @endcan


                    <form action="{{ route('servicecard.destroy',$servicecard->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      @can('servicecard-delete')
                        <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      @endcan
                    </form>

                    <!-- Modal  Issue card -->
                    <div class="modal fade" id="cardModal2{{ $servicecard->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Access Card List</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered">
                              <tbody>
                              @php ($i = 0)
                              @foreach($access_card_services as $v)
                                @if($v->service_id == $servicecard->id)
                                  <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $v->card_number }}</td>
                                    <td><span class="badge bg-danger">{{ $v->status }}</span></td>
                                  </tr>
                                @endif
                              @endforeach
                              </tbody>
                            </table>

                            <button data-toggle="collapse" href="#collapse{{ $servicecard->id }}" type="button" class="btn btn-outline-secondary">Add New</button>

                            <div id="collapse{{ $servicecard->id }}" class="panel-collapse collapse">
                              <form role="form" action="{{ route('access_card_service') }}" method="GET">
                                @csrf

                                @if($servicecard->status != 'Issue card')
                                  <div class="form-group">
                                    <label for="">Previous Card Status <span style="font-weight: normal; font-size: 10pt; color: red;"> (required)</span></label>
                                    <table class="table">
                                      <tbody>
                                      <tr>
                                        <td><input type="radio" name="prv_status" value="Lost" required="required"> Lost</td>
                                        <td><input type="radio" name="prv_status" value="Damage" required="required"> Damage</td>
                                        <td><input type="radio" name="prv_status" value="Others" required="required"> Others</td>
                                      </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                                <div class="form-group">
                                  <label for="cardNumber">New Card Number <span style="font-weight: normal; font-size: 10pt; color: red;"> (required)</span></label>
                                  <input name="card_number" type="text" class="form-control" placeholder="Enter New Card Number" required="required">
                                  <input type="hidden" name="service_id" value="{{ $servicecard->id }}">
                                </div>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-primary">Issue</button>
                                <!-- /.card-body -->
                              </form>
                            </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Change Status-->
                    <div class="modal fade" id="cardModal3{{ $servicecard->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Card Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @php($class = '')
                          @if($servicecard->status == 'Issue card')
                            @php($status = '')
                            @php($label  = '')
                            @php($class = 'invisible')
                          @elseif($servicecard->status == 'Not Printed')
                            @php($status = 'Printed')
                            @php($label  = 'Printed')
                          @elseif($servicecard->status == 'Printed')
                            @php($status = 'Delivered')
                            @php($label  = 'Delivered')

                          @elseif($servicecard->status == 'Delivered')
                            @php($status = 'Returned')
                            @php($label  = 'Returned')
                          @elseif($servicecard->status == 'Returned')
                            @php($status = '')
                            @php($label  = '')
                            @php($class = 'invisible')
                          @endif
                          <form role="form" action="{{ route('updatestatus_service',$servicecard->id) }}" method="GET" >
                            <div class="modal-body">
                              <div class="custom-control custom-checkbox">
                                <input name="status" class="custom-control-input " type="checkbox" id="customCheckbox{{$servicecard->id}}" value="{{ $status }}">
                                <label for="customCheckbox{{$servicecard->id}}" class="custom-control-label"> {{ $label }}</label>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="card_type"  value="Access">
                              <button type="submit" class="btn btn-primary {{ $class }} ">Submit</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>




                  </td>


                  <!-- Modal ID Card Print -->
                  <div class="modal fade" id="cardModal{{ $servicecard->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Print</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body" >
                          <div id="printDiv{{ $servicecard->id }}" style="margin: 0 auto; width: 240px; height: 380px;" >

                            <div>
                              <img style="width: 240px;height: 380px;" src= "{{ URL::asset('images/kyamch/background/id_kyamch_service.png') }}">
                            </div>
                            <div style="margin-top: -268px; margin-left: 30px; width: 230px; height: 60px; text-align: center; font-size: 18px; text-transform: uppercase; transform: rotate(90deg);">
                              <p style="margin: 0; font-weight: bold;">{{ $servicecard->dept }}</p>
                              <p style="font-size: 14px; font-weight:bold;">( {{ $servicecard->place }} )</p>
                            </div>

                            <div style="margin: -57px 0px 0px -53px; width: 205px; font-size: 15px; font-weight:bold; transform: rotate(90deg);">
                              <p>ID NO : {{ $servicecard->service_id }}</p>
                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button onclick="printDiv('printDiv{{ $servicecard->id }}')"  class="btn btn-primary">Print</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

                  <script>
                    function printDiv(printDiv{{ $servicecard->id }}){
                      var printContent = document.getElementById(printDiv{{ $servicecard->id }}).innerHTML;
                      var originalContent = document.body.innerHTML;
                      document.body.innerHTML = printContent;
                      window.print();
                      document.body.innerHTML = originalContent
                      location.reload();;
                    }
                  </script>

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



