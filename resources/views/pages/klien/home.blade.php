@extends('layouts.klien.sidebar')
@section('content')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Dashboard Klien</title>

  <!-- Vendor CSS Files-->
  <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- /.col -->
    @if(empty($klien->klien->id_klien))
    <div class="row justify-content-right" float= "right">
      <div class="col-16 col-sm-10 col-md-6">
          <div class="info-box mb-8">
            <img src="./img/frontend/info2.gif" style="width:25%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%">
              0%
            </div>
            <p class="font-weight-bold text-red">Belum melengkapi biodata</p>
            
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->jenis_kelamin) && empty($klien->klien->provinsi) && empty($klien->klien->kabupaten) 
        && empty($klien->klien->kecamatan) && empty($klien->klien->kode_pos) && empty($klien->klien->tgl_lahir) 
          && empty($klien->klien->alamat) && empty($klien->klien->no_telp) && empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:10%">
              10%
            </div>
            <br>
            <h6 class="font-weight text-red">* provinsi, kabupaten, kecamatan, kode pos, tanggal lahir, jenis kelamin, alamat, no.telp, foto profile belum diisi</h6>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kabupaten) && empty($klien->klien->kecamatan) && empty($klien->klien->kode_pos)
        && empty($klien->klien->tgl_lahir) && empty($klien->klien->alamat) && empty($klien->klien->no_telp)&& empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:20%">
              20%
            </div>
            <h6 class="font-weight text-red">* provinsi, kabupaten, kecamatan, kode pos, alamat, tanggal lahir, no.telp, foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kabupaten) && empty($klien->klien->kecamatan) && empty($klien->klien->kode_pos)
          && empty($klien->klien->alamat) && empty($klien->klien->no_telp)&& empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:30%">
              30%
            </div>
            <h6 class="font-weight text-red">* kabupaten, kecamatan, kode pos, alamat, no.telp, foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kecamatan) && empty($klien->klien->kode_pos) && empty($klien->klien->alamat) && empty($klien->klien->provinsi) && empty($klien->klien->kabupaten)&& empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:40%">
              40%
            </div>
            <h6 class="font-weight text-red">* provinsi, kabupaten, kecamatan, kode pos, alamat, foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kecamatan) && empty($klien->klien->kode_pos) && empty($klien->klien->provinsi) && empty($klien->klien->kabupaten)&& empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:50%">
              50%
            </div>
            <h6 class="font-weight text-red">* provinsi, kabupaten, kecamatan, kode pos,foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kode_pos) && empty($klien->klien->provinsi) && empty($klien->klien->kabupaten)&& empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:60%">
              60%
            </div>
            <h6 class="font-weight text-red">* kecamatan, provinsi, kabupaten, kode pos, foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kode_pos) && empty($klien->klien->provinsi) && empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:70%">
              70%
            </div>
            <h6 class="font-weight text-red">* kecamatan, provinsi, kode pos, foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->kode_pos) && empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:70%">
              80%
            </div>
            <h6 class="font-weight text-red">* kode pos, foto profile belum diisi</h6></h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @elseif(empty($klien->klien->foto_ktp))
        <div class="row justify-content-right" float= "right">
        <div class="col-14 col-sm-8 col-md-4">
          <div class="info-box mb-4">
            <img src="./img/frontend/info2.gif" style="width:35%; left: -25px;""></img>    
            <div class="info-box-content">
            <div class="alert alert-info">
              <strong>Info!</strong> Profil Anda Belum Lengkap
            </div>
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:80%">
              90%
            </div>
            <h6 class="font-weight text-red">* foto profile belum diisi</h6>
            <br>
            <a href="/profile-klien" class="btn btn-outline-info">Lengkapi Profil <i class="fas fa-arrow-circle-right"></i></a>
              <span class="info-box-number">
            </span>
            </div>
          </div>
        </div>
        @else
        <div class="alert alert-success">
          <strong>Info!</strong> Profil Sudah Lengkap
        </div>
      @endif
    </div>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->

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
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="text-blue"><h3><b>Visi Sikombasa</b></h3></i>
            <p>Sikombasa hadir untuk membawa dampak positif untuk memenuhi kebutuhan pengguna dalam meningkatkan laju pertumbuhan ekonomi 
            Indonesia,dengan memanfaatkan teknologi digital.</p>
          </div>
        </div>
 
        <div class="row" data-aos="fade-up">
          <div class="col-md-2 order-1 order-md-2 ml-auto">
            <img src="./img/myicon/illustration-6.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1 ml-auto">
            <i class="text-blue"><h3><b>Misi Sikombasa.</b></h3></i>
            <ul>
              <li><i class="far fa-gem"></i> Memberikan kesempatan kepada pengguna menjadi translator.
              <li><i class="far fa-gem"></i> Selalu memberikan pelayanan terbaik kepada setiap pengguna.</li>
              <li><i class="far fa-gem"></i> Keamanan selalu menjadi prioritas.</li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </section><!-- End Features Section -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-blue" id="staticBackdropLabel">Check Our Pricing</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <section class="services">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
                <img src="./img/myicon/2.jpg" style="width:55%; left: -25px;"></img>
              <h4 class="title"><a href="">Basic</a></h4>
              <h4 class="text-success"><sup>Rp</sup>0<span> / month</span></h4>
              <ul>
              <li><p class="description text-left">Tidak ada layanan revisi untuk order teks, dokumen, subtitle, audio, video</p></li>
              <li><p class="description text-left">Tidak mendapat gift dan mendapat penginapan standar untuk menu order bertemu langsung</p></li>
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-cyan">
              <img src="./img/myicon/2.jpg" style="width:55%; left: -25px;"></img>
              <h4 class="title"><a href="">Premium</a></h4>
              <h4 class="text-blue"><sup>Rp</sup>100.000<span> / month</span></h4>
              <ul>
              <li><p class="description text-left">Mendapat layanan permintaan revisi 1x order teks, dokumen, subtitle, audio, video</p></li>
              <li><p class="description text-left">Mendapat gift dan mendapat penginapan fasilitas min hotel bintang 3 untuk menu order bertemu langsung</p></li>
              </ul>
            </div>
            </div>
          </div>
        </div>
       </div>
      </div>
      </section><!-- End Services Section -->
    </div>

  <!-- Vendor JS Files-->
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script> 

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
@endsection