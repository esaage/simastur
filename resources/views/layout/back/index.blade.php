<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/layout/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/layout/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/layout/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/layout/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/layout/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


      @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>MT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMASTUR</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="nav-item">
            <a href="/auth/logout">
              <i class="fa fa-sign-out fa-lg"></i>
              Logout
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          {{-- <li class="dropdown user user-menu">
            <a href="/auth/logout" class="btn text-light" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs">{{ auth()->user()->nama }}</span>
            
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                  <a href="/auth/logout" class="btn btn-default btn-flat">Logout <i class="fa fa-sign-out"></i></a>
                  
              </li>
            </ul>
          </li> --}}
        </ul>
      </div>

    </nav>
  </header>
  
  {{-- sidebar --}}
  @include('layout.back.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> --}}

    <!-- Main content -->
    <section class="content">
      

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="https://esaage.com">SIMASTUR Pemerintah Kabupaten Ngawi</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/assets/layout/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/layout/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/layout/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/layout/js/demo.js"></script>

@yield('js')
</body>
</html>
