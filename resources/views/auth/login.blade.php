
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar p {
            margin-bottom: 0;
            font-size: 21px;
            color: #ffffff;
        }


    </style>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">



</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="row w-100">
                <!-- Logo Section -->
                <div class="col-12 text-center">
                    <img class="rounded mx-auto d-block" style="height: 68px;" src="{{ asset('images/logo_school.jpg') }}" alt="School Logo">
                </div>
                <!-- Title Section -->
                <div class="col-12 text-center mt-2">
                    <p class="mb-0" style="color: #ffffff; font-size: 21px;">Library Management System</p>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-6">

              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row justify-content-center" style="width: 1200px">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">User Login</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info">Sign in</button>

                                    </div>
                                    @if ($errors->any())
                                 <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                     </div>
                                         @endif
                                    <!-- /.card-footer -->
                                </form>
                            </div>

                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>



     <script>
        function clearForm() {
            document.getElementById('loginForm').reset();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

{{--
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body>
</html>  --}}
