<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Small Apps Template v1.0">


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/images/favicon.png")}}" />

  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="{{asset("assets/plugins/bootstrap/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/themify-icons/themify-icons.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/slick/slick.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/slick/slick-theme.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/fancybox/jquery.fancybox.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/aos/aos.css")}}">

  <!-- CUSTOM CSS -->
  <link href="{{asset("assets/css/frontend/style.css")}}" rel="stylesheet">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
  <div class="container">
    <a class="navbar-brand" href="{{route("frontend.main")}}"><img src="{{asset("assets/img/logo for Share.png")}}" width="70px" alt="logo" > <span  class="m-2" style="font-weight: 550 ; font-size: 35px ;font-family: Grape Nuts"><b>Share&Care</b></span> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ">
          <a class="nav-link navhover" href="{{route("frontend.main")}}">Home
          </a>


        </li>

        <li class="nav-item @@about ">
          <a class="nav-link navhover" href="{{route("frontend.about")}}">About</a>
        </li>`
        <li class="nav-item dropdown @@pages">
          <a class="nav-link dropdown-toggle navhover" href="" data-toggle="dropdown">Programs
            <span><i class="ti-angle-down"></i></span>
          </a>
          <!-- Dropdown list -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item @@team " href="{{route("bazaar")}}">Market Place</a></li>
            <li><a class="dropdown-item @@blog" href="{{route("frontend.blog")}}">Blog</a></li>
       </ul>
        </li>
        <li class="nav-item @@pricing">
          <a class="nav-link navhover" href="{{route("pricing")}}">Digi_Interchange</a>
        </li>
        <li class="nav-item @@contact">
          <a class="nav-link navhover" href="{{route("frontend.contact")}}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@yield("content")

<!--============================
=            Footer            =
=============================-->
<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
          <div class="block">
            <a href="index.html"><img src="{{asset("assets/images/logo-alt.png")}}" alt="footer-logo"></a>
            <!-- Social Site Icons -->
            <ul class="social-icon list-inline">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/themefisher"><i class="ti-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://twitter.com/themefisher"><i class="ti-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/themefisher/"><i class="ti-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Product</h6>
            <!-- links -->
            <ul>
              <li><a href="team.html">Teams</a></li>
              <li><a href="{{route('frontend.blog')}}">Blogs</a></li>
              <li><a href="FAQ.html">FAQs</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Resources</h6>
            <!-- links -->
            <ul>
              <li><a href="sign-up.html">Singup</a></li>
              <li><a href="sign-in.html">Login</a></li>
              <li><a href="">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="career.html">Career</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Investor</a></li>
              <li><a href="privacy.html">Terms</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Company</h6>
            <!-- links -->
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="{{route("frontend.privacy")}}">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center bg-dark py-4">
    <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></small class="text-secondary">
  </div>
</footer>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>

  <!-- JAVASCRIPTS -->
  <script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>
  <script src="{{asset("assets/plugins/bootstrap/bootstrap.min.js")}}"></script>
  <script src="{{asset("assets/plugins/slick/slick.min.js")}}"></script>
  <script src="{{asset("assets/plugins/fancybox/jquery.fancybox.min.js")}}"></script>
  <script src="{{asset("assets/plugins/syotimer/jquery.syotimer.min.js")}}"></script>
  <script src="{{asset("assets/plugins/aos/aos.js")}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="{{asset("assets/plugins/google-map/gmap.js")}}"></script>

  <script src="{{asset("assets/js/script.js")}}"></script>
</body>

</html>
