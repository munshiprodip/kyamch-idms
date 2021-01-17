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
            <li class="breadcrumb-item active">Access card</li>
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
            <h3 class="card-title">Employee List of Access Card </h3>
            @can('employee-create')
              <a href="{{ route('employee.create') }}" class="btn btn-outline-secondary float-right">ADD NEW</a>
            @endcan
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Blood Group</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
              </thead>
              <tbody>

              @foreach ($employee as $employe)
                <tr>
                  <td>
                    <img width="50px" src= "{{ URL::asset('images/kyamch/employee/'.$employe->image) }}" class="img-circle elevation-2" >
                  </td>
                  <td>{{ $employe->employee_id }}</td>
                  <td>{{ $employe->name }}</td>
                  <td>{{ $employe->dept }}</td>
                  <td>{{ $employe->designation }}</td>
                  <td>{{ $employe->blood }}</td>
                  <td>{{ $employe->mobile }}</td>
                  <td style="text-align: center;"><label class="badge badge-dark">{{ $employe->status }}</label></td>

                  <td>
                    @can('employee-edit')
                      <span data-toggle="tooltip" data-placement="top" title="Issued Card">
                      <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal{{ $employe->id }}"  {{($employe->status=='Issue card' ||$employe->status=='Delivered' )? '' : 'disabled'}} ><i class="fas fa-id-card"></i></button>
                    </span>
                    @endcan

                    @can('accesslist-create')
                      <span data-toggle="tooltip" data-placement="top" title="Gate Pass">
                      <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal3{{ $employe->id }}" {{($employe->status=='Issue card' )? 'disabled' : ''}}><i class="fas fa-key"></i></button>
                    </span>
                    @endcan

                      @can('employee-edit')
                        <span data-toggle="tooltip" data-placement="top" title="Print">
                    <button class="btn btn-outline-secondary btn-xs" data-toggle="modal" data-target="#cardModal4{{ $employe->id }}" {{($employe->status=='Not Printed')? '' : 'disabled'}} ><i class="fas fa-print"></i></button>
                    </span>
                      @endcan

                    @can('employee-edit')
                      <span data-toggle="tooltip" data-placement="top" title="Change Status">
                    <button class="btn btn-outline-secondary btn-xs"  data-toggle="modal" data-target="#cardModal2{{ $employe->id }}" {{($employe->status=='Issue card' )? 'disabled' : ''}}><i class="fas fa-info-circle"></i></button>
                    </span>
                    @endcan

                    @can('employee-edit')
                      <a href="{{ route('employee.edit',$employe->id) }}" class="btn btn-outline-success btn-xs"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </a>
                    @endcan

                    @can('employee-delete')
                      {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employe->id],'style'=>'display:inline']) !!}
                      <button type="submit" onclick="return confirm()" class="btn btn-outline-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    {!! Form::close() !!}
                  @endcan






                  <!-- Modal  One -->
                    <div class="modal fade" id="cardModal{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              @foreach($access_card as $v)
                                @if($v->employee_id == $employe->id)
                                  <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $v->card_number }}</td>
                                    <td><span class="badge bg-danger">{{ $v->status }}</span></td>
                                  </tr>
                                @endif
                              @endforeach
                              </tbody>
                            </table>

                            <button data-toggle="collapse" href="#collapse{{ $employe->id }}" type="button" class="btn btn-outline-secondary">Add New</button>

                            <div id="collapse{{ $employe->id }}" class="panel-collapse collapse">
                              <form role="form" action="{{ route('access_card') }}" method="GET">
                                @csrf

                                @if($employe->status != 'Issue card')
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
                                  <input type="hidden" name="employee_id" value="{{ $employe->id }}">
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




                    <!-- Modal 2-->
                    <div class="modal fade" id="cardModal2{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @php($class = '')
                          @if($employe->status == 'Issue card')
                            @php($status = '')
                            @php($label  = '')
                            @php($class = 'invisible')
                          @elseif($employe->status == 'Not Printed')
                            @php($status = 'Printed')
                            @php($label  = 'Printed')
                          @elseif($employe->status == 'Printed')
                            @php($status = 'Delivered')
                            @php($label  = 'Delivered')

                          @elseif($employe->status == 'Delivered')
                            @php($status = 'Returned')
                            @php($label  = 'Returned')
                          @elseif($employe->status == 'Returned')
                            @php($status = '')
                            @php($label  = '')
                            @php($class = 'invisible')
                          @endif
                          <form role="form" action="{{ route('updatestatus',$employe->id) }}" method="GET" >
                            <div class="modal-body">
                              <div class="custom-control custom-checkbox">
                                <input name="status" class="custom-control-input " type="checkbox" id="customCheckbox{{$employe->id}}" value="{{ $status }}">
                                <label for="customCheckbox{{$employe->id}}" class="custom-control-label"> {{ $label }}</label>
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



                    <!-- Modal 3 -->
                    <div class="modal fade" id="cardModal3{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Gate Pass</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form role="form" action="{{ route('accesslist.store') }}" method="POST" >
                            @csrf
                            <div class="modal-body">
                              <div class="row" style="width: 80%;    margin: 0 auto;">
                                @php($s=0)
                                @foreach($doors as $door)
                                  @php($s++)
                                  <div class="form control custom-checkbox col-6">
                                    <input name="door_id[]" class="custom-control-input" id="customCheckbo{{ $s }}" type="checkbox"  value="{{ $door->id }}" @foreach($accesslists as $val)
                                    @if($val->employee_id == $employe->id && $val->door_id == $door->id)
                                    checked
                                            @endif
                                            @endforeach >
                                    <label class="custom-control-label" for="customCheckbo{{ $s }}" > {{ $door->name }} </label>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="employee_id"  value="{{ $employe->id }}">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>

                    <!-- Modal 4 -->
                    <div class="modal fade" id="cardModal4{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Print</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <div id="printDiv{{ $employe->id }}" style="margin: 0 auto; width: 240px; height: 380px;" >

                              <div>
                                <img style="width: 240px;height: 380px;" src= "{{ URL::asset('images/kyamch/background/id_kyamch.jpg') }}">
                              </div>

                              <div style="margin-top: -380px;">
                                <div class="box" style=" display: flex; justify-content: center;height: 135px; padding-top: 100px; width: 188px; text-align: center; margin-left: 26px; text-transform: uppercase;  ">
                                  <p class="fit" style=" ">{{ $employe->name }}</p>
                                </div>

                                <div class="box" style="width: 188px; margin-left: 26px; padding-top: 5px;color: white; height: 27px; font-size: 11pt; text-align: center;text-transform: uppercase; font-weight: bold;font-family: calibri;">
                                  <p style="">{{ $employe->dept }}</p>
                                </div>

                                <div class="box3" style="margin-left: 26px; padding-top: 6px; font-size:15px;text-transform: uppercase;color: white;width: 188px; height: 27px; text-align: center; margin-bottom: 7px; font-weight: bold; ">
                                  <p style="">ID NO : {{ $employe->employee_id }}</p>
                                </div>

                                <div style="margin: -5px 0px 0px 62px;">
                                  <img style="width: 152px;height: 189px;" src= "{{ URL::asset('images/kyamch/employee/'.$employe->image) }}">
                                </div>
                                <div style="    margin: -110px 0px 0px -35px;">
                                  <img style=" width: 158px;height: 31px;-webkit-transform: rotate(180deg);-moz-transform: rotate(180deg);-ms-transform: rotate(180deg);-o-transform: rotate(180deg); transform: rotate(180deg);-webkit-transform: rotate(180deg);-moz-transform: rotate(180deg);-o-transform: rotate(180deg);transform: rotate(90deg);" src="data:image/png;base64,{{DNS1D::getBarcodePNG($employe->employee_id, 'C93')}}" alt="barcode">
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button onclick="printDiv('printDiv{{ $employe->id }}')"  class="btn btn-primary">Print</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>

                    <script>
                      function printDiv(printDiv{{ $employe->id }}){
                        var printContent = document.getElementById(printDiv{{ $employe->id }}).innerHTML;
                        var originalContent = document.body.innerHTML;
                        document.body.innerHTML = printContent;
                        window.print();
                        document.body.innerHTML = originalContent
                        location.reload();;
                      }
                    </script>



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


@section('script')
  <script type="text/javascript">
    const getFontSize = (textLength) => {
      const baseSize = 36
      if (textLength >= baseSize) {
        textLength = baseSize - .5
      }
      const fontSize = baseSize - textLength
      return `${fontSize}px`
    }

    const boxes = document.querySelectorAll('.box p')

    boxes.forEach(box => {
      box.style.fontSize = getFontSize(box.textContent.length)
    })

  </script>





@endsection

