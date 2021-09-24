@extends('layouts.klien.run')
@section('title','Status Order Transkrip (Audio)')
@section('content')


<!-- Modal Detail Status-->
@foreach ($status_transkrip as $z)
<div class="modal fade" id="detail{{$z->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-blue" id="exampleModalLabel"><i class="fab fa-shopify"></i> Detail Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detail{{$z->id_order}}">

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
                                <span class="info-box-number text-center text-blue mb-0">{{$z->name}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                                <span class="info-box-text text-center">Harga</span>
                                <span class="info-box-number text-center text-blue mb-0">Rp. {{($z->p_harga)/1000}}.000</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div class="info-box-content">
                              @if(!empty($z->id_translator))
                                <span class="info-box-text text-center">Penerjemah</span>
                                <span class="info-box-number text-center text-success mb-0">{{$z->translator->nama}}</span>
                                <span  class="info-box-number text-center mb-0">
                                @if((($rating)/10000*10000)=='1')
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  @endif
                                  @if((($rating)/10000*10000)=='2')
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  @endif
                                  @if((($rating)/10000*10000)=='3')
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  @endif
                                  @if((($rating)/10000*10000)=='4')
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  @endif
                                  @if((($rating)/10000*10000)=='5')
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  <i class="nav-icon fas fa-star text-yellow"></i>
                                  @endif
                                </span>
                              @elseif (empty($z->id_translator))
                                <span class="info-box-text text-center">Tanggal Transaksi</span>
                                <span class="info-box-number text-center text-red mb-0">{{date('d-m-Y', strtotime($z->tgl_transaksi))}}</span>
                              @endif
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
                              <div class="user-block">
                                  <b>Durasi Audio</b>
                                  <p class="text-muted">
                                    {{(($z->durasi_audio/60)%60)}} menit
                                  </p>
                              </div>
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$z->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              <b>Nama File</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-microphone-alt"></i> {{$z->nama_dokumen}}</a>
                                </li>
                              </ul>
                              @if (!empty($z->path_file_trans))
                              <b>Download Hasil Terjemahan</b>
                              <ul class="list-unstyled">
                                <li>
                                <a href="/order-transkrip-download/{{$z->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Hasil Terjemahan </a>
                                </li>
                              </ul>
                              @endif
                              @if (!empty($z->revisi->path_file_revisi))
                              <b>Download Hasil Revisi</b>
                              <ul class="list-unstyled">
                                <li>
                                <a href="/order-transkrip/revisi-download/{{$z->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Hasil Revisi </a>
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

<!-- Modal Revisi -->
@foreach ($status_transkrip as $rev)
<div class="modal fade" id="revisi{{$rev->id_order}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel">Pengajuan Revisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/order-transkrip/revisi" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$rev->id_order}}" hidden>
            
            <div class="form-group">
                <label for="nama">Pesan Revisi</label>
                <input type="text" class="form-control @error('pesan_revisi') is-invalid @enderror" name="pesan_revisi" id="pesan_revisi" placeholder="Tuliskan Pesan Bagian Yang Harus Direvisi">
                @error('pesan_revisi')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                    @enderror    
            </div>
            <div class="form-group">
                <label for="nama">Durasi Pengerjaan</label>
                    <select class="form-control @error('durasi_pengerjaan_revisi') is-invalid @enderror" 
                    id="durasi_pengerjaan_revisi" placeholder="Durasi Pengerjaan Revisi" name="durasi_pengerjaan_revisi">
                    <option value="">--Pilih Durasi Pengerjaan Revisi--</option>
                    <option value="1">1 Hari</option>
                    <option value="2">2 Hari</option>
                    <option value="3">3 Hari</option>
                    </select>
                    @error ('durasi_pengerjaan_revisi')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
            </div>
        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endforeach

<!-- Modal Selesai -->
@foreach ($status_transkrip as $selesai)
<div class="modal fade" id="selesai{{$selesai->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel">Pernyataan Order Selesai </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('order-transkrip-selesai', $selesai->id_order)}}" method="post">
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
                  <th scope="row" class="text-center">No.</th>
                  <th scope="row" class="text-center">No. Order</th>
                  <th scope="row" class="text-center">Tanggal Order</th>
                  <th scope="row" class="text-center">Keterangan Transaksi</th>
                  <th scope="row" class="text-center">Status Order</th>
                  <th scope="row" class="text-center" style="width: 100px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($status_transkrip as $s1)
                <tr>
                <td scope="row" class="text-center">{{$loop->iteration}}</td>
                    <td scope="row" class="text-center">TR{{date('dmy', strtotime($s1->tgl_order))}}{{$s1->id_order}}</td>
                    <td scope="row" class="text-center">{{date('Y-m-d', strtotime($s1->tgl_order))}}</td>
                    <td scope="row" class="text-center"><small class="badge badge-secondary"><i class="far fa-clock"></i>&nbsp;{{$s1->status_transaksi}}</small></td>
                    <td scope="row" class="text-center">
                    @if(!empty($s1->status_transaksi == "Berhasil") && !empty($s1->path_file_trans) && empty($s1->revisi->id_revisi) || !empty($s1->revisi->path_file_revisi))
                      <span class=" text-green"><i class="far fa-check-circle fa-2x"></i>
                      <span class="badge badge-success"> Order Selesai</span></span>
                    @elseif(!empty($s1->status_transaksi == "Berhasil") && !empty($s1->path_file_trans) && !empty($s1->revisi->id_revisi))
                      <span class=" text-orange"><i class="fas fa-running fa-2x"></i>
                      <span class="badge badge-danger"> Order Sedang Proses Revisi</span></span>
                    @elseif(!empty($s1->id_translator) && ($s1->status_transaksi == "Berhasil"))
                      <span class=" text-cyan"><i class="fas fa-running fa-2x"></i>
                      <span class="badge badge-primary"> Order Sedang Di Proses</span></span>
                    @elseif(empty($s1->id_translator) && empty($s1->path_file_trans) && !empty($s1->status_transaksi == "Pending") || !empty($s1->status_transaksi == "Berhasil"))
                      <span class=" text-red"><i class="fas fa-arrow-up fa-2x"></i>
                      <span class="badge badge-danger">Sedang Mencari Translator</span>
                    @elseif ($s1->status_transaksi == "Gagal")
                      <span class=" text-red"><i class="fas fa-times fa-2x"></i>
                      <span class="badge badge-danger">Order Tidak Di Proses</span>
                    @endif
                    </td>
                    <td scope="row" class="text-center"> <!--Buttons-->
                    <!-- Premium -->
                    <!-- Untuk order yang telah selesai namun tidak mengajukan revisi && untuk order yang telah selesai dan revisi telah selesai juga, namun belum konfirmasi selesai -->
                    @if(!empty($s1->status_at == "belum selesai") && empty($s1->revisi->id_revisi) && !empty($s1->path_file_trans) && ($s1->parameter_order->p_jenis_layanan == "Premium"))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#revisi{{$s1->id_order}}"><i class="fas fa-cog"></i></button>
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#selesai{{$s1->id_order}}"><i class="fas fa-check"></i></a>   
                    
                    <!-- Untuk order yang telah selesai mengajukan revisi, namun belum konfirmasi selesai -->
                    @elseif(!empty($s1->status_at == "belum selesai") && ($s1->parameter_order->p_jenis_layanan == "Premium") && !empty($s1->revisi->path_file_revisi))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                      <a type="button" class="btn btn-sm btn-danger" title="Selesai" data-toggle="modal" data-target="#selesai{{$s1->id_order}}"><i class="fas fa-check"></i></a>
                    
                    <!--Untuk order yang hasil revisi belum selesai-->
                    @elseif(!empty($s1->revisi->id_revisi) && ($s1->status_at == "belum selesai") && ($s1->parameter_order->p_jenis_layanan == "Premium") && empty($s1->revisi->path_file_revisi))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                    
                    <!-- Untuk order yang telah selesai, tidak mengajukan revisi dan telah konfirmasi selesai-->
                    @elseif(!empty($s1->path_file_trans) && ($s1->parameter_order->p_jenis_layanan == "Premium") && empty($s1->revisi->id_revisi) && ($s1->status_at == "selesai"))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                    
                    <!--Untuk order yang telah selesai dan pengajuan revisi juga selesai, dan sudah konfirmasi selesai -->
                    @elseif(!empty($s1->path_file_trans) && ($s1->parameter_order->p_jenis_layanan == "Premium") && !empty($s1->revisi->path_file_revisi) && ($s1->status_at == "selesai"))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                      
                    <!-- Basic -->
                    <!--Untuk order yang telah selesai namun belum konfirmasi selesai -->
                    @elseif(!empty($s1->path_file_trans) && ($s1->parameter_order->p_jenis_layanan == "Basic") && ($s1->status_at == "belum selesai"))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
                      <a type="button" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#selesai{{$s1->id_order}}"><i class="fas fa-check"></i></a>
                    <!--Untuk order yang belum selesai dikerjakan -->
                    @elseif(empty($s1->path_file_trans))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>   
                    <!--Untuk order yang telah selesai dikerjakan dan telah konfirmasi selesai -->
                    @elseif(!empty($s1->path_file_trans) && ($s1->parameter_order->p_jenis_layanan == "Basic") && ($s1->status_at == "selesai"))
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail{{$s1->id_order}}"><i class="fas fa-eye"></i></button>
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
