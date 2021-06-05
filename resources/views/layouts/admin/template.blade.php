<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="css/app.css">
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        
        <div class="input-group-append">
          
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/project.png" alt="Sikombasa Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIKOMBASA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url ('/bank') }}" class="nav-link">
                  <i class="fas fa-university nav-icon"></i>
                  <p>Daftar Bank</p>
                </a>
              </li>

              <li class="nav-item menu-open has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Daftar Harga</p>
                  <i class="right fa fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/daftar-harga-teks" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Teks</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-harga-dokumen" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dokumen</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-harga-subtitle" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Subtitle</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-harga-dubbing" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dubbing</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-harga-transkrip" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Transkrip</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/daftar-harga-interpreter" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Interpreter</p>
                    </a>
                  </li>
               </ul>
              </li>

              <li class="nav-item">
                <a href="/daftar-admin" class="nav-link">
                  <i class="fas fa-user-secret nav-icon"></i>
                  <p>Daftar Admin</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/daftar-klien" class="nav-link">
                  <i class="fas fa-male nav-icon"></i>
                  <p>Daftar Klien</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/daftar-translator" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Daftar Translator</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/daftar-transaksi" class="nav-link">
                  <i class="nav-icon fas fa-wallet"></i>
                  <p>
                    Daftar Transaksi
                  </p>
                <a>
              </li>

              <li class="nav-item">
                <a href="/distribusi-fee" class="nav-link">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>
                    Distribusi Fee
                  </p>
                <a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="/profile-admin" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                Profile
              </p>
            <a>
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
    @yield('container')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<script src="js/app.js"></script>


<script>
  @if(\Session::has('success'))
      toastr.success('{{Session::get('success')}}', 'Berhasil')
  @endif
</script>

<script>
 @if (\Session::has('failed'))
      toastr.error('{{Session::get('failed')}}', 'Gagal')
@endif
</script>

@stack('addon-script')

</body>
</html>