@extends('layouts.klien.sidebar')

@section('title',)
@section('content')

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
                            <a href="/order-transkrip" class=" text-center btn btn-primary">Order Here</a>
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
                            <a href="/order-interpreter" class=" text-center btn btn-primary">Order Here</a>
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                            <a href="/order-dubbing" class=" text-center btn btn-primary">Order Here</a>
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                            <a href="/order-teks" class=" text-center btn btn-primary">Order Here</a>
                            
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                            <a href="/order-dokumen" class=" text-center btn btn-primary">Order Here</a>
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
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                            <a href="/order-subtitle" class=" text-center btn btn-primary">Order Here</a>
                        </div>
                        </div>
                        </div>
                        <!-- Card -->
                    </div>
                    </div>
                </div>
          
       

</div>
</section>
</div>

@endsection