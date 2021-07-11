@extends('layouts.translator.master')
@section('title', 'Find a Job')
@section('content')


<form action="  " method="POST" enctype="multipart/form-data">
@csrf
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header bg-cyan">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center">No</th>
                    <th scope="row" class="text-center">Tanggal Transaksi</th>
                    <th scope="row" class="text-center" >Tanggal Order</th>
                    <th scope="row" class="text-center">Jenis Layanan</th>
                    <th scope="row" class="text-center">Total Harga</th>
                    <th scope="row" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($find as $f)
                  <tr>
                    <td scope="row" class="text-center">{{$loop->iteration}}</td>
                    <td scope="row" class="text-center">{{$f->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">{{$f->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$f->jenis_layanan}}</td>
                    <td scope="row" class="text-center">Rp. {{$f->harga}}</td>
                    <td scope="row" class="text-center">
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$f->id_transaksi}}">Detail Order</button>
                        <button type="submit" class="btn btn-sm btn-success ambil" data-toggle="modal" data-target="#submit{{$f->id_transaksi}}">Ambil Order</button>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>
<!-- /.content -->
</form>
@endsection


<!-- Modal Detail Order -->
@foreach ($find as $n)
<div class="modal fade" id="detail{{$n->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-olive" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail">

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
                              <span class="info-box-number text-center text-blue mb-0">{{$n->name}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center">Email</span>
                              <span class="info-box-number text-center text-blue mb-0">{{$n->email}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center">Status Transaksi</span>
                              <span class="info-box-number text-center text-blue mb-0">{{$n->status_transaksi}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-3">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center">Jenis Layanan</span>
                              <span class="info-box-number text-center text-blue mb-0">{{$n->jenis_layanan}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($n->nama_dokumen))
                              <div>
                              <b class="text-dark">Project files</b>
                              <br>
                              <a><i class="fas fa-folder"></i> {{$n->nama_dokumen}}</a>
                              </div>
                              @endif<br>
                              @if (!empty($n->durasi_audio))
                              <div class="text-dark">
                                  <b>Durasi Audio</b>
                                  <p class="text">
                                    {{$n->durasi_audio}} Detik
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->durasi_pengerjaan))
                              <div class="text-dark">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text">
                                    {{$n->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->durasi_pertemuan))
                              <div class="text-dark">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text">
                                    {{$n->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->latitude))
                              <div class="text-dark">
                                  <b>Latitude</b>
                                  <p class="text">
                                    {{$n->latitude}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->longitude))
                              <div class="text-dark">
                                  <b>Longitude</b>
                                  <p class="text">
                                    {{$n->longitude}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->tipe_offline))
                              <div class="text-dark">
                                  <b>Jenis Menu Offline</b>
                                  <p class="text">
                                    {{$n->tipe_offline}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->jarak))
                              <div class="text-dark">
                                  <b>Longitude</b>
                                  <p class="text">
                                    {{$n->jarak}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->lokasi))
                              <div class="text-dark">
                                  <b>Lokasi</b>
                                  <p class="text">
                                    {{$n->lokasi}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->text))
                              <div class="text-dark">
                                  <b>Text</b>
                                  <p class="text">
                                    {{ substr($n->text, 0,  500) }}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->jumlah_karakter))
                              <div class="text-dark">
                                  <b>Jumlah Karakter</b>
                                  <p class="text">
                                    {{$n->jumlah_karakter}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->jumlah_halaman))
                              <div class="text-dark">
                                  <b>Jumlah Halaman</b>
                                  <p class="text">
                                    {{$n->jumlah_halaman}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->durasi_video))
                              <div class="text-dark">
                                  <b>Durasi Video</b>
                                  <p class="text">
                                    {{$n->durasi_video}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($n->jumlah_dubber))
                              <div class="text-dark">
                                  <b>Jumlah Dubber</b>
                                  <p class="text">
                                    {{$n->jumlah_dubber}}
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
