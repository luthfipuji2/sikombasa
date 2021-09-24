@extends('layouts/admin/template')
@section('title', 'Detail Order Transkrip')
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
                  <a type="button" class="update" title="Update" data-toggle="modal" data-target="#editTranskrip{{$orders->id_order}}"><i class="far fa-edit material-icons text-green"></i></a><p class="font-weight-bold text-green">Edit</p>
                  <a href="#" class="delete" title="Delete" order_tr="{{$orders->id_order}}"><i class="fas fa-trash-alt material-icons text-red"></i></a><p class="font-weight-bold text-red">Hapus</p>
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

<!-- Modal Detail -->
@foreach ($order as $orders)
<div class="modal fade" id="detailModal{{$orders->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Order Transkrip </h5>
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
                    <label>Durasi Pengerjaan</label>
                    <input type="text" value="{{$orders->durasi_pengerjaan}} Hari" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Durasi Audio</label>
                    <input type="text" value="{{(($orders->durasi_audio/60)%60)}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" value="{{$orders->transaksi->nominal_transaksi}}" class="form-control" readonly>
                  </div>           
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Download Audio Klien</label>
                    <a href="/download-trans-klien/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Video</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    @if(!empty($orders->revisi->path_file_revisi))
                      <label>Download Hasil Revisi</label>
                      <a href="/download-trans-revisi/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Audio</a>
                    @else (empty($orders->revisi->path_file_revisi))
                      <label>Download Hasil Terjemahan</label>
                      <a href="/download-trans-translator/{{$orders->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Audio</a>
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
<div class="modal fade" id="editTranskrip{{$edit->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('edit-order-transkrip', $edit->id_order)}}" method="post">
          @csrf
          @method('PUT')
          <input type="text" name="idorder" value="{{$edit->id_order}}" hidden></td>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jenis_layanan">Update Jenis Layanan</label>
                    <input type="text" class="form-control" value="{{$edit->jenis_layanan}}" readonly>
                  </div>
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-cyan">
                      <div id="jenis_layanan"></div>
                      <div class="form-check">
                        &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Basic">
                        <label class="form-check-label" for="jenis_layanan"><b>Basic</b></label>
                        <i class="nav-icon fas fa-medal"></i>
                        <i class="nav-icon fas fa-medal"></i>
                        <i class="nav-icon fas fa-medal"></i>
                      </div>
                    </div>
                  </div>
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <div id="jenis_layanan"></div>
                      <div class="form-check">
                        &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Premium ">
                        <label class="form-check-label" for="jenis_layanan"><b>Premium</b></label>
                        <i class="nav-icon fas fa-crown"></i>
                        <i class="nav-item fas fa-crown"></i>
                        <i class="nav-item fas fa-crown"></i>
                      </div>
                    </div>
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
                    <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" id="durasi_pengerjaan" placeholder="Durasi Pengerjaan" name="durasi_pengerjaan">
                      <option value="">--Pilih Durasi Pengerjaan--</option>
                      <option value="1">1 Hari</option>
                      <option value="2">2 Hari</option>
                      <option value="3">3 Hari</option>
                    </select>
                    @error ('durasi_pengerjaan')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-6"><br>
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" class="form-control" value="{{$edit->nama_dokumen}}" readonly>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Tuliskan Nama Audio" id="nama_dokumen" name="nama_dokumen">
                    </div>
                    <!-- <div class="form-group">
                    <div class="form-group">
                      <label for="path_file" class="col-form-label">Upload Audio (Size Max 30 Mb)</label>
                      <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="file" id="path_file" name="path_file" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="durasi_audio" id="durasi_audio" oninput="updateInfos()">
                      <span type="text"  id="dr_audio" name="dr_audio">
                    </div>
                    <br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
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
    var order_tr = $(this).attr('order_tr')
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
        window.location = "/det-order-transkrip/"+order_tr+"/delete";  
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
  var myAudios = [];
  console.log(myAudios);
  window.URL = window.URL || window.webkitURL;
  document.getElementById('path_file').onchange = setFileInfo;
  function setFileInfo() {
    var files = this.files;
    console.log(files);
    myAudios.push(files[0]);
    var audio = document.createElement('audio');
    console.log(audio);
    audio.preload = 'metadata';
    audio.onloadedmetadata = function() {
      window.URL.revokeObjectURL(audio.src);
      var duration = audio.duration;
      console.log(duration);
      $('#durasi_audio').val(duration);
      myAudios[myAudios.length - 1].duration = duration;
    }
    audio.src = URL.createObjectURL(files[0]);;
  }
  function updateInfos() {
    var duration = audio.duration;
    console.log(duration);
    $('#durasi_audio').val(duration);
    $("#durasi_audio").val()
    var dr_audio = document.getElementById("dr_audio");
    console.log(dr_audio);
    $('#durasi_audio').val(dr_audio);
    var durasi_audio = document.getElementById("durasi_audio");
    console.log(durasi_audio);
    dr_audio.textContent = "";
    for (var i = 0; i < myAudios.length; i++) {
      console.log(i);
      dr_audio.textContent += myAudios[i].name + " duration: " + myAudios[i].duration + '\n';
    }
  }
</script>
@endpush