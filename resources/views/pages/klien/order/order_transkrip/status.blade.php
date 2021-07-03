@extends('layouts.klien.sidebar')
@section('title','Status Order Transkrip (Audio)')
@section('content')


<!-- Modal Detail Status 1-->
@foreach ($status1 as $z)
<div class="modal fade" id="detail{{$z->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$z->id_transaksi}}">

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
                                <span class="info-box-number text-center text-blue mb-0">{{$z->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Harga</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$z->harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Status Transaksi</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$z->status_transaksi}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Jenis Layanan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$z->jenis_layanan}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($z->durasi_audio))
                              <div class="user-block">
                                  <b>Durasi Video</b>
                                  <p class="text-muted">
                                    {{$z->durasi_audio}}
                                  </p>
                              </div>
                              @endif
                             
                              @if (!empty($z->durasi_pengerjaan))
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$z->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              @endif
                              @if (!empty($z->nama_dokumen))
                              <b>Project files</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-folder"></i> {{$z->nama_dokumen}}</a>
                                </li>
                              </ul>
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
@foreach ($status2 as $y)
<div class="modal fade" id="detail{{$y->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$y->id_transaksi}}">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <section class="content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 ">
                        <div class="row">
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center ">Nama</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$y->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Total Order</span>
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$y->harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Status Transaksi</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$y->status_transaksi}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Jenis Layanan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$y->jenis_layanan}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($y->durasi_audio))
                              <div class="user-block">
                                  <b>Durasi Video</b>
                                  <p class="text-muted">
                                    {{$y->durasi_audio}}
                                  </p>
                              </div>
                              @endif
                             
                              @if (!empty($y->durasi_pengerjaan))
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$y->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              @endif
                              @if (!empty($y->nama_dokumen))
                              <b>Project files</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-folder"></i> {{$y->nama_dokumen}}</a>
                                </li>
                              </ul>
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

<div class="container">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
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
                <div class="active tab-pane" id="">
                @foreach($status1 as $z)
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title m-0">Tanggal Order ({{$z->tgl_order}})</h5>
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
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$z->id_transaksi}}">Detail Order</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @foreach($status2 as $y)
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title m-0">Tanggal Order ({{$y->tgl_order}})</h5>
                    </div>
                    <div class="card-body">
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-2">
                          <div class="spinner-border text-danger m-5" role="status">
                            <span class="visually-hidden"></span>
                          </div>
                        </div>
                        <div class="col-md-10 pt-4">
                          <h3>Order Sedang Diproses</h3>
                          <p class="fst-italic">Terimakasih telah bersedia menunggu, translator Anda telah menerima order.<br>
                          Harap tunggu hingga proses penerjemahan selesai, translator sedang menerjemahkan audio mu.
                          </p>
                          <div class="float-right ml-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$y->id_transaksi}}">Detail Order</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection