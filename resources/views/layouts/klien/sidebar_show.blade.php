
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Welcome Klien</title>

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
                
      <form action="" method="POST" class="d-inline">
      <a href="{{ url ('/list-keranjang') }}" class="btn btn-success" class="text-right" style="float: right;"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>
    </a>
      </form>
      &nbsp;
      <form action="" method="POST" class="d-inline">
          <a href="{{ url ('/') }}" class="btn btn-primary" class="text-right" style="float: right;"><i class="fa fa-comments" aria-hidden="true" ></i></a>
      </form>
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
          <i class="fas fa-globe-asia fa-2x"></i>
          <span class="brand-text font-weight-light">SIKOMBASA</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="/klien" class="nav-link">
            <i class="fas fa-user-clock fa-2x"></i>
                {{ Auth::user()->name }}
            </a>
            </div>
        </div>

       <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{ url ('/klien') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt "></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

                <li class="nav-item has-treeview">
                <a href="{{ url ('profile-klien') }}" class="nav-link">
                <i class="nav-icon fas fa-user "></i>
                <p>
                    Profile
                </p>
                </a>
            </li>

            <li class="nav-item menu-open has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>
                    Order
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url ('/menu-order') }}" class="nav-link">
                    <i class="nav-icon fas fa-language"></i>
                        <p>Menu</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url ('/menu-pembayaran') }}" class="nav-link">
                        <i class="nav-icon fab fa-cc-visa"></i>
                        <p>Pembayaran</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url ('/status-order') }}" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Status Order</p>
                    </a>
                    </li>
                    </li>
                        <li class="nav-item">
                            <a href="{{ url ('/review-order') }}" class="nav-link">
                            <i class="nav-icon fas fa-star"></i>
                            <p>Review</p>
                        </a>
                        </li>
                </ul>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">              
                <i class="nav-icon fas fa-power-off red"></i>
                <p>Logout</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
@stack('scripts')
@include('sweetalert::alert')
</body>
</html>
