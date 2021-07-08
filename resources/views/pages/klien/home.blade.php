@extends('layouts.klien.sidebar')
@section('content')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Dashboard Klien</title>

  <!-- 1. Addchat css -->
  <link href="{{asset('assets/addchat/css/addchat.min.css') }}" rel="stylesheet">

  <!-- Vendor CSS Files-->
  <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

  <!-- 2. AddChat widget -->
  <div id="addchat_app" 
        data-baseurl="{{ url('') }}"
        data-csrfname="{{'X-CSRF-Token'}}"
        data-csrftoken="{{ csrf_token() }}"
    ></div>

    <div class="container-fluid" >
    <!-- Info boxes -->
    <div class="d-flex justify-content-center">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-language"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Get a Quote</span>
            <span class="info-box-number">
            <a href="{{ url ('/menu-order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-green elevation-1"><i class="fas fa-tags"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pricing</span>
            <span class="info-box-number">
            <a href="scrollspyHeading5" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-user-tie"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Get a Job</span>
            <span class="info-box-number">
            <a href="/career" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">
        <div class="section-title">
          <h2 class="text-center">About</h2>
          <p class="text-center">Hallo sobat sikombasa, terimakasih telah melakukan register, selamat datang di dashboard klien.</p>
        </div>

        <div class="row" data-aos="fade-up"  >
          <div class="col-md-3">
            <img src="./img/myicon/Spotlight _Monochromatic.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3 class="text-blue" >Apa itu Sikombasa ?</h3>
            <p class="fst-italic" style="text-align:justify;">
              Sikombasa merupakan platform layanan terjemah online untuk mempermudahkan interaksi antara pengguna dengan penyedia jasa.
              Sikombasa dibuat dengan tujuan untuk mencapai pemerataan perekonomian secara digital.Transaksi perdagangan online  
              di Indonesia memiliki masa depan cerah. Pasalnya, nilai transaksinya terus meningkat selama lima tahun terakhir. 
              Marketplace adalah salah satu pemain terbesar dalam bisnis ecommerce Indonesia. Hal itulah yang memacu terbentuknya Marketplace Sikombasa.
            </p>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-md-3 order-1 order-md-5 ml-auto">
            <img src="./img/myicon/undraw_business_deal_cpi9.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1 ml-auto">
            <h3 class="text-blue">Feature</h3>
            <p class="fst-italic"style="text-align:justify;">
              Sikombasa memiliki 6 jenis menu order yang disesuaikan dengan tiap ketegori antara lain : Interpreter, Transkrip (Audio), Teks, Dokumen, Dubbing, dan Subtitle.
            </p>
            <p>
              Selain itu, sikombasa juga menyediakan feature freelance bagi pengguna yang berkeinginan untuk menjadi seorang translator.
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-2">
            <img src="./img/myicon/undraw_Internet_on_the_go_re_vben.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5" style="text-align:justify;">
            <i class="bi bi-check text-blue"><h3><b>Visi Sikombasa</b></h3></i>
            <p>Sikombasa hadir untuk membawa dampak positif untuk memenuhi kebutuhan pengguna dalam meningkatkan laju pertumbuhan ekonomi 
            Indonesia,dengan memanfaatkan teknologi digital.</p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-2 order-1 order-md-2 ml-auto">
            <img src="./img/myicon/illustration-6.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1 ml-auto">
          <i class="bi bi-check text-blue"><h3><b>Misi Sikombasa.</b></h3></i>
            <ul>
              <li><i class="bi bi-check"></i>Memberikan kesempatan kepada setiap individu untuk mengasah kemampuan dengan menjadi freelance.</li>
              <li><i class="bi bi-check"></i> Selalu memberikan pelayanan terbaik kepada setiap pengguna.</li>
              <li><i class="bi bi-check"></i> Keamanan selalu menjadi prioritas.</li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </section><!-- End Features Section -->

<!-- ======= Services Section ======= -->
<section class="services">
      <div class="container">
      <div class="title">
      <i class="bi bi-check text-blue"><h3 class="text-center">Pricing</h3></i>
          <p class="text-center">CHECK OUR PRICING</p>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
                <img src="./img/myicon/2.jpg" style="width:55%; left: -25px;"></img>
              <h4 class="title"><a href="">Basic</a></h4>
              <h4 class="text-success"><sup>Rp</sup>0<span> / month</span></h4>
              <ul>
              <li><p class="description text-left">Tidak ada layanan revisi file lebih dari 1x</p></li>
              <li><p class="description text-left">Tidak ada Garansi</p></li>
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-cyan">
              <img src="./img/myicon/2.jpg" style="width:55%; left: -25px;"></img>
              <h4 class="title"><a href="">Premium</a></h4>
              <h4 class="text-blue"><sup>Rp</sup>50.000<span> / month</span></h4>
              <ul>
              <li><p class="description text-left">Mendapat layanan permintaan revisi lebih dari 1x</p></li>
              <li><p class="description text-left">Mendapat Garansi</p></li>
              <li><p class="description text-left">Full service</p></li>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section><!-- End Services Section -->

  <!-- Vendor JS Files-->
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
  <script type="module" src="{{ asset('assets/addchat/js/addchat.min.js')  }}"></script>
  <!-- Fallback support for Older browsers -->
  <script nomodule src="{{ asset('assets/addchat/js/addchat-legacy.min.js')  }}"></script>


</body>

</html>
@endsection