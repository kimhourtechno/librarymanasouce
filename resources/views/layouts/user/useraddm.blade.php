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
                <a href="#" class="nav-link active">

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
          </li>


    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add New User</h3>
                        </div>
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select id="role" name="role" class="form-control" required>
                                            <option value="">Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info">Add User</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="place_of_birth" class="col-sm-2 col-form-label">Place of Birth</label>
                <div class="col-sm-10">
                    <input type="text" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" class="form-control" placeholder="Place of Birth" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select id="role" name="role" class="form-control" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-info">Add User</button>
            <button type="reset" class="btn btn-default">Cancel</button>
        </div>
    </form> --}}

    @yield('useraddtly')

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
