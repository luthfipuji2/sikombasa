@extends('layouts.klien.sidebar')
@section('title','Status Order Bertemu Langsung')
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
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$a->p_harga}}</span>
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
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$b->p_harga}}</span>
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

<!-- Modal Detail Status 3-->
@foreach ($status3 as $c)
<div class="modal fade" id="detail{{$c->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$c->id_transaksi}}">

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
                                <span class="info-box-number text-center text-blue mb-0">{{$c->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Total Order</span>
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{$c->p_harga}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Status Transaksi</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$c->status_transaksi}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Jenis Layanan</span>
                                <span class="info-box-number text-center text-blue mb-0">{{$c->jenis_layanan}}</span>
                              </div>
                            </div>
                          </div>
                      </div>
                      
                        <div class="col-12">
                            <div class="post">
                              @if (!empty($c->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$c->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($c->tipe_offline))
                              <div class="user-block">
                                  <b>Jenis Menu Offline</b>
                                  <p class="text-muted">
                                    {{$c->tipe_offline}}
                                  </p>
                              </div>
                              @endif
                              @if (!empty($c->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$c->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($c->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$c->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($c->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$c->lokasi}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($c->jarak))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$c->jarak}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($c->tanggal_pertemuan))
                              <div class="user-block">
                                  <b>Tanggal Pertemuan</b>
                                  <p class="text-muted">
                                    {{$c->tanggal_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($c->waktu_pertemuan))
                              <div class="user-block">
                                  <b>Waktu Pertemuan</b>
                                  <p class="text-muted">
                                    {{$c->waktu_pertemuan}}
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
                <li><a href="{{ url ('order-interpreter/status') }}" class="text-center btn btn-primary" type="submit" class="text-right" style="float: right;">Bertemu Langsung</a></li>&nbsp;&nbsp;
                <li><a href="{{ url ('order-transkrip/status') }}" class="text-center btn btn-primary" type="submit" class="text-right" style="float: right;">Transkrip</a></li>&nbsp;&nbsp;
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
                  @foreach($status1 as $s1)
                  <tr>
                    <td scope="row" class="text-center" hidden>{{$s1->id_order}}</td>
                    <td scope="row" class="text-center">{{$s1->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$s1->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">
                          <span class=" text-danger"><i class="fas fa-arrow-up"></i>
                          <span class="badge badge-danger">Sedang Mencari Translator</span>
                    </td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$a->id_transaksi}}"><i class="fas fa-eye"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  @foreach($status2 as $s2)
                  <tr>
                    <td scope="row" class="text-center" hidden>{{$s2->id_order}}</td>
                    <td scope="row" class="text-center">{{$s2->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$s2->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">
                        <span class=" text-cyan"><i class="fas fa-running fa-2x"></i>
                        <span class="badge badge-primary"> Order Sedang Berjalan</span></span>
                    </td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$b->id_transaksi}}"><i class="fas fa-eye"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  @foreach($status3 as $s3)
                  <tr>
                    <td scope="row" class="text-center" hidden>{{$s3->id_order}}</td>
                    <td scope="row" class="text-center">{{$s3->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$s3->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">
                        <span class=" text-green"><i class="far fa-check-circle fa-2x"></i>
                        <span class="badge badge-success"> Order Selesai</span></span>
                    </td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#detail{{$c->id_transaksi}}"><i class="fas fa-eye"></i></button>

                    </td>
                  </tr>
                  @endforeach
                </tfoot>
                </table>
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
@push('scripts')
<script>
  $(document).ready( function () {
      $('#mydatatable').DataTable();
  } );
</script>
@endpush