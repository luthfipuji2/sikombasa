@extends('layouts.klien.sidebar')

@section('title',)
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<div class="container">

<section class="content">

<div class="container-fluid">

        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Menu List</div>
                        <div class="row"> 
                        <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/transkrip.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Transkrip (Audio)</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Adalah menu yang akan menerjemahkan file rekaman suara atau audio ke dalam teks</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-transkrip" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                        </div>
                        </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/interpreter.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Bertemu langsung</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Adalah menu dimana translator akan menerjemahkan secara verbal di tempat</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-interpreter" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                        </div>
                        </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/dubbing.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Dubbing</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Order dengan menggunggah video dan jumlah dubber sebagai pengisi suara. Hasil akhir order dubbing berupa video yang sudah di terjemahkan oleh translator. Terdapat jenis layanan yang bisa Anda pilih</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-dubbing" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                        </div>
                        </div>
                        </div>
                        <!-- Card -->
                    </div>

                    <div class="row">
                    <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/teks.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Teks</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Order dengan mengisi teks. Hasil akhir order teks akan diterjemahkan translator sesuai teks yang Anda tulis. Terdapat jenis layanan yang bisa Anda pilih</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-teks" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                            
                        </div>
                        </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/doc.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Dokumen</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Order dengan mengunggah dokumen bisa berupa Word atau PDF. Hasil akhir dari order dokumen berupa terjemahan dokumen dari translator. Terdapat jenis layanan yang bisa Anda pilih</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-dokumen" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                        </div>
                        </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                        <div class="col-4 align-self-center">
                        <!-- Card image -->
                        <div class=card-body>
                            <img class="card-img-top"  height="200px" src="./img/subtitle.jpg" alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card text-center">
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title-center">Subtitle</h4>
                            <hr>
                            <!-- Text -->
                            <p class="card-text">Order dengan menggunggah video. Hasil akhir order subtitle berupa video yang sudah di terjemahkan oleh translator. Terdapat jenis layanan yang bisa Anda pilih</p>
                            @if(empty($klien->klien->id_klien))
                                    <a href="#myModal" class=" text-center btn btn-primary" data-toggle="modal">Order Here</a>
                                @else
                                    <a href="/order-subtitle" class=" text-center btn btn-primary">Order Here</a>
                            @endif
                        </div>
                        </div>
                        </div>
                        <!-- Card -->
                    </div>
                    </div>
                </div>

                <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="icon-box">
                                        <i class="material-icons">&#xE5CD;</i>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Ooops!</h4>	
                                    <p>Profil Belum Lengkap, Lengkapi Profil Terlebih Dahulu</p>
                                    <button class="btn btn-success" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>     
    
</div>
</section>
</div>

@endsection