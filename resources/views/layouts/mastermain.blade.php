<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    {{-- <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('bootstrap/css/main1.css') }}" rel="stylesheet">
    {{-- ================ --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>
<body>
    <nav class="sidebar">
        <div class="logoback">
            <img class="rounded mx-auto d-block" style="height: 93px;width: 233px;" src="{{ asset('images/sais.png') }}" alt="Example Image">


        </div>
        <div class="menu-content">
          <ul class="menu-items">

            <li class="item">
              <div class="submenu-item">
                <span>Student</span>
                <i class="fa-solid fa-chevron-right"></i>
              </div>
              <ul class="menu-items submenu">
                <div class="menu-title">
                  <i class="fa-solid fa-chevron-left"></i>
                  Back Student
                </div>
                <li class="item">
                  <a href="{{ url('studentregister') }}">Rigister</a>
                </li>
                <li class="item">
                  <a href="{{ url('student') }}">List</a>
                </li>

              </ul>
            </li>
            <li class="item">
              <div class="submenu-item">
                <span>Borrowed</span>
                <i class="fa-solid fa-chevron-right"></i>
              </div>
              <ul class="menu-items submenu">
                <div class="menu-title">
                  <i class="fa-solid fa-chevron-left"></i>
                  Your submenu
                </div>
            

                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
                <li class="item">
                  <a href="#">Second sublink</a>
                </li>
              </ul>
            </li>
            <li class="item">
              <a href="#">Your second link</a>
            </li>
            <li class="item">
              <a href="#">Your third link</a>
            </li>
          </ul>
        </div>
    </nav>
     <nav class="navbar">
        <div>
            <i class="fa-solid fa-bars" id="sidebar-close"></i>
        </div>

      <div class="main-title">
        <h6 style="font-size: 25px">Library Management Syste</h6>
       </div>
        <nav class="Logout">
        <button type="button" class="btn btn-danger">Logout</button>
        </nav>
        <div class="menu-navbar" >
            {{-- <a style="font-size: 22px" class="nav-link" href="{{ url('logout') }}">Logout</a> --}}
          <h6><a class="nav-link" href="{{ url('logout') }}">Logout</a></h6>
         </div>

      </nav>



      <main class="main" >
       <div>

        <div class="container-fluid px-4">
          <div class="row g-3 my-2">
              <div class="col-md-3">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                      <div>
                          <h3 class="fs-2">720</h3>
                          <p class="fs-5">Products</p>
                      </div>
                      <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                      <div>
                          <h3 class="fs-2">4920</h3>
                          <p class="fs-5">Sales</p>
                      </div>
                      <i
                          class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                      <div>
                          <h3 class="fs-2">3899</h3>
                          <p class="fs-5">Delivery</p>
                      </div>
                      <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                      <div>
                          <h3 class="fs-2">%25</h3>
                          <p class="fs-5">Increase</p>
                      </div>
                      <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                  </div>
              </div>
          </div>
            {{--================================ Obtion =================--}}

          <div class="row my-5">

                  @yield('content')

              </div>
          </div>

      </div>
  </div>
</div>
       </div>

      </main>



    <script src="{{ asset('js/script1.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>

</body>

</html>
