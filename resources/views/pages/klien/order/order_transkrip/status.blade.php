@extends('layouts.klien.sidebar_show')
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
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$z->p_harga}}</span>
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
                                  <b>Durasi Audio</b>
                                  <p class="text-muted">
                                    {{(($z->durasi_audio/60)%60)}} menit
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
                              <b>Nama File</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-microphone-alt"></i> {{$z->nama_dokumen}}</a>
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
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$y->p_harga}}</span>
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
                                  <b>Durasi Audio</b>
                                  <p class="text-muted">
                                  {{(($y->durasi_audio/60)%60)}} menit
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
                              <b>Nama File</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-microphone-alt"></i> {{$y->nama_dokumen}}</a>
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
                  <th scope="row" class="text-center" hidden>ID</th>
                  <th scope="row" class="text-center">Tanggal Order</th>
                  <th scope="row" class="text-center">Tanggal Transaksi</th>
                  <th scope="row" class="text-center">Status</th>
                  <th scope="row" class="text-center" style="width: 100px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($status1 as $z)
                <tr>
                  <td scope="row" class="text-center" hidden>{{$z->id_order}}</td>
                  <td scope="row" class="text-center">{{$z->tgl_order}}</td>
                  <td scope="row" class="text-center">{{$z->tgl_transaksi}}</td>
                  <td scope="row" class="text-center">
                        <span class=" text-danger"><i class="fas fa-arrow-up"></i>
                        <span class="badge badge-danger">Sedang Mencari Translator</span>
                  </td>
                  <td scope="row" class="text-center">
                    <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$z->id_transaksi}}"><i class="fas fa-eye"></i></button>
                  </td>
                </tr>
                @endforeach
                @foreach($status2 as $y)
                <tr>
                  <td scope="row" class="text-center" hidden>{{$y->id_order}}</td>
                  <td scope="row" class="text-center">{{$y->tgl_order}}</td>
                  <td scope="row" class="text-center">{{$y->tgl_transaksi}}</td>
                  <td scope="row" class="text-center">
                      <span class=" text-cyan"><i class="fas fa-running fa-2x"></i>
                      <span class="badge badge-primary"> Order Sedang Berjalan</span></span>
                  </td>
                  <td scope="row" class="text-center">
                    <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$y->id_transaksi}}"><i class="fas fa-eye"></i></button>
                  </td>
                </tr>
                @endforeach
                @foreach($status3 as $x)
                <tr>
                  <td scope="row" class="text-center" hidden>{{$x->id_order}}</td>
                  <td scope="row" class="text-center">{{$x->tgl_order}}</td>
                  <td scope="row" class="text-center">{{$x->tgl_transaksi}}</td>
                  <td scope="row" class="text-center">
                      <span class=" text-green"><i class="far fa-check-circle fa-2x"></i>
                      <span class="badge badge-success"> Order Selesai</span></span>
                  </td>
                  <td scope="row" class="text-center">
                    <a href="{{route('detail-status-order', $x->id_order)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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
