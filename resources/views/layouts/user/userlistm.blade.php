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
          <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="fa fa-graduation-cap"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  href="{{ route('student.create') }}" class="nav-link">
                    <i class="far fa-solid fa-folder"></i>
                  <p>Student Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('student') }}" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <i class="far fa-solid fa-folder"></i>
                  <p>Student List</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- ===Book======== --}}
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="fa fa-solid fa-book"></i>
              <p>
                book
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('book/create') }}" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  {{-- <i class="fa fa-address-card"></i> --}}
                  <i class="far fa-solid fa-folder"></i>
                  <p>Add book</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a  href="{{ url('book') }}" class="nav-link">
                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                    {{-- <i class="fa fa-address-card"></i> --}}
                    <i class="far fa-solid fa-folder"></i>
                    <p>List Book</p>
                  </a>
                </li>
              </ul>
          </li>
          {{-- =======Borrow and returned========== --}}

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-retweet"></i>
              <p>
                Borrow and Return
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('membership') }}" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  {{-- <i class="fa fa-address-card"></i> --}}
                  <i class="far fa-solid fa-folder"></i>
                  <p>Member</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('return.index') }}" class="nav-link">
                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                    {{-- <i class="fa fa-address-card"></i> --}}
                    <i class="far fa-solid fa-folder"></i>
                    <p>Story Return</p>
                  </a>
                </li>
              </ul>
          </li>
        {{-- ==============User========= --}}
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-users" style="color: #e8eaee;"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
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
                  <a href="{{ route('user.index') }}" class="nav-link active">

                    <i class="far fa-solid fa-folder"></i>
                    <p>List User</p>
                  </a>
                </li>
              </ul>
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
    {{-- <section class="content" style="padding-top: 1rem">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Show all users.</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section> --}}
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
