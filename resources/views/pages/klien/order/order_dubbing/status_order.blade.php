@extends('layouts.klien.sidebar')
@section('title','Status Order Dubbing')
@section('content')

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- search -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!-- endsearch -->

<!-- Template Main CSS File -->
<link rel="stylesheet" href="{{ asset('css/detail_order.css') }}">

<!-- Modal Detail -->
@foreach ($status as $stat)
<div class="modal fade" id="detailModal{{$stat->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail daftar Dokumen </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" id="detailForm">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <div class="modal-body">
        <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Nama Translator</label>
                      @if(!empty($stat->id_translator))
                      <input type="text" value="{{$stat->translator->nama}}" class="form-control" readonly>
                      @elseif(!empty($stat->id_translator == NULL) && ($stat->path_file_trans == NULL) && ($stat->transaksi->status_transaksi == "Berhasil") || ($stat->transaksi->status_transaksi == "Pending"))
                      <input type="text" value="Sedang menunggu translator" class="form-control" readonly>
                      @elseif(!empty($stat->transaksi->status_transaksi == "Gagal"))
                      <input type="text" value="   " class="form-control" readonly>
                      @endif
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jenis Layanan</label>
                      <input type="text" value="{{$stat->parameterjenislayanan->p_jenis_layanan}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Durasi Pengerjaan</label>
                      <input type="text" value="{{$stat->durasi_pengerjaan}} Hari" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Harga</label>
                      <input type="text" value="{{$stat->harga}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Video</label>
                        <input type="text" value="{{$stat->nama_dokumen}}" class="form-control" readonly>
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Durasi Video</label>
                        <input type="text" value="{{(($stat->durasi_video/60)%60)}} Menit" class="form-control" readonly>
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jumlah Dubber</label>
                        <input type="text" value="{{$stat->jumlah_dubber}}" class="form-control" readonly>
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="path_file" class="col-sm-3 col-form-label">Download Video Klien</label>
                    <a href="/download-dubbing-klien/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($stat->revisi->path_file_revisi) && !empty($stat->path_file_trans))
                      <label>Dokumen Hasil Revisi Dari Translator</label>
                      <a href="/download-dubbing-revisi/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Dokumen</a>
                      @elseif (empty($stat->revisi->path_file_revisi) && !empty($stat->path_file_trans))
                      <label>Dokumen Pengerjaan Dari Translator</label>
                      <a href="/download-dubbing-translator/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Dokumen</a>
                      @elseif (empty($stat->revisi->path_file_revisi) && empty($stat->path_file_trans))
                      <label>Dokumen Pengerjaan Dari Translator</label>
                      <input type="text" value="Menunggu" class="form-control" readonly>
                      @endif
                  </div>           
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
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
<!-- selesai modal detail -->


<!-- Modal Perbaikan -->
@foreach ($status as $stat)
<div class="modal fade" id="perbaikanModal{{$stat->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" value="{{$stat->id_order}}" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Revisi Order Dubbing </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('revisi_order_dubbing', $stat->id_order)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <div class="modal-body">
        <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="durasi_pengerjaan_revisi">Durasi Pengerjaan Revisi</label>
                        <select class="form-control @error('durasi_pengerjaan_revisi') is-invalid @enderror" 
                            id="durasi_pengerjaan" placeholder="Durasi Pengerjaan Revisi" name="durasi_pengerjaan_revisi">
                            <option>Pilih Durasi Pengerjaan Revisi</option>  
                            <option value="1">1 Day</option>
                              <option value="2">2 Day</option>
                              <option value="3">3 Day</option>
                              <option value="4">4 Day</option>
                        </select>
                        @error ('durasi_pengerjaan_revisi')
                          <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                  </div>           
                </div>
                <div class="col-md-6">
                <label for="durasi_pengerjaan">Pesan Revisi</label>
                  <div class="form-group">
                      <textarea type="pesan_revisi" class="form-control @error('text') is-invalid @enderror" id="pesan_revisi" placeholder="Tulis pesan revisi disini"  name="pesan_revisi" required></textarea>
                      @error('pesan_revisi')
                          <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                  </div>
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
        <!-- /.content -->            
              </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- selesai modal perbaikan -->


<!-- Modal selesai -->
@foreach ($status as $stat)
<div class="modal fade" id="finishModal{{$stat->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Selesai Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('finish_order_dubbing', $stat->id_order)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <div class="modal-body">
        <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- left column -->

                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($stat->revisi->durasi_pengerjaan_revisi))
                        <label>Durasi Pengerjaan Revisi</label>
                        <input type="text" value="{{$stat->revisi->durasi_pengerjaan_revisi}} Hari" class="form-control" readonly>
                      @else
                      @endif
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($stat->revisi->pesan_revisi))
                        <label>Pesan Revisi</label>
                        <input type="text" value="{{$stat->revisi->pesan_revisi}}" class="form-control" readonly>
                      @else
                      @endif
                  </div>           
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="path_file" class="col-sm-3 col-form-label">Download Video Klien</label>
                    <a href="/download-dubbing-klien/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($stat->revisi->path_file_revisi))
                      <label>Video Hasil Revisi Dari Translator</label>
                      <a href="/download-dubbing-revisi/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                      @else (empty($stat->revisi->path_file_revisi))
                      <label>Video Pengerjaan Dari Translator</label>
                      <a href="/download-dubbing-translator/{{$stat->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                      @endif
                  </div>           
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
        <!-- /.content -->            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Finish Order</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!-- selesai modal Selesai -->

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
                <li><a href="order-interpreter/status" class=" text-center btn btn-primary">Bertemu Langsung</a></li>&nbsp;&nbsp;
                  <li><a href="order-transkrip/status" class=" text-center btn btn-primary">Transkrip</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-teks" class=" text-center btn btn-primary">Teks</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-subtitle" class=" text-center btn btn-primary">Subtitle</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-dubbing" class=" text-center btn btn-primary">Dubbing</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-dokumen" class=" text-center btn btn-primary">Dokumen</a></li>&nbsp;&nbsp;
                </ul>

        <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <button type="submit" value="Refresh Page" onClick="document.location.reload(true)"  class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></button>
                    </div>
                </div>
            </div>
            <div class="table-filter" id="example" class="display">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Show</span>
                            <select class="form-control">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-sm-9">

                        
                        <div class="filter-group">
                            <label>Search</label>
                            <input id="myInput" type="text">   <i class="fa fa-search"></i>
                        </div>
                        
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="row" class="text-center">#</th>
                        <th scope="row" class="text-center">Nomor Pendaftaran</th>
                        <th scope="row" class="text-center">Status Transaksi</th>
                        <th scope="row" class="text-center">Status Order</th>
                        <th scope="row" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                @foreach ($status as $stat)
                    <tr>
                        <td scope="row" class="text-center">{{$loop->iteration}}</td>
                        <td scope="row" class="text-center">{{$stat->created_at->format('Y-m-d')}} - {{$stat->id_order}}</td>

                        <!-- kolom status transaksi -->
                        <td scope="row" class="text-center">
                        @if(!empty($stat->status_transaksi == "Berhasil"))
                        <button type="button" class="badge-pill badge-success">Berhasil</button>
                            @elseif ($stat->status_transaksi == "Pending")
                            <button type="button" class="badge-pill badge-warning">Menunggu</button>
                                @elseif ($stat->status_transaksi == "Gagal")
                                <button type="button" class="badge-pill badge-danger" data-toggle="tooltip" data-html="true" onclick="myFunction()">
                                !    </button>
                        @endif
                        </td>

                        <!-- kolom status order -->
                        <td scope="row" class="text-center">
                        @if(!empty($stat->id_translator) && ($stat->status_transaksi == "Berhasil") && !empty($stat->path_file_trans) && empty($stat->revisi->id_revisi) || !empty($stat->revisi->path_file_revisi))
                        <button type="button" class="badge-pill badge-success">Sudah dikerjakan translator</button>
                          @elseif(!empty($stat->id_translator) && ($stat->status_transaksi == "Berhasil") && !empty($stat->revisi->id_revisi))
                          <button type="button" class="badge-pill badge-dark">Sedang Proses Revisi</button>
                              @elseif(!empty($stat->id_translator) && ($stat->status_transaksi == "Berhasil"))
                              <button type="button" class="badge-pill badge-primary">Sedang dikerjakan translator</button>
                                  @elseif(!empty($stat->id_translator == NULL) && ($stat->path_file_trans == NULL) && !empty($stat->status_transaksi == "Pending") || !empty($stat->status_transaksi == "Berhasil"))
                                  <button type="button" class="badge-pill badge-warning">Sedang Menunggu Translator</button>
                                      @elseif ($stat->status_transaksi == "Gagal")
                                      <button type="button" class="badge-pill badge-danger" data-toggle="tooltip" data-html="true" onclick="myFunction()">
                                      !    </button>
                        @endif
                        </td>

                        

                        <td scope="row" class="text-center">
                            <!-- jika layanan premium -->
                            @if(!empty($stat->path_file_trans) && ($stat->parameterjenislayanan->p_jenis_layanan == "Premium") && empty($stat->revisi->id_revisi) && ($stat->status_at == "belum selesai"))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="revisi" title="Ajukan Perbaikan" data-toggle="modal" data-target="#perbaikanModal{{$stat->id_order}}">Revisi</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>
                            
                            @elseif(!empty($stat->revisi->id_revisi) && ($stat->status_at == "belum selesai") && ($stat->parameterjenislayanan->p_jenis_layanan == "Premium") && !empty($stat->revisi->path_file_revisi))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>

                            @elseif(!empty($stat->revisi->id_revisi) && ($stat->status_at == "belum selesai") && ($stat->parameterjenislayanan->p_jenis_layanan == "Premium") && empty($stat->revisi->path_file_revisi))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>

                            <!-- jika layanan basic -->
                            @elseif(!empty($stat->path_file_trans) && ($stat->parameterjenislayanan->p_jenis_layanan == "Basic") && ($stat->status_at == "belum selesai"))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>
                            
                            @elseif(empty($stat->path_file_trans))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            
                            <!-- jika order sudah selesai -->
                            @elseif(!empty($stat->path_file_trans) && ($stat->parameterjenislayanan->p_jenis_layanan == "Premium") && empty($stat->revisi->id_revisi) && ($stat->status_at == "selesai")|| !empty($stat->review->id_review))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            @elseif(!empty($stat->path_file_trans) && ($stat->parameterjenislayanan->p_jenis_layanan == "Premium") && !empty($stat->revisi->id_revisi) && ($stat->status_at == "selesai") || !empty($stat->revisi->path_file_revisi)|| !empty($stat->review->id_review))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            @elseif(!empty($stat->path_file_trans) && ($stat->parameterjenislayanan->p_jenis_layanan == "Basic") && ($stat->status_at == "selesai")|| !empty($stat->review->id_review))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
        
    </div>    
</div>     
</body>
@endsection
@push('scripts')
    <script>
        function reloadpage()
        {
        location.reload()
        }
    </script>
@endpush



@push('scripts')
<script>
function myFunction() {
  alert("Transaksi gagal, silahkan selesaikan transaksi terlebih dahulu");
}
</script>
@endpush