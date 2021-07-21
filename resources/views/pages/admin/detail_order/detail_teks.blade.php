@extends('layouts/admin/template')

@section('title', 'Detail Order Teks')

@section('container')

<!-- Vendor CSS Files -->
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
                <label>Nama Klien</label>
                <input type="text" value="{{$orders->klien->user->name}}" class="form-control" readonly>
            </div>           
          </div>
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
                <input type="text" value="{{$orders->text_trans}}" class="form-control" readonly>
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

<div class="container">
        <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
        </div>
        </div>
        <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <button type="submit" value="Refresh Page" onClick="document.location.reload(true)"  class="btn btn-primary"><span>Refresh List</span></button>
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
                        <th scope="row" class="text-center">Nama Klien</th>
                        <th scope="row" class="text-center">Nama Translator</th>
                        <th scope="row" class="text-center">Status Transaksi</th>
                        <th scope="row" class="text-center">Status Order</th>
                        <th scope="row" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                @foreach ($order as $orders)
                    <tr>
                        <td scope="row" class="text-center">{{$loop->iteration}}</td>
                        <td scope="row" class="text-center">{{$orders->created_at->format('Y-m-d')}} - {{$orders->id_order}}</td>
                        <td scope="row" class="text-center">{{$orders->klien->user->name}}</td>

                        <!-- kolom nama translator -->
                        <td scope="row" class="text-center">
                          @if(!empty($orders->id_translator))
                            {{$orders->translator->nama}}
                              @elseif(!empty($orders->id_translator == NULL) && ($orders->path_file_trans == NULL) && !empty($orders->transaksi->status_transaksi))
                              <button type="button" class="badge-pill badge-warning" data-toggle="tooltip" data-html="true" title=" Menunggu" onclick="warning()">
                                      !    </button><p class="font-weight text-orange">Menunggu</p>
                              @elseif(empty($orders->transaksi))
                              <button type="button" class="badge-pill badge-danger" data-toggle="tooltip" data-html="true" title=" Belum Melakukan Pembayaran" onclick="danger()">
                                      !    </button><p class="font-weight text-red">Menunggu</p>
                          @endif
                        </td>

                        <!-- kolom status transaksi -->
                        <td scope="row" class="text-center">
                        @if(!empty($orders->is_status == "belum dibayar") && ($orders->is_status == NULL) )
                        <span class="status text-warning">&bull;</span>Belum Dibayar
                          @elseif($orders->transaksi)
                            @if($orders->transaksi->status_transaksi == "Berhasil")
                              <span class="status text-success">&bull;</span>Transaksi Berhasil
                                @else($orders->transaksi->status_transaksi == "Pending")
                                <span class="status text-warning">&bull;</span>Menunggu
                            @endif
                          @else
                            <span class="status text-danger">&bull;</span>Gagal
                          
                        @endif
                        </td>

                        <!-- kolom status order -->
                        <td scope="row" class="text-center">
                        @if(!empty($orders->id_translator) && ($orders->transaksi->status_transaksi == "Berhasil") && !empty($orders->text_trans))
                        Selesai
                          @elseif(!empty($orders->id_translator) && ($orders->transaksi->status_transaksi == "Berhasil"))
                          Sedang dikerjakan translator
                            @elseif(!empty($orders->path_file_trans == NULL) && ($orders->id_translator == NULL) && ($orders->transaksi))
                            Menunggu Translator
                              @else
                              <button type="button" class="badge-pill badge-danger" data-toggle="tooltip" data-html="true" title=" Belum Melakukan Pembayaran" onclick="danger()">
                                      !    </button>
                            @endif
                        </td>

                        <td>
                            <a type="button" class="view" title="View Details" data-toggle="modal" data-target="#detailModal{{$orders->id_order}}"><i class="fas fa-sign-in-alt material-icons"></i></a><p class="font-weight-bold text-blue">Detail</p>
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
        <td>
            <a href="daftar-order" type="button" class="btn btn-outline-primary">Kembali</a>
        </td>    
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
        $(document).ready(function() {
            $('#example').DataTable( {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            } );
        } );
    </script>
@endpush

@push('scripts')
<script>
function danger() {
  alert("Transaksi gagal, silahkan selesaikan transaksi terlebih dahulu");
}
</script>
@endpush

@push('scripts')
<script>
function warning() {
  alert("Transaksi gagal, silahkan selesaikan transaksi terlebih dahulu");
}
</script>
@endpush

@push('scripts')
<script>
  function myFunction() {
    alert('Button was clicked!');
  }
</script>
@endpush

@push('addon-script')
<script>
  $(document).ready(function() {
            $('#pelaporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                  { "extend": 'excel', "text":'Export Excel',"className": 'btn btn-outline-success fas fa-file-excel' },
                  { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL', className:'btn btn-outline-primary fa fa-book', text:'Export PDF '},
                  { "extend": 'print', "text":'Print',"className": 'btn btn-outline-danger fa fa-print' },
                ]
            });
        } );
</script>
@endpush