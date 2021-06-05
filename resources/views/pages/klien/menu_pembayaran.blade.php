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
                                    {{$o->durasi_pengerjaan}} Hari
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

                              @if (!empty($o->nama_dokumen))
                              <b>Project files</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-file-upload"></i> {{$o->nama_dokumen}}</a>
                                </li>
                              </ul>
                              @endif
                              <!-- /.user-block -->     
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

<!-- Modal Detail -->
@foreach ($riwayat as $r)
<div class="modal fade" id="detailTransaksiModal{{$r->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Order {{$r->id_order}}</h5>
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
                              <span class="info-box-number text-center text-muted mb-0">{{$r->tgl_order}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Jenis Layanan</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$r->jenis_layanan}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Total Order</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$r->harga}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                        <div class="col-12">
                  
                            <div class="post">
                              @if (!empty($r->text))
                              <div class="user-block">
                                  <b>Text</b>
                                  <p class="text-muted">
                                    {{ substr($r->text, 0,  500) }}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->jumlah_karakter))
                              <div class="user-block">
                                  <b>Jumlah Karakter</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_karakter}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->jumlah_halaman))
                              <div class="user-block">
                                  <b>Jumlah Halaman</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_halaman}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_video))
                              <div class="user-block">
                                  <b>Durasi Video</b>
                                  <p class="text-muted">
                                    {{$r->durasi_video}}
                                  </p>
                              </div>
                              @endif


                              @if (!empty($r->jumlah_dubber))
                              <div class="user-block">
                                  <b>Jumlah Dubber</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_dubber}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$r->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_pengerjaan))
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$r->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$r->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$r->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$r->lokasi}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->nama_dokumen))
                              <b>Project files</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-file-upload"></i> {{$r->nama_dokumen}}</a>
                                </li>
                              </ul>
                              @endif
                              <!-- /.user-block -->     
                            </div>         
                        </div>
                      
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                      <h3 class="text-primary"><i class="fas fa-globe"></i> SIKOMBASA</h3>
                      <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                      <br>
                      <div class="text-muted">
                        <p class="text-sm">Nama
                          <b class="d-block">{{$r->name}}</b>
                        </p>
                        <p class="text-sm">Email
                          <b class="d-block">{{$r->email}}</b>
                        </p>
                      </div>

                      
                      
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

<!-- Modal Unggah -->
@foreach ($order_pembayaran as $p)
<div class="modal fade" id="unggahModal{{$p->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('menu-pembayaran.store')}}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$p->id_order}}" hidden>

            <div class="form-group">
                <label>Pilih Bank</label>
                <select class="form-control @error('id_bank') is-invalid @enderror" 
                id="id_bank" name="id_bank">
                  <option value="">--Pilih Bank--</option>
                @foreach ($bank as $b)
                  <option value="{{$b->id_bank}}">{{$b->nama_bank}}-{{$b->no_rekening}} 
                  ({{$b->nama_rekening}})</option>
                @endforeach
                </select>
                @error ('id_bank')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <input type="text" name="nominal_transaksi" value="{{$p->harga}}" hidden>

            <div class="form-group">
              <label for="profile_photo_path">Bukti Transaksi</label>
                <input type="file" name="bukti_transaksi" class="form-control">
            </div> 
            

        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Unggah</button>
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
                  @foreach ($order_pembayaran as $bayar)
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title m-0">Order #{{$bayar->id_order}}</h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text text-muted">Tanggal Order : {{$bayar->tgl_order}}</p>
                        <p class="card-text text-muted">Jenis Layanan : {{$bayar->jenis_layanan}}</p>
                        <p class="card-text text-muted">Total Order : Rp{{$bayar->harga}}</p>

                        <div class="float-right">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{$bayar->id_order}}">Detail Order</button>
                          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#unggahModal{{$bayar->id_order}}">Unggah Bukti Transaksi</button>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="riwayat">

                  @foreach ($riwayat as $trans)
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title m-0">Order #{{$trans->id_order}}</h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text text-muted">Telah dibayar pada {{$trans->tgl_transaksi}}</p>
                        <p class="card-text text-muted">Total Order : Rp{{$trans->nominal_transaksi}}</p>
                        <p class="card-text text-muted">Status Transaksi : <b>{{$trans->status_transaksi}}</b></p>

                        <div class="float-right">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailTransaksiModal{{$trans->id_order}}">Detail Order</button>
                          <button type="button" class="btn btn-sm btn-default">
                            <a href="{{route('pdf.download', $trans->id_transaksi)}}">Cetak Transaksi <i class="fas fa-print"></i></a>
                          </button>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <!-- <table class="table projects">
                      <thead>
                          <tr>
                              
                              <th style="width: 20%">
                                  Tanggal Transaksi
                              </th>
                              <th style="width: 20%">
                                  Nominal Transaksi
                              </th>
                              <th>
                                  Bukti Transaksi
                              </th>
                              <th>
                                  Status Transaksi
                              </th>
                              <th>
                                  Cetak Transaksi
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($riwayat as $trans)
                        <tr>
                          
                          <td>{{$trans->tgl_transaksi}}</td>
                          <td>{{$trans->nominal_transaksi}}</td>
                          <td><a href="{{route('bukti.download', $trans->id_transaksi)}}">{{$trans->bukti_transaksi}}</a></td>
                          <td>{{$trans->status_transaksi}}</td>
                          <td class="text-center">
                          <a href="{{route('pdf.download', $trans->id_transaksi)}}"><i class="fas fa-print"></i></a>
                          </td>

                        </tr>
                      @endforeach
                      </tbody>
                  </table> -->
                  </div>
                  <!-- /.tab-pane -->

                  
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



