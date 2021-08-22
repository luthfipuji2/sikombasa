@extends('layouts/admin/template')
@section('title', 'Detail Order Interpreter')
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
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Order Interpreter </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" id="detailForm">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="modal-body">
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Nama Klien</label>
                      <input type="text" value="{{$orders->klien->user->name}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jenis Layanan</label>
                      <input type="text" value="{{$orders->jenis_layanan}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jarak</label>
                      <input type="text" value="{{(sqrt(((($orders->latitude)-(-7.5595028))*(($orders->latitude)-(-7.5595028)))+((($orders->longitude)-(110.8362403))*(($orders->longitude)-(110.8362403))))*111.319%1000)}} Km" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Durasi Pertemuan</label>
                      <input type="text" value="{{$orders->parameter_order->p_durasi_pertemuan}} Hari" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Tipe Offline</label>
                      <input type="text" value="{{$orders->tipe_offline}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Tanggal Bertemu</label>
                      <input type="text" value="{{$orders->tanggal_pertemuan}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Waktu Bertemu</label>
                      <input type="text" value="{{$orders->waktu_pertemuan}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Biaya</label>
                      <input type="text" value="Rp. {{($orders->parameter_order->p_harga)/1000}}.000" class="form-control" readonly>
                  </div>           
                </div>
                @if(!empty($orders->path_file_trans))
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Download Bukti Bertemu</label>
                    <a href="/det-order-interpreter-download/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download</a>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </section> 
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>         
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Edit -->
@foreach($order as $edit)
<div class="modal fade" id="editInterpreter{{$edit->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel">Change Your Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('edit-order-interpreter', $edit->id_order)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
          <input type="text" name="idorder" value="{{$edit->id_order}}" hidden></td>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jenis_layanan">Jenis Layanan</label>
                    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$edit->parameter_order->p_jenis_layanan}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="jenis_layanan">Durasi Pertemuan</label>
                    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$edit->parameter_order->p_durasi_pertemuan}}" readonly>
                  </div>
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-cyan">
                      &nbsp;
                      <i class="nav-icon fas fa-medal"></i>
                      <i class="nav-icon fas fa-medal"></i>
                      <i class="nav-icon fas fa-medal"></i>
                      &nbsp;
                      <b>Basic</b>
                    </div>
                    <input type="text" name="p_jenis_layanan2" value="Basic" hidden>
                    <select class="form-control @error('id_parameter_order') is-invalid @enderror" id="id_parameter_order" name="id_parameter_order2">
                      <option value="">--Pilih Durasi Pertemuan--</option>
                      @foreach ($basic as $b)
                      <option value="{{$b->id_parameter_order}}">{{$b->p_durasi_pertemuan}}</option>
                      @endforeach
                    </select>
                    @error ('id_parameter_order')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      &nbsp;
                      <i class="nav-icon fas fa-crown"></i>
                      <i class="nav-item fas fa-crown"></i>
                      <i class="nav-item fas fa-crown"></i>
                      &nbsp;
                      <b>Premium</b>
                    </div>
                    <input type="text" name="p_jenis_layanan" value="Premium" hidden>
                    <select class="form-control @error('id_parameter_order') is-invalid @enderror" id="id_parameter_order" name="id_parameter_order">
                      <option value="">--Pilih Durasi Pertemuan--</option>
                      @foreach ($premium as $p)
                        <option value="{{$p->id_parameter_order}}">{{$p->p_durasi_pertemuan}}</option>
                      @endforeach
                    </select>
                    @error ('id_parameter_order')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-secondary">
                      &nbsp;
                      <i class="nav-icon fas fa-user-tie"></i>
                      &nbsp;
                      <b>Ubah Translator</b>
                    </div>
                    <input type="text" name="id_translator" id="id_translator" hidden>
                    <select class="form-control @error('id_translator') is-invalid @enderror" id="id_translator" name="id_translator">
                      <option value="">--Pilih Translator--</option>
                      @foreach ($translator as $trans)
                        <option value="{{$trans->id_translator}}">{{$trans->id_translator}} - {{$trans->nama}}</option>
                      @endforeach
                    </select>
                    @error ('id_translator')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Jenis Menu Offline</label>
                    <input type="text" class="form-control" name="tipe_offline" id="tipe_offline" value="{{$edit->tipe_offline}}" readonly>
                  </div>
                  <div class="form-group">
                    <select class="form-control @error('tipe_offline') is-invalid @enderror" id="tipe_offline" name="tipe_offline">
                      <option value="">--Edit Jenis Menu Offline--</option>
                      <option value="Interpreter">Interpreter</option>
                      <option value="Transkrip">Transkrip</option>
                    </select>
                    @error ('tipe_offline')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="tanggal_pertemuan">Tanggal Pertemuan</label>
                        <input type="date" id="tanggal_pertemuan" name="tanggal_pertemuan" value="{{$edit->tanggal_pertemuan}}" class="form-control @error('tanggal_pertemuan') is-invalid @enderror">
                      </div>
                    </div class="col">
                    <div class="col">
                      <div class="form-group">
                        <label for="waktu_pertemuan">Waktu Pertemuan</label>
                        <input type="time" id="waktu_pertemuan" name="waktu_pertemuan" value="{{$edit->waktu_pertemuan}}" class="form-control">
                      </div>
                    </div class="col">
                  </div class="row">
                  <div class="form-group">
                    <label for="lokasi" class="col-form-label">Edit Catatan Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$edit->lokasi}}">
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude" value="{{$edit->longitude}}" readonly>
                      </div>
                    </div class="col">
                    <div class="col">
                      <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude" value="{{$edit->latitude}}" readonly>
                      </div>
                    </div class="col">
                  </div class="row">
                  <br>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>   
              </div>
            </div>
          </section>
        </form>
      </div>
    </div>
  </div>
</div> 
@endforeach

<!-- Halaman Utama -->
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
                <button type="submit" value="Refresh Page" onClick="document.location.reload(true)"  class="btn btn-primary"><i class="material-icons"></i> <span>Refresh List</span></button>
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
                <th scope="row" class="text-center">Nomor Order</th>
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
                <td scope="row" class="text-center">
                  @if(!empty($orders->id_translator))
                    {{$orders->translator->nama}}
                  @elseif(!empty($orders->id_translator == NULL) && ($orders->path_file_trans == NULL) && !empty($orders->transaksi->status_transaksi))
                    <button type="button" class="badge-pill badge-warning" data-toggle="tooltip" data-html="true" title="Menunggu">
                    !    </button><p class="font-weight text-orange">Menunggu</p>
                  @elseif(empty($orders->transaksi))
                    <button type="button" class="badge-pill badge-danger" data-toggle="tooltip" data-html="true" title=" Belum Melakukan Pembayaran">
                    !    </button><p class="font-weight text-red">Menunggu</p>
                  @endif
                </td>
                <td scope="row" class="text-center">
                  @if(!empty($orders->is_status == NULL) & $orders->is_status == "belum dibayar")
                    <span class="status text-warning">&bull;</span>Belum Dibayar
                  @elseif(!empty($orders->transaksi) )
                    @if($orders->transaksi->status_transaksi == "Berhasil")
                      <span class="status text-success">&bull;</span>Transaksi Berhasil
                    @elseif($orders->transaksi->status_transaksi == "Pending")
                      <span class="status text-warning">&bull;</span>Menunggu
                    @elseif($orders->transaksi->status_transaksi == "Gagal")
                      <span class="status text-danger">&bull;</span>Gagal
                    @endif
                  @else
                    <span class="status text-danger">&bull;</span>Belum dibayar
                  @endif
                </td>
                <td scope="row" class="text-center">
                  @if(!empty($orders->status_at) && !empty($orders->transaksi))
                    {{$orders->status_at}}
                  @elseif(empty($orders->transaksi))
                    Belum Melakukan Pembayaran
                  @endif
                </td>
                <td>
                  <a type="button" class="view" title="View Details" data-toggle="modal" data-target="#detailModal{{$orders->id_order}}"><i class="fas fa-sign-in-alt material-icons"></i></a><p class="font-weight-bold text-blue">Detail</p>
                  <a type="button" class="update" title="Update" data-toggle="modal" data-target="#editInterpreter{{$orders->id_order}}"><i class="far fa-edit material-icons text-green"></i></a><p class="font-weight-bold text-green">Edit</p>
                  <a href="#" class="delete" title="Delete" order_bl="{{$orders->id_order}}"><i class="fas fa-trash-alt material-icons text-red"></i></a><p class="font-weight-bold text-red">Hapus</p>
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
          <td>
              <a href="daftar-order" type="button" class="btn btn-outline-primary">Kembali</a>
          </td> 
        </div>
      </div>    
    </div>     
  </div>
</div>     
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
    });
  });
</script>
@endpush

@push('addon-script')
<script>
  $('.delete').click(function(){
    var order_bl = $(this).attr('order_bl')
    Swal.fire({
      title: "Apakah Anda Yakin ?",
      text: "Akan Menghapus Data Order Ini ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/det-order-interpreter/"+order_bl+"/delete";  
        Swal.fire(
          'Berhasil!',
          'Data berhasil dihapus ',
          'success'
        )
      }
    })
  });
</script>
@endpush