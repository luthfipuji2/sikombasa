@extends('layouts.klien.sidebar')
@section('title','Status Order')
@section('content')

<!-- Main content -->
<div class="container">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li><a href="order-interpreter/status" class=" text-center btn btn-primary">Offline</a></li>&nbsp;&nbsp;
                  <li><a href="order-transkrip/status" class=" text-center btn btn-primary">Transkrip</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-teks" class=" text-center btn btn-primary">Teks</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Subtitle</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Dubbing</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Document</a></li>&nbsp;&nbsp;
                </ul>
              </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-2">
                          <img src="./img/hero-img.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-10 pt-4">
                          <h3>Hallo Sobat Sikombasa</h3>
                          <p class="fst-italic">Ayo Cek Status Ordermu </p>
                        </div>
                      </div>
                    </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
