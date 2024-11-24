<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - {{config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="/admin/search" method="POST">
            @csrf
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="inv" placeholder="Search Invoice" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="{{asset('famsnet')}}/img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <form class="form-inline" action="/admin/search" method="POST">
        @csrf
        <div class="input-group">
          <input class="form-control form-control-sidebar" type="search" name="inv" placeholder="Search Invoice" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin" class="nav-link @if(request()->is('admin')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/orders" class="nav-link @if(request()->is('admin/orders')) active @endif">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Orders
                <span class="badge badge-info right">{{--bookingAmount()--}}</span>
              </p>
            </a>
          </li>
          <li class="nav-item @if(request()->is('admin/vouchers') or request()->is('admin/imports')) menu-open @endif">
            <a href="#" class="nav-link @if(request()->is('admin/vouchers') or request()->is('admin/imports')) active @endif">
              <i class="nav-icon fas fa-bookmark"></i>
              <p>
                Vouchers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/vouchers" class="nav-link @if(request()->is('admin/vouchers')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Vouchers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/imports" class="nav-link @if(request()->is('admin/imports')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/plans" class="nav-link @if(request()->is('admin/plans')) active @endif">
              <i class="nav-icon fas fa-rss"></i>
              <p>
                Plans
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/testimonials" class="nav-link @if(request()->is('admin/testimonials')) active @endif">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Testimoni
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/payments" class="nav-link @if(request()->is('admin/payments')) active @endif">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/settings" class="nav-link @if(request()->is('admin/settings')) active @endif">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#!" class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 - {{date('Y')}} <a href="/">FamsNet</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1"
  aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Peringatan</h5>
              <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Apakah anda yakin ingin menghapus data ini?
          </div>
          <form action="" method="post" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
      </div>
  </div>
</div>
<!-- Modal Logout-->
<div class="modal fade" id="logoutModal" tabindex="-1"
  aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
              <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Apakah anda yakin ingin keluar dari aplikasi?
          </div>
          <form action="/admin/logout" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Logout</button>
            </div>
          </form>
      </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('AdminLTE')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard2.js"></script>
<script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard.js"></script> --}}
@yield('js')
<script>
  $(document).ready(function () {
      $('.deleteConfirm').on('click', function(){
          $('#deleteForm').attr('action', $(this).data('url'));
          $('#deleteModal').modal('show');
      })
  });
</script>
</body>
</html>
