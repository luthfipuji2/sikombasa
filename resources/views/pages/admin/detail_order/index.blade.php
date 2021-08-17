        @extends('layouts/admin/template')

        @section('title', 'Daftar Order')

        @section('container')
        <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">


    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

            
    <div class="container">

    <section class="content">

    <div class="container-fluid">

            <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header">Menu List</div>
                            <div class="row">

                            
                <!-- ======= Services Section ======= -->
        <section class="services">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box icon-box-pink">
                    <img src="./img/frontend/transkrip.gif" style="width:55%; left: -25px;""></img>    
                <h4 class="title"><a href="">Transkrip (Audio)</a></h4>
                <p class="description"><h3>{{ $transkrip }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-transkrip" class="btn btn-outline-info">Detail</a>
                </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                <img  src="./img/frontend/interpreter.gif" style="width:55%; left: -25px;""></img><br>
                <h4 class="title"><a href="">Bertemu Langsung</a></h4>
                <p class="description"><h3>{{ $interpreter }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-interpreter" class="btn btn-outline-success">Detail </a>
                
                </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-green">
                <img  src="./img/frontend/teks.gif" style="width:55%; left: -15px;"></img><br>
                <h4 class="title"><a href="">Teks</a></h4>
                <p class="description"><h3>{{ $teks }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-teks" class="btn btn-outline-info">Detail</a>
                </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-green">
                <img  src="./img/frontend/dokumen.gif" style="width:55%; left: -15px;"></img><br>
                <h4 class="title"><a href="">Dokumen</a></h4>
                <p class="description"><h3>{{ $dokumen }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-dokumen" class="btn btn-outline-success">Detail </a>
                </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-blue">
                <img  src="./img/frontend/video.gif" style="width:54%; left: -15px;"></img><br>
                <h4 class="title"><a href="">Subtitle</a></h4>
                <p class="description"><h3>{{ $subtitle }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-subtitle" class="btn btn-outline-secondary">Detail </a>
                </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                <img  src="./img/frontend/dubbing.gif" style="width:50%; left: -25px;""></img><br>
                <h4 class="title"><a href="">Dubbing</a></h4>
                <p class="description"><h3>{{ $dubbing }}</h3></p>
                <div class="row justify-content-right">
                <a href="/det-order-dubbing" class="btn btn-outline-dark">Detail </a>
                </div>
                </div>
            </div>

            </div>

        </div>
        </section><!-- End Services Section -->

                


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    

                </section>
                <!-- right col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->

        @endsection