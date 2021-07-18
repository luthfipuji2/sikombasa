@extends('layouts.klien.sidebar')
@section('title','Status Order Teks')
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
@foreach ($order as $orders)
<div class="modal fade" id="detailModal{{$orders->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label>Jenis Teks</label>
                      <input type="text" value="{{$orders->parameterjenisteks->p_jenis_teks}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jenis Layanan</label>
                      <input type="text" value="{{$orders->parameterjenislayanan->p_jenis_layanan}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jumlah Karakter</label>
                      <input type="text" value="{{$orders->jumlah_karakter}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Durasi Pengerjaan</label>
                      <input type="text" value="{{$orders->durasi_pengerjaan}} Hari" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Harga</label>
                      <input type="text" value="{{$orders->harga}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Text Dari Klien</label>
                      <input type="text" value="{{$orders->text}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Text pengerjaan Translator</label>
                      @if(!empty($orders->text_trans))
                      <input type="text" value="{{$orders->text_trans}}" class="form-control" readonly>
                      @else 
                      <input type="text" value="" class="form-control" readonly>
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
@foreach ($order as $orders)
<div class="modal fade" id="perbaikanModal{{$orders->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" value="{{$orders->id_order}}" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Revisi Order Teks </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('revisi_order_teks', $orders->id_order)}}" method="post">
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
@foreach ($order as $orders)
<div class="modal fade" id="finishModal{{$orders->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Selesai Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('finish_order_teks', $orders->id_order)}}" method="post">
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
                      @if(!empty($orders->revisi->durasi_pengerjaan_revisi))
                        <label>Durasi Pengerjaan Revisi</label>
                        <input type="text" value="{{$orders->revisi->durasi_pengerjaan_revisi}} Hari" class="form-control" readonly>
                      @else
                      @endif
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($orders->revisi->pesan_revisi))
                        <label>Pesan Revisi</label>
                        <input type="text" value="{{$orders->revisi->pesan_revisi}}" class="form-control" readonly>
                      @else
                      @endif
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <label>Text Anda</label>
                        <input type="text" value="{{$orders->text}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      @if(!empty($orders->revisi->text_trans))
                      <label>Text Hasil Revisi Dari Translator</label>
                      <input type="text" value="{{$orders->revisi->text_revisi}}" class="form-control" readonly>
                      @else (empty($orders->revisi->text_trans))
                      <label>Text Pengerjaan Dari Translator</label>
                      <input type="text" value="{{$orders->text_trans}}" class="form-control" readonly>
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
                  <li><a href="order-interpreter/status" class=" text-center btn btn-primary">Offline</a></li>&nbsp;&nbsp;
                  <li><a href="order-transkrip/status" class=" text-center btn btn-primary">Transkrip</a></li>&nbsp;&nbsp;
                  <li><a href="/status-order-teks" class=" text-center btn btn-primary">Teks</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Subtitle</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Dubbing</a></li>&nbsp;&nbsp;
                  <li><a href="#" class=" text-center btn btn-primary">Document</a></li>&nbsp;&nbsp;
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
                        <td scope="row" class="text-center">{{$stat->order->created_at->format('Y-m-d')}} - {{$stat->id_order}}</td>

                        <!-- kolom status transaksi -->
                        <td scope="row" class="text-center">
                        @if(!empty($stat->status_transaksi == "Berhasil"))
                        <button type="button" class="badge badge-pill badge-success">Berhasil</button>
                            @elseif ($stat->status_transaksi == "Pending")
                            <button type="button" class="badge badge-pill badge-warning">Menunggu</button>
                                @elseif ($stat->status_transaksi == "Gagal")
                                <button type="button" class="badge badge-pill badge-danger" data-toggle="tooltip" data-html="true" title=" Belum Melakukan Pembayaran" onclick="myFunction()">
                                !    </button>
                        @endif
                        </td>

                        <!-- kolom status order -->
                        <td scope="row" class="text-center">
                        @if(!empty($stat->order->id_translator) && ($stat->status_transaksi == "Berhasil") && !empty($stat->order->text_trans) && empty($stat->order->revisi->id_revisi) || !empty($stat->order->revisi->text_revisi))
                        <button type="button" class="badge badge-pill badge-success">Sudah dikerjakan translator</button>
                          @elseif(!empty($stat->order->id_translator) && ($stat->status_transaksi == "Berhasil") && !empty($stat->order->revisi->id_revisi))
                          <button type="button" class="badge badge-pill badge-dark">Sedang Proses Revisi</button>
                              @elseif(!empty($stat->order->id_translator) && ($stat->status_transaksi == "Berhasil"))
                              <button type="button" class="badge badge-pill badge-primary">Sedang dikerjakan translator</button>
                                  @elseif(!empty($stat->order->id_translator == NULL) && ($stat->order->path_file_trans == NULL) && !empty($stat->status_transaksi == "Pending"))
                                  <button type="button" class="badge badge-pill badge-warning">Sedang Menunggu Translator</button>
                                      @elseif ($stat->status_transaksi == "Gagal")
                                      <button type="button" class="badge badge-pill badge-danger" data-toggle="tooltip" data-html="true" title=" Belum Melakukan Pembayaran" onclick="myFunction()">
                                      !    </button>
                        @endif
                        </td>

                        

                        <td scope="row" class="text-center">
                            <!-- jika layanan premium -->
                            @if(!empty($stat->order->text_trans) && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Premium") && empty($stat->order->revisi->id_revisi) && ($stat->order->status_at == "belum selesai"))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="revisi" title="Ajukan Perbaikan" data-toggle="modal" data-target="#perbaikanModal{{$stat->id_order}}">Revisi</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>
                            
                            @elseif(!empty($stat->order->revisi->id_revisi) && ($stat->order->status_at == "belum selesai") && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Premium") && !empty($stat->order->revisi->text_revisi))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>

                            @elseif(!empty($stat->order->revisi->id_revisi) && ($stat->order->status_at == "belum selesai") && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Premium") && empty($stat->order->revisi->text_revisi))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>

                            <!-- jika layanan basic -->
                            @elseif(!empty($stat->order->text_trans) && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Basic") && ($stat->order->status_at == "belum selesai"))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            <a type="button" class="finish" title="Selesai" data-toggle="modal" data-target="#finishModal{{$stat->id_order}}">Finish</a>
                            
                            @elseif(empty($stat->order->text_trans))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            
                            <!-- jika order sudah selesai -->
                            @elseif(!empty($stat->order->text_trans) && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Premium") && !empty($stat->order->revisi->id_revisi) && ($stat->order->status_at == "selesai"))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            @elseif(!empty($stat->order->text_trans) && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Premium") && !empty($stat->order->revisi->id_revisi) && ($stat->order->status_at == "selesai") || !empty($stat->order->revisi->text_revisi))
                            <a type="button" class="detail" title="Detail Order" data-toggle="modal" data-target="#detailModal{{$stat->id_order}}">Detail</a>
                            @elseif(!empty($stat->order->text_trans) && ($stat->order->parameterjenislayanan->p_jenis_layanan == "Basic") && ($stat->order->status_at == "selesai"))
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