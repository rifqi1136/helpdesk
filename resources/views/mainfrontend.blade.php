<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kecamatan Margaasih</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets')}}/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{asset('assets')}}/frontend/vendor/owl.carousel/{{asset('assets')}}/frontend/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets')}}/frontend/css/style.css" rel="stylesheet">

     <link href="{{asset('assets')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.3.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="index.html">{{config('settingsite.navbrand')}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('assets')}}/frontend/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="/">Home</a></li>

          <li class="drop-down"><a href="#">pelayanan</a>
            <ul>
              <li><a href="{{route('keluhanfront')}}">Data Keluhan</a></li>
              <li><a href="{{route('iumkmfront')}}">IUMKM</a></li>
              <li><a href="{{route('ktpfrontend')}}">Pembuatan KTP</a></li>
              <li><a href="{{route('kematianfront')}}">Pembuatan AKte Kematian</a></li>
                <!-- /<li><a href="testimonials.html">Pembuatan Akte Kematian</a></li> -->
            </ul>
          </li>

          <li><a href="{{route('artikelfront')}}">Artikel Kegiatan</a></li>
    

        </ul>

      </nav><!-- .nav-menu -->

     

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('assets')}}/frontend/img/slide/1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di <span>Kecamatan Margaasih</span></h2>
              <p class="animate__animated animate__fadeInUp">Kami siap melayani anda sepenuh hati Dan memberikan pelayanan terbaik</p>
             
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('assets')}}/frontend/img/slide/2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di <span>Kecamatan Margaasih</span></h2>
              <p class="animate__animated animate__fadeInUp">Kami siap melayani anda sepenuh hati Dan memberikan pelayanan terbaik</p>
         
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('assets')}}/frontend/img/slide/3.jpg)">
          <div class="carousel-container">
            <div class="container">
             <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di <span>Kecamatan Margaasih</span></h2>
              <p class="animate__animated animate__fadeInUp">Kami siap melayani anda sepenuh hati Dan memberikan pelayanan terbaik</p>
             
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-6">
            <div class="footer-info">
              <h3>Kontak</h3>
              <p>
                <strong>No.Telp:</strong>(022) 54415144<br>
                <strong>Email:</strong> Kecamatan.Margaasih.go<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

            <div class="col-lg-5 col-md-6">
            <div class="footer-info">
              <h3>Alamat</h3>
              <p>
                <strong>Jl.Peuris No.2,</strong><br>
                <strong>, Margaasih, Bandung</strong><br>
                  <strong>, Jawa Barat 40215, Indonesia</strong><br>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sihelkec</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets')}}/frontend/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/venobox/venobox.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{asset('assets')}}/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets')}}/frontend/js/main.js"></script>

       <!-- Page level plugins -->
    <script src="{{asset('assets')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets')}}/js/demo/datatables-demo.js"></script>

</body>

</html>