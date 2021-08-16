@extends('layouts.klien.run')
@section('title','Status Order Bertemu Langsung')
@section('content')


<!-- Modal Detail Status-->
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
                                <span class="info-box-text text-center ">Pemesan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$a->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Total Order</span>
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$a->p_harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                              @if(!empty($a->id_translator))
                                <span class="info-box-text text-center">Penerjemah</span>
                                <span class="info-box-number text-center text-success mb-0">{{$a->translator->nama}}</span>
                              @elseif (empty($a->id_translator))
                                <span class="info-box-text text-center">Tanggal Transaksi</span>
                                <span class="info-box-number text-center text-red mb-0">{{date('d-m-Y', strtotime($a->tgl_transaksi))}}</span>
                              @endif
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
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$a->parameter_order->p_durasi_pertemuan}} Hari
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b>Jenis Menu Offline</b>
                                  <p class="text-muted">
                                    {{$a->tipe_offline}}
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b>Detail Lokasi</b>
                                  <p class="text-muted">
                                    {{$a->lokasi}}
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b> Jarak Tempuh</b>
                                  <p class="text-muted">
                                  {{(sqrt(((($a->latitude)-(-7.5595028))*(($a->latitude)-(-7.5595028)))+((($a->longitude)-(110.8362403))*(($a->longitude)-(110.8362403))))*111.319%1000)}} Km
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b>Tanggal Pertemuan</b>
                                  <p class="text-muted">
                                    {{$a->tanggal_pertemuan}}
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b>Waktu Pertemuan</b>
                                  <p class="text-muted">
                                  {{date('H:i', strtotime($a->waktu_pertemuan))}}
                                  </p>
                              </div>
                              @if (!empty($a->path_file_trans))
                              <div class="user-block">
                                <b>Download Bukti Bertemu Langsung</b>
                                <ul class="list-unstyled">
                                  <li>
                                  <a href="/order-interpreter-download/{{$a->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Bukti Bertemu </a>
                                  </li>
                                </ul>
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


<!-- Modal Selesai -->
@foreach ($status1 as $selesai)
<div class="modal fade" id="selesai{{$selesai->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel">Pernyataan Order Selesai </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('order-interpreter-selesai', $selesai->id_order)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <div class="modal-body">
        <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                Apakah Anda Yakin Order Anda Telah Selesai ?
              </div>
            </div>
          </section>           
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Finish</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- Selesai -->

<!-- Halaman Utama -->
<div class="container">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li><a href="{{ url ('order-interpreter/status') }}" class=" text-center btn btn-primary">Bertemu Langsung</a></li>&nbsp;&nbsp;
                <li><a href="{{ url ('order-transkrip/status') }}" class=" text-center btn btn-primary">Transkrip</a></li>&nbsp;&nbsp;
                <li><a href="/status-order-teks" class=" text-center btn btn-primary">Teks</a></li>&nbsp;&nbsp;
                <li><a href="/status-order-subtitle" class=" text-center btn btn-primary">Subtitle</a></li>&nbsp;&nbsp;
                <li><a href="/status-order-dubbing" class=" text-center btn btn-primary">Dubbing</a></li>&nbsp;&nbsp;
                <li><a href="/status-order-dokumen" class=" text-center btn btn-primary">Dokumen</a></li>&nbsp;&nbsp;
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="mydatatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center">No.</th>
                    <th scope="row" class="text-center">No. Order</th>
                    <th scope="row" class="text-center">Tanggal Order</th>
                    <th scope="row" class="text-center">Keterangan Transaksi</th>
                    <th scope="row" class="text-center">Status Order</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($status1 as $s1)
                  <tr>
                    <td scope="row" class="text-center">{{$loop->iteration}}</td>
                    <td scope="row" class="text-center">BL{{date('dmy', strtotime($s1->tgl_order))}}{{$s1->id_order}}</td>
                    <td scope="row" class="text-center">{{date('Y-m-d', strtotime($s1->tgl_order))}}</td>
                    <td scope="row" class="text-center"><small class="badge badge-secondary"><i class="far fa-clock"></i>&nbsp;{{$s1->status_transaksi}}</small></td>
                    @if(!empty($s1->id_translator) && ($s1->path_file_trans) && ($s1->status_transaksi == "Berhasil"))
                    <td scope="row" class="text-center">
                        <span class=" text-green"><i class="far fa-check-circle fa-2x"></i>
                        <span class="badge badge-success"> Order Selesai</span></span>
                    </td>
                    @elseif ($s1->status_transaksi == "Gagal")
                    <td scope="row" class="text-center">
                          <span class=" text-danger"><i class="fas fa-times fa-2x"></i>
                          <span class="badge badge-danger">Order Tidak Di Proses</span>
                    </td>
                    @elseif(!empty($s1->id_translator) && ($s1->status_transaksi == "Berhasil"))
                    <td scope="row" class="text-center">
                        <span class=" text-cyan"><i class="fas fa-running fa-2x"></i>
                        <span class="badge badge-primary"> Order Sedang Berjalan</span></span>
                    </td>
                    @elseif(!empty($s1->id_translator == NULL) && ($s1->path_file_trans == NULL) && !empty($s1->status_transaksi == "Pending") || !empty($s1->status_transaksi == "Berhasil"))
                    <td scope="row" class="text-center">
                          <span class=" text-danger"><i class="fas fa-arrow-up fa-2x"></i>
                          <span class="badge badge-danger">Sedang Mencari Translator</span>
                    </td>
                    @endif
                    <td scope="row" class="text-center">
                      @if(!empty($s1->id_translator) && ($s1->path_file_trans) && ($s1->status_at == "selesai"))
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$s1->id_transaksi}}"><i class="fas fa-eye"></i></button>
                      @elseif(!empty($s1->id_translator) && ($s1->path_file_trans) && ($s1->status_at == "belum selesai"))
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$s1->id_transaksi}}"><i class="fas fa-eye"></i></button>
                      <a type="button" class="btn btn-sm btn-danger" title="Selesai" data-toggle="modal" data-target="#selesai{{$s1->id_order}}"><i class="fas fa-check"></i> Finish</a>
                      @elseif(!empty($s1->id_translator)&& ($s1->path_file_trans == NULL) && ($s1->status_at == "belum selesai"))
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$s1->id_transaksi}}"><i class="fas fa-eye"></i></button>
                      @elseif(!empty($s1->id_translator== NULL)&& ($s1->path_file_trans == NULL) && ($s1->status_at == "belum selesai"))
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$s1->id_transaksi}}"><i class="fas fa-eye"></i></button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tfoot>
                </table>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready( function () {
      $('#mydatatable').DataTable();
  } );
</script>
@endpush