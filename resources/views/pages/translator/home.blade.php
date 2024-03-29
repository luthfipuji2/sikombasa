@extends('layouts.translator.master')

@section('title', 'Starter Page')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Dashboard Translator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- 1. Addchat css -->
  <link href="{{asset('assets/addchat/css/addchat.min.css') }}" rel="stylesheet">

  <!-- Favicons-->
  <link href="./img/icon-sv1.png" rel="icon">
  <link href="./img/icon-sv1.png" rel="apple-touch-icon"> 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files-->
  <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}"> 


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

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row mt-4">
                   <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="./img/on-time.jpeg" alt="Photo 2" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          SIKOMBASA
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="./img/service-details-3.jpg" alt="Photo 2" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          SIKOMBASA
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                      <img src="./img/price.jpg" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          SIKOMBASA
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<div class="row">
	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <!-- <h5 class="card-title">On-Time</h5> -->
		    <p class="card-text">Translator mengerjakan apa yang harus dikerjakannya dengan tepat pada waktu yang telah ditentukan sebelumnya</p>
		  </div>
		</div>
	</div>
 
	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <!-- <h5 class="card-title">Profesional</h5> -->
		    <p class="card-text">Translator menawarkan jasa atau layanan sesuai dengan protokol dan peraturan dalam bidang yang dijalaninya</p>
		  </div>
		</div>
	</div>
 
	<div class="col-sm-4">
		<div class="card text-center">
		  <div class="card-body">
		    <!-- <h5 class="card-title">Text Align Right</h5> -->
		    <p class="card-text">Penawaran harga yang sangat baik sehingga dapat dijangkau oleh semua orang dari berbagai kalangan</p>
		    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
		  </div>
		</div>
	</div>
</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</div>

    <div class="container-fluid" >
    <div class="d-flex justify-content-center">
    <!-- /.row -->
    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">
        <div class="section-title">
          <h2 class="text-center">About</h2>
          <p class="text-center">Halo, Selamat datang para translator SIKOMBASA di dashboard khusus para translator kepercayaan kami.</p>
        </div>

        <div class="row" data-aos="fade-up"  >
          <div class="col-md-3">
            <img src="./img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Latar Belakang terbentuknya SIKOMBASA</h3>
            <p class="fst-italic">
              SIKOMBASA (Solusi Komunikasi dan Olah Bahasa) dibentuk untuk menyediakan moda terjemahan yang efektif, efisien, serta tepat sasaran dengan adanya enam pilihan menu
              yang memungkinkan klien untuk dapat menemukan jenis jasa yang ia butuhkan dengan tingkat akurasi terjemahan yang dapat dipertanggungjawabkan juga harga yang tentunya terjangkau. 
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-3 order-1 order-md-5 ml-auto">
            <img src="./img/details-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1 ml-auto">
            <h3>Mengenai SIKOMBASA</h3>
            <p class="fst-italic">
            SIKOMBASA (Solusi Komunikasi dan Olah Bahasa) merupakan platform layanan terjemahan online untuk mempermudahkan interaksi antara klien dengan penyedia jasa penerjemah atau dalam hal ini adalah translator. 
            Kegunaan lain dari adanya sistem ini adalah:
            <ul>
              <li><i class="bi bi-check"></i>Tempat bagi translator untuk membangun jaringan serta reputasi</li>
              <li><i class="bi bi-check"></i> Wadah bagi translator untuk menawarkan jasanya secara lebih mudah</li>
            </ul>
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-2">
            <img src="./img/details-3.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5">
            <h3>Menu Layanan SIKOMBASA</h3>
            <p>SIKOMBASA menyediakan enam pilihan menu yang bervariasai, enam menu ini dibagi menjadi dua kategori yakni menu terjemahan online dan offline.
              Diantara menu-menu berikut adalah
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Teks dan Dokumen</li>
              <li><i class="bi bi-check"></i> Subtitle dan Dubbing</li>
              <li><i class="bi bi-check"></i> Transkrip (Online dan Offline) dan Interpreter</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>
@endsection