<!DOCTYPE html>
<!-- YouTube or Website - CodingLab -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu </title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css') }}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>

 <nav class="sidebar">

    <div class="menu-bar">
        <div class="logo-school">
        <div class="logo-ais">
            <img class="rounded mx-auto d-block" style="height: 93px;width: 233px;" src="{{ asset('images/sais.png') }}" alt="Example Image">
        </div>
    </div>
     {{-- ================== --}}
        <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li>
            <a href="#" class="feat-btn"
                >Features
                <span class="fas fa-caret-down first"></span>
            </a>
            <ul class="feat-show">
                <li><a href="#"><i class="fas fa-clock"></i>Pages</a></li>
                <li><a href="#"><i class="fas fa-clock"></i>Elements</a></li>
            </ul>
            </li>

            <li>
            <a href="#" class="serv-btn"
                >Services
                <span class="fas fa-caret-down second"></span>
            </a>
            <ul class="serv-show">
                <li><a href="#"><i class="fas fa-clock"></i>App Design</a></li>
                <li><a href="#"><i class="fas fa-clock"></i>Web Design</a></li>
            </ul>
            </li>
            <li><a href="#">Portfoli</a></li>
            <li><a href="#">Overview</a></li>
            <li><a href="#">Shortcuts</a></li>
            <li><a href="#">Feedback</a></li>
        </ul>
    </div>

    </nav>

     {{-- ================== --}}
    <nav class="navbar">
      <div class="menu-side">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
      </div>


      <div class="main-title">
       <h2>Library Management System</h2>
      </div>

      <nav class="Logout">
        <button type="button" class="btn btn-danger">Logout</button>
    </nav>
        <div class="menu-navbar">
          <h6>Admin</h6>
         </div>
    </nav>

    <main class="main">
        @yield('content')


</body>
      <h1>Admin Dashboard Content</h1>
    </main>

    <script src="js/script2.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
  </body>
</html>
<script>
  $('nav .button').click(function(){
    $('nav .button span').toggleClass("rotate");
  });
    $('nav ul li .first').click(function(){
      $('nav ul li .first span').toggleClass("rotate");
    });
    $('nav ul li .second').click(function(){
      $('nav ul li .second span').toggleClass("rotate");
    });
    $('nav ul li .three').click(function(){
      $('nav ul li .three span').toggleClass("rotate");
    });

      $(".btn").click(function () {
        $(this).toggleClass("click");
        $(".sidebar").toggleClass("show");
      });
      $(".feat-btn").click(function () {
        $("nav ul .feat-show").toggleClass("show");
        $("nav ul .first").toggleClass("rotate");
      });
      $(".serv-btn").click(function () {
        $("nav ul .serv-show").toggleClass("show1");
        $("nav ul .second").toggleClass("rotate");
      });
      $(".book-btn").click(function () {
        $("nav ul .book-show").toggleClass("show");
        $("nav ul .three").toggleClass("rotate");
      });
      $("nav ul li").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
      });

</script>

