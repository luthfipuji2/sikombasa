<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIKOMBASA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- 1. Addchat css -->
  <link href="{{asset('assets/addchat/css/addchat.min.css') }}" rel="stylesheet">

  <!-- Favicons -->
  <link href="./img/icon-sv1.png" rel="icon">
  <link href="./img/icon-sv1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- =======================================================
  * Template Name: Moderna - v4.2.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- 2. AddChat widget -->
  <div id="addchat_app" 
      data-baseurl="{{ url('') }}"
      data-csrfname="{{'X-CSRF-Token' }}"
      data-csrftoken="{{csrf_token() }}"
  ></div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><span>SIKOMBASA</span></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>SIKOMBASA</span></h2>
          <h4 class="animate__animated animate__fadeInUp">Sistem Informasi Komunikasi Olah dan Bahasa</h4>
          <p class="animate__animated animate__fadeInUp">Website Penyedia Jasa Translate dan Rekruitmen Translator</p>
          <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">SIKOMBASA</h2>
          <p class="animate__animated animate__fadeInUp">Sikombasa merupakan platform layanan terjemah online untuk mempermudahkan interaksi antara pengguna dengan penyedia jasa. Sikombasa dibuat dengan tujuan untuk mencapai pemerataan perekonomian secara digital.Transaksi perdagangan online di Indonesia memiliki masa depan cerah</p>
          <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">SIKOMBASA</h2>
          <p class="animate__animated animate__fadeInUp">Marketplace adalah salah satu pemain terbesar dalam bisnis ecommerce Indonesia. Hal itulah yang memacu terbentuknya Marketplace Sikombasa.</p>
          <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
                <img src="./img/frontend/clock1.gif" style="width:55%; left: -25px;""></img>    
              <h4 class="title"><a href="">Tepat Waktu</a></h4>
              <p class="description">Durasi pengerjaan dapat di sesuaikan oleh klien</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
            <img  src="./img/frontend/diamond.gif" style="width:40%; left: -25px;""></img><br>
              <h4 class="title"><a href="">Harga</a></h4>
              <p class="description">Harga terjangkau sesuai dengan pilihan klien</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
            <img  src="./img/frontend/search.gif" style="width:40%; left: -15px;"></img><br>
              <h4 class="title"><a href="">Get a Job Translator</a></h4>
              <p class="description">Terdapat sistem rekruitmen translator bagi yang punya keahlian dibidang jasa translate bahasa inggris</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
            <img  src="./img/frontend/check.gif" style="width:40%; left: -15px;"></img><br>
              <h4 class="title"><a href="">Sesuai Target</a></h4>
              <p class="description">Pengerjaan sesuai target dari klien dan klien dapat mengajukan revisi jika pelayanan kurang puas</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-3 video-box">
            <img src="./img/job-icon.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="#">Get a Job Translator</a></h4>
              <p class="description">SIKOMBASA membuka peluang pekerjaan sebagai translator atau jasa translate bagi yang mempunyai keahlian dibidang bahasa/sastra inggris</p>
              <div class="carousel-item active">
                <a href="info.html" class="btn btn-outline-info  center-block">Masuk Untuk Mendaftar</a>
            </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="./img/why.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=OcKLHxl_gpI" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Profil Sekolah Vokasi UNS</a></h4>
              <p class="description">Sekolah Vokasi Universitas Sebelas Maret Surakarta</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="./img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Freelance</h3>
            <p class="fst-italic">
              Membuka lowongan pekerjaan sebagai penyedia jasa translate
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Mendapatkan pengalaman dan sertifikat</li>
              <li><i class="bi bi-check"></i> Mendapatkan Fee sesuai orderan</li>
            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="./img/features-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Terdapat menu order offline dan online</h3>
            <p>Jasa Translate SIKOMBASA menyediakan 6 menu order. Order Offline seperti transkrip dan interpreter sedangakan menu online seperti teks, dokumen, subtitle dan dubbing</p>
            <ul>
              <li><i class="bi bi-check"></i> Dapat order lebih dari 1 kali</li>
              <li><i class="bi bi-check"></i> Sistem pengerjaan cepat dan praktis</li>
              <li><i class="bi bi-check"></i> Klien dapat melakukan revisi jika pelayanan kurang puas</li>
              <li><i class="bi bi-check"></i> Klien dapat bertemu langsung dengan jasa terjemah</li>
            </ul>
          </div>
        </div>

        
      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">



          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            Universitas Sebelas Maret <br>
            Jl Kolonel Sutarto 150 K, Jebres Surakarta,<br>
            <br>
              <strong>Phone:</strong> 0271-664126<br>
              <strong>Email:</strong> kontak@d3ti.vokasi.uns.ac.id<br>
              <strong>Website:</strong> http://d3ti.vokasi.uns.ac.id<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Sekolah Vokasi UNS</h3>
            <p>Sekolah Vokasi Universitas Sebelas Maret Surakarta mengelola Program Studi Diploma, baik D3 maupun D4 atau Sarjana Terapan</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- 3. AddChat JS -->
  <!-- Modern browsers -->
  <script type="module" src="{{asset('assets/addchat/js/addchat.min.js') }}"></script>
  <!-- Fallback support for Older browsers -->
  <script nomodule src="<{{asset('assets/addchat/js/addchat-legacy.min.js') }}"></script>


</body>

</html>