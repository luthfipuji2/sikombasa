@extends('layouts.klien.sidebar')
@section('title','Status Order Offline')
@section('content')


<!-- Modal Detail Status 1-->
@foreach ($status1 as $a)
<div class="modal fade" id="detail{{$a->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$a->id_transaksi}}">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">

          <!-- Main content -->
            <section class="content">

              <!-- Default box -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 ">
                        <div class="row">
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center ">Nama</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$a->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Total Order</span>
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$a->harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Status Transaksi</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$a->status_transaksi}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Jenis Layanan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$a->jenis_layanan}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($a->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$a->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($a->tipe_offline))
                              <div class="user-block">
                                  <b>Jenis Menu Offline</b>
                                  <p class="text-muted">
                                    {{$a->tipe_offline}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($a->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$a->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($a->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$a->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($a->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$a->lokasi}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($a->jarak))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$a->jarak}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($a->tanggal_pertemuan))
                              <div class="user-block">
                                  <b>Tanggal Pertemuan</b>
                                  <p class="text-muted">
                                    {{$a->tanggal_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($a->waktu_pertemuan))
                              <div class="user-block">
                                  <b>Waktu Pertemuan</b>
                                  <p class="text-muted">
                                    {{$a->waktu_pertemuan}}
                                  </p>
                              </div>
                              @endif

                            </div>         
                        </div>
                    </div>
                  </div>
                </div>
            </section>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Detail Status 2-->
@foreach ($status2 as $b)
<div class="modal fade" id="detail{{$b->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$b->id_transaksi}}">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">

          <!-- Main content -->
            <section class="content">

              <!-- Default box -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 ">
                        <div class="row">
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center ">Nama</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$b->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Total Order</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$b->harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Status Transaksi</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$b->status_transaksi}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Jenis Layanan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$b->jenis_layanan}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($b->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$b->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($b->tipe_offline))
                              <div class="user-block">
                                  <b>Jenis Menu Offline</b>
                                  <p class="text-muted">
                                    {{$b->tipe_offline}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($b->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$b->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($b->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$b->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($b->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$b->lokasi}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($b->jarak))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$b->jarak}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($b->tanggal_pertemuan))
                              <div class="user-block">
                                  <b>Tanggal Pertemuan</b>
                                  <p class="text-muted">
                                    {{$b->tanggal_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($b->waktu_pertemuan))
                              <div class="user-block">
                                  <b>Waktu Pertemuan</b>
                                  <p class="text-muted">
                                    {{$b->waktu_pertemuan}}
                                  </p>
                              </div>
                              @endif

                            </div>         
                        </div>
                    </div>
                  </div>
                </div>
            </section>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Halaman Utama -->
<div class="container">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li><a href="{{ url ('order-interpreter/status') }}" class="text-center btn btn-primary" type="submit" class="text-right" style="float: right;">Offline</a></li>&nbsp;&nbsp;
                <li><a href="{{ url ('order-transkrip/status') }}" class="text-center btn btn-primary" type="submit" class="text-right" style="float: right;">Transkrip</a></li>&nbsp;&nbsp;
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="status1">
                @foreach($status1 as $a)
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title m-0">Tanggal Order ({{$a->tgl_order}})</h5>
                    </div>
                    <div class="card-body">
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-2">
                          <div class="spinner-border text-primary m-5" role="status">
                            <span class="visually-hidden"></span>
                          </div>
                        </div>
                        <div class="col-md-10 pt-4">
                          <h3>Sedang Mencari Translator . . .</h3>
                          <p class="fst-italic">Terimakasih telah menggunakan aplikasi kami untuk melakukan pemesanan, kami akan mencarikan translator untuk Anda </p>
                          <div class="float-right ml-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$a->id_transaksi}}">Detail Order</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($status2 as $b)
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Tanggal Order ({{$b->tgl_order}})</h5>
              </div>
              <div class="card-body">
                <div class="row" data-aos="fade-up">
                  <div class="col-md-2">
                    <div class="spinner-grow text-cyan m-5" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                  </div>
                  <div class="col-md-10 pt-4">
                    <h3>Order Sedang Diproses</h3>
                    <p class="fst-italic">Terimakasih telah bersedia menunggu, translator Anda telah menerima order.<br>
                     Harap tunggu di lokasi, translator sedang menuju ke alamatmu
                     </p>
                    <div class="float-right ml-auto">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$b->id_transaksi}}">Detail Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.card-body -->
            </div>
            @endforeach
            <!-- @foreach($status2 as $c)
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Tanggal Order ({{$c->tgl_order}})</h5>
              </div>
              <div class="card-body">
                <div class="row" data-aos="fade-up">
                  <div class="col-md-2">
                    <div>
                      <img src="./public/img/hero-img.png"> 
                    </div>
                  </div>
                  <div class="col-md-10 pt-4">
                    <h3>Order Selesai</h3>
                    <p class="fst-italic">Terimakasih telah melakukan pemesanan di sini, jangan lupa untuk memberikan review.<br>
                     Penilaian anda akan menjadi prioritas dalam meningkatkan pelayanan untuk anda pada order selanjutnya.
                     </p>
                    <div class="float-right ml-auto">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail">Detail Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <-- /.card-body -->
            <!-- </div> -->
            <!-- @endforeach -->




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