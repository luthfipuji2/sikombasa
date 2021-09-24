@extends('layouts/admin/template')
@section('title', 'Detail Order Dubbing')
@section('container')

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="{{ asset('vendor/animate.css/buttonpill.min.css') }}">
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
        <h5 class="modal-title" id="exampleModalLabel">Detail daftar Order Dubbing </h5>
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
                    <input type="text" value="{{$orders->parameterjenislayanan->p_jenis_layanan}}" class="form-control" readonly>
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
                    <label>Nama Video</label>
                    <input type="text" value="{{$orders->nama_dokumen}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Durasi Video</label>
                    <input type="text" value="{{$orders->durasi_video}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jumlah Dubber</label>
                    <input type="text" value="{{$orders->jumlah_dubber}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Video Pengerjaan Translator</label>
                    <input type="text" value="" class="form-control" readonly>
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
                    <label for="path_file" class="col-sm-3 col-form-label">Download Video Klien</label>
                    <a href="/download-dub-klien/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    @if(!empty($orders->revisi->path_file_revisi))
                      <label>Video Hasil Revisi Dari Translator</label>
                      <a href="/download-dub-revisi/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                    @else (empty($orders->revisi->path_file_revisi))
                      <label>Video Pengerjaan Dari Translator</label>
                      <a href="/download-dub-translator/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                    @endif
                  </div>           
                </div>
              </div>
            </div>
          </section>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Edit -->
@foreach($order as $edit)
<div class="modal fade" id="editDubbing{{$edit->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('edit-order-dubbing', $edit->id_order)}}" method="post">
          @csrf
          @method('PUT')
          <input type="text" name="idLampiran" value="{{ old('id_order') }}" hidden></td>
          <div class="form-group">
            <label for="id_parameter_jenis_layanan">Jenis Layanan</label>
            <input type="text" class="form-control" placeholder="Masukkan jenis layanan" value="{{$edit->parameterjenislayanan->p_jenis_layanan}}" readonly>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="id_parameter_jenis_layanan" name="id_parameter_jenis_layanan" value="1">
            <label class="form-check-label" for="id_parameter_jenis_layanan">
                Basic
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="id_parameter_jenis_layanan"  name="id_parameter_jenis_layanan" value="2">
            <label class="form-check-label" for="id_parameter_jenis_layanan">
                Premium
            </label>
          </div>
          <br>
          <div class="form-group">
            <label>Ubah Translator</label>
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
          <br>
          <div class="form-group">
            <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
            <input type="number" class="form-control" placeholder="Masukkan Durasi Pengerjaan" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$edit->durasi_pengerjaan}}">
          </div>
          <br>
          <div class="form-group">
            <label for="jumlah_dubber">Jumlah Dubber</label>
            <input type="number" class="form-control" placeholder="Masukkan Jumlah Dubber Disini" name="jumlah_dubber" id="jumlah_dubber" value="{{$edit->jumlah_dubber}}">
          </div>
          <br>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama_dokumen" class="col-form-label">Nama Video</label>
            <h6 for="durasi_pengerjaan"> * Video Anda = {{$edit->path_file}}</h6>
            <br>
            <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="{{$edit->nama_dokumen}}">
          </div>
          <!-- <div class="form-group">
            <label for="path_file" class="col-form-label" value="{{$edit->path_file}}">Upload Video</label>
            <div class="modal-body" value="{{$edit->path_file}}">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="file" id="path_file" name="path_file" required="required" value="{{$edit->path_file}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="durasi_video" class="col-form-label" value="{{$edit->durasi_video}}"></label>
            <input type="hidden" name="durasi_video" id="durasi_video" oninput="updateInfos()" >
            <span type="text"  id="dr_video" name="dr_video">
          </div> -->
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
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
                  <input id="myInput" type="text"><i class="fa fa-search"></i>
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
                <th scope="row" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                  <a type="button" class="update" title="Update" data-toggle="modal" data-target="#editDubbing{{$orders->id_order}}"><i class="far fa-edit material-icons text-green"></i></a><p class="font-weight-bold text-green">Edit</p>
                  <a href="#" class="delete" title="Delete" order_db="{{$orders->id_order}}"><i class="fas fa-trash-alt material-icons text-red"></i></a><p class="font-weight-bold text-red">Hapus</p>
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
    var order_db = $(this).attr('order_db')
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
        window.location = "/det-order-dubbing/"+order_db+"/delete";  
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

@push('scripts')
<script>
  var myVideos = [];
  console.log(myVideos);
  window.URL = window.URL || window.webkitURL;
  document.getElementById('path_file').onchange = setFileInfo;
  function setFileInfo() {
    var files = this.files;
    console.log(files);
    myVideos.push(files[0]);
    var video = document.createElement('video');
    console.log(video);
    video.preload = 'metadata';
    video.onloadedmetadata = function() {
      window.URL.revokeObjectURL(video.src);
      var duration = video.duration;
      console.log(duration);
      $('#durasi_video').val(duration);
      myVideos[myVideos.length - 1].duration = duration;
    }
    video.src = URL.createObjectURL(files[0]);;
  }
  function updateInfos() {
    var duration = video.duration;
    console.log(duration);
    $('#durasi_video').val(duration);
    $("#durasi_video").val()
    var dr_video = document.getElementById("dr_video");
    console.log(dr_video);
    $('#durasi_video').val(dr_video);
    var durasi_video = document.getElementById("durasi_video");
    console.log(durasi_video);
    dr_video.textContent = "";
    for (var i = 0; i < myVideos.length; i++) {
      console.log(i);
      dr_video.textContent += myVideos[i].name + " duration: " + myVideos[i].duration + '\n';
    }
  }
</script>
@endpush