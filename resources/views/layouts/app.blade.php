<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>KYAMCH | ID Card Management System</title>




  <!-- Font Awesome Icons -->
  <link rel="stylesheet"  href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
 
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


@yield('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#support" data-toggle="modal" class="nav-link">Support</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ URL::asset('images/config/kyamch.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KYAMCH IT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('images/config/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">ADMIN AREA</li>

          <li class="nav-item has-treeview {{ request()->is('users*')||request()->is('roles*') ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ request()->is('users*')||request()->is('roles*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link {{ request()->is('users/create') ? 'active' : '' }}">
                  <i class="fas fa-user-plus nav-icon text-warning"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users') || request()->is('users/*/edit') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon text-success"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                  <i class="far fa-registered nav-icon text-info"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ request()->is('blood*')||request()->is('department*')||request()->is('door*') ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ request()->is('blood*')||request()->is('department*')||request()->is('door*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Config
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('department.index') }}" class="nav-link {{ request()->is('department*') ? 'active' : '' }}">
                  <i class="fab fa-dyalog nav-icon text-primary"></i>
                  <p>Department Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blood.index') }}" class="nav-link {{ request()->is('blood*') ? 'active' : '' }}">
                  <i class="fas fa-tint nav-icon text-danger"></i>
                  <p>Blood Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('door.index') }}" class="nav-link {{ request()->is('door*') ? 'active' : '' }}">
                  <i class="fas fa-door-open nav-icon text-warning"></i>
                  <p>Door Settings</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">ID CARD MANAGEMENT</li>


          <li class="nav-item has-treeview {{ request()->is('kyamch*')||request()->is('employee*') || request()->is('servicecard') ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ request()->is('kyamch*')||request()->is('employee*') ||request()->is('servicecard*') ? 'active' : '' }}">
              <i class="nav-icon far fa-hospital"></i>
              <p>
                KYAMCH
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.index') }}" class="nav-link {{ request()->is('employee') || request()->is('employee/*/edit') ? 'active' : '' }}">
                  <i class="fas fa-id-card nav-icon text-danger"></i>
                  <p>Access Card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('nonaccess') }}" class="nav-link {{ request()->is('kyamch/employee/nonaccess') || request()->is('kyamch/employee/nonaccess/edit/*') ? 'active' : '' }}">
                  <i class="far fa-id-card nav-icon text-warning"></i>
                  <p>Non Access Card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('servicecard.index') }}" class="nav-link {{ request()->is('servicecard') ? 'active' : '' }}">
                  <i class="far fa-credit-card nav-icon text-info"></i>
                  <p>Service Card</p>
                </a>
              </li>
            </ul>
          </li>








          <li class="nav-header">INVENTORY MANAGEMENT</li>


          <li class="nav-item has-treeview {{ request()->is('products*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-luggage-cart"></i>
              <p>
                Requisition
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products') || request()->is('products/*/edit') ? 'active' : '' }}">
                  <i class="fas fa-cart-arrow-down nav-icon text-danger"></i>
                  <p>Requisition List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link {{ request()->is('products/create') ? 'active' : '' }}">
                  <i class="fas fa-cart-plus nav-icon text-info"></i>
                  <p>Receive Item</p>
                </a>
              </li>
            </ul>
          </li>





          <li class="nav-item has-treeview {{ request()->is('consumptions*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('consumptions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Consumption
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('consumptions.index') }}" class="nav-link {{ request()->is('consumptions') || request()->is('consumptions/*/edit') ? 'active' : '' }} ">
                  <i class="fas fa-list nav-icon text-danger"></i>
                  <p>Consumption List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('consumptions.create') }}" class="nav-link {{ request()->is('consumptions/create') ? 'active' : '' }}">
                  <i class="far fa-plus-square nav-icon text-warning"></i>
                  <p>New Consumption</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-header">REPORTS</li>

            <li class="nav-item">
                <a href="{{ route('inventory_report') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Inventory</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('gatepass_report') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>Gate Pass</p>
                </a>
            </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    @yield('content')




    <!-- Modal Suport-->
      <div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" >
            <div class="modal-header">
              <p style="margin: 0 auto;font-size: 29px;">Looking for Help?</p>
            </div>

              <div class="modal-body" style="text-align: center;">

                <p style="font-size: 20px; display: block; background-color: blue; padding: 8px 0px 8px 0px; color: white; border-radius: 25px;margin: 0px 30px 0 30px;">Feel free to contact us</p>
                <div style="margin-top: 20px;">
                  <img style="width: 220px;" src="{{ URL::asset('images/kyamch/logo/it_logo.png') }}">
                  <p style="font-family: Maiandra GD; color: red; margin: 0; font-size: 17px;">Khwaja Yunus Ali Medical College &amp; Hospital</p>
                  <p style="font-size: 15px;margin: 0;">Enayetpur, Sirajganj, Bangladesh</p>
                  <p style="font-size: 15px;margin: 0;">Mobile: +880 1716 173 279</p>
                  <p style="font-size: 15px;margin: 0;"> +880 1736 834 294</p>
                  <p style="font-size: 15px;margin: 0;">E-mail: support@kyamch.org</p>
                  <p style="font-size: 15px;margin: 0;">web: www.kyamch.org</p>
                </div>

              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2019-2022 <a href="http://kyamch.org">KYAMCH.ORG</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ URL::asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ URL::asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ URL::asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ URL::asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ URL::asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ URL::asset('adminlte/dist/js/demo.js') }}"></script>



@yield('script')

<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      'dom': 'Bfrtip'
    });

    //Initialize Select2 Elements
    $('.select2').select2()
  });

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


  function swalDefaultSuccess(type, title) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
        type: type,
        title: title
      })
  }

  function swalDefaultError(type, title) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
        type: type,
        title: title
      })
  }
</script>

</body>
</html>