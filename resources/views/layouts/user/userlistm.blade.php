<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <link href="{{ asset('bootstrap/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <div class="Name-school">
        <h2>Library System Singapore Amicus International School</h2>
     </div>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="../../dist/img/logo_school.jpg"  class="brand-image img-circle elevation-3" style="margin-right:21px;opacity: .8, with: 22px, ">
        <span>
            <div class="info">
                <p>វិទ្យាល័យ អន្តរជាតិ អែស អេ អាយ (សឹង្ហបុរី)<br>
                Singapore Amicus Internaional School
                </p>
               </div>
        </span>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <!-- =======student====== -->
         <li class="nav-item">
            <a href="{{ url('student') }}" class="nav-link ">
                <i class="fa fa-graduation-cap"></i>
            <p>
                Dashboard

            </p>
            </a>

        </li>
      <li class="nav-item">
        <a href="{{ url('student') }}" class="nav-link">
            <i class="fa fa-graduation-cap"></i>
          <p>
            Student

          </p>
        </a>

      </li>
      {{-- ========= --}}


          <li class="nav-item ">
            <a href="{{ url('book') }}" class="nav-link ">
              <i class="fa fa-solid fa-book"></i>
              <p>
                book

              </p>
            </a>


          </li>

          


               <!-- resources/views/layouts/nav.blade.php -->
@php
$user = Auth::user(); // Get the currently authenticated user
@endphp

<li class="nav-item">
<a href="#" class="nav-link">
    <i class="fa-solid fa-users" style="color: #e8eaee;"></i>
    <p>
        User
        <i class="fas fa-angle-left right"></i>
    </p>
</a>
@if($user && $user->role !== 'user') <!-- Check if user is logged in and has a role other than 'user' -->
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.create') }}" class="nav-link">
                <i class="far fa-solid fa-folder"></i>
                <p>Create User</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
                <i class="far fa-solid fa-folder"></i>
                <p>List User</p>
            </a>
        </li>
    </ul>
@endif

</li>


    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    @yield('userlistly')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
