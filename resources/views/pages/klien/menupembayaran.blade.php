@extends('layouts.klien.sidebar')

@section('content')


<!-- Modal Detail -->
@foreach ($order_pembayaran as $o)
<div class="modal fade" id="detailModal{{$o->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Order {{$loop->iteration}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detailForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">

          <!-- Main content -->
            <section class="content">

              <!-- Default box -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                      <div class="row">
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Tanggal Order</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$o->tgl_order}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Jenis Layanan</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$o->jenis_layanan}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Total Order</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$o->harga}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          
                            <div class="post">
                              @if (!empty($o->text))
                              <div class="user-block">
                                  <b>Text</b>
                                  <p class="text-muted">
                                    {{ substr($o->text, 0,  500) }}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->jumlah_karakter))
                              <div class="user-block">
                                  <b>Jumlah Karakter</b>
                                  <p class="text-muted">
                                    {{$o->jumlah_karakter}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->jumlah_halaman))
                              <div class="user-block">
                                  <b>Jumlah Halaman</b>
                                  <p class="text-muted">
                                    {{$o->jumlah_halaman}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->durasi_video))
                              <div class="user-block">
                                  <b>Durasi Video</b>
                                  <p class="text-muted">
                                    {{$o->durasi_video}}
                                  </p>
                              </div>
                              @endif


                              @if (!empty($o->jumlah_dubber))
                              <div class="user-block">
                                  <b>Jumlah Dubber</b>
                                  <p class="text-muted">
                                    {{$o->jumlah_dubber}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$o->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->durasi_pengerjaan))
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$o->durasi_pengerjaan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$o->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$o->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($o->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$o->lokasi}}
                                  </p>
                              </div>
                              @endif
                              <!-- /.user-block -->     
                            </div>         
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                      <h3 class="text-primary"><i class="fas fa-globe"></i> SIKOMBASA</h3>
                      <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                      <br>
                      <div class="text-muted">
                        <p class="text-sm">Nama
                          <b class="d-block">{{$o->name}}</b>
                        </p>
                        <p class="text-sm">Email
                          <b class="d-block">{{$o->email}}</b>
                        </p>
                      </div>

                      @if (!empty($o->nama_upload))
                      <h5 class="mt-5 text-muted">Project files</h5>
                      <ul class="list-unstyled">
                        <li>
                          <a><i class="fas fa-file-upload"></i>{{$o->nama_dokumen}}</a>
                        </li>
                      </ul>
                      @endif
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              
              <!-- /.card -->

            </section>
          <!-- /.content -->
      
        </div>
      

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach


    
<div class="container">

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
    
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#belum_bayar" data-toggle="tab">Belum Bayar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#riwayat" data-toggle="tab">Riwayat Pembayaran</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="belum_bayar">
                    <table class="table projects">
                      <thead>
                          <tr>
                              <th style="width: 1%">
                                  Order
                              </th>
                              <th style="width: 20%">
                                  Tanggal Order
                              </th>
                              <th style="width: 30%">
                                  Jenis Layanan
                              </th>
                              <th>
                                  Harga
                              </th>
                              <th style="width: 20%">
                                  Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($order_pembayaran as $bayar)
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td scope="row" class="text-center" hidden>{{$bayar->id_order}}</td>
                          <td>{{$bayar->tgl_order}}</td>
                          <td>{{$bayar->jenis_layanan}}</td>
                          <td>{{$bayar->harga}}</td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{$bayar->id_order}}"><i class="fas fa-info"></i></button>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#unggahModal{{$bayar->id_order}}">Unggah Bukti Transaksi</button>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>


                  

                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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



