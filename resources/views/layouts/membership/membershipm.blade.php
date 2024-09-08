<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library System</title>

  {{-- <! --------ICON------> --}}
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>



<!-- Bootstrap JS -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <link href="{{ asset('bootstrap/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="path/to/bootstrap.css">
  <link rel="stylesheet" href="path/to/font-awesome.css">


  <!-- Google Font: Source Sans Pro -->
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
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <span class="d-none d-md-inline">{{ @Auth::user()->name }}</span>
            </a>

         </li>
         
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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <li class="nav-item">
            <a href="{{ route('dashboard.view')}}" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
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

          <li class="nav-item ">
            <a href="{{ url('book') }}" class="nav-link ">
              <i class="fa fa-solid fa-book"></i>
              <p>
                book

              </p>
            </a>


          </li>

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
            @can('isAdmin')
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="far fa-solid fa-folder"></i>
                        <p>List User</p>
                    </a>
                </li>
            </ul>
            @endcan
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link">

                    <i class="far fa-solid fa-folder"></i>
                    <p>List User</p>
                  </a>
                </li>
              </ul> --}}
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
    </div>

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
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
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
