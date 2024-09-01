<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library System</title>

  {{-- <! --------ICON------> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <link href="{{ asset('bootstrap/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
      <!-- Sidebar user (optional) -->

      <!-- SidebarSearch Form -->


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
          {{-- ===Book======== --}}
          <li class="nav-item ">
            <a href="{{ url('book') }}" class="nav-link ">
              <i class="fa fa-solid fa-book"></i>
              <p>
                book

              </p>
            </a>


          </li>
          {{-- ==borrow and return=== --}}
          <li class="nav-item menu-open">
            <a href="{{ url('membership') }}" class="nav-link active">
                <i class="fa-solid fa-retweet"></i>
              <p>
                Borrower

              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{ route('return.index') }}" class="nav-link ">
                <i class="fa-solid fa-retweet"></i>
              <p>
                Story Returned

              </p>
            </a>

          </li>

        {{-- ==============User========= --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users" style="color: #e8eaee;"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">

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
    @yield('membershiply')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.2.1
    </div>
    <strong>Copyright &copy; 2014-2021</a></strong> All rights reserved.
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
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>

<script src="../../dist/js/adminlte.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
<script>
    $(document).ready(function() {
      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Add Borrow is a success.');
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('This is an info message.');
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('This is an error message.');
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('This is a warning message.');
      });
    });
  </script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>
</html>
