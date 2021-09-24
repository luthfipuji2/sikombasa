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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>


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
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Order Teks </h5>
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
<div class="modal fade" id="editTeks{{$edit->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('edit-order-teks', $edit->id_order)}}" method="post">
          {{ csrf_field() }}
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
            <label for="id_parameter_jenis_teks">Jenis Teks</label>
            <input type="text" class="form-control" placeholder="Masukkan jenis teks"  value="{{$edit->parameterjenisteks->p_jenis_teks}}" readonly>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="id_parameter_jenis_teks" name="id_parameter_jenis_teks" value="1">
            <label class="form-check-label" for="id_parameter_jenis_teks">
                Umum
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="id_parameter_jenis_teks"  name="id_parameter_jenis_teks" value="2">
            <label class="form-check-label" for="id_parameter_jenis_teks">
                Khusus
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
            <input type="number" class="form-control" placeholder="Masukkan nama lampiran" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$edit->durasi_pengerjaan}}">
          </div>
          <label for="durasi_pengerjaan">Text</label>
          <div class="form-group">
            <textarea type="text" class="form-control @error('text') is-invalid @enderror" id="text" oninput="countWord()" placeholder="Tulis Text Disini" rows="10" name="text" required>{{$edit->text}}</textarea>
            @error('text')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jml_karakter" class="col-form-label" value="{{$edit->jumlah_karakter}}">Word Count : </label>
            <input type="hidden" name="jumlah_karakter" id="jumlah_karakter">
            <span type="text" id="jml_karakter" name="jml_karakter"  >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="countWord()">Save changes</button>
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
                  <a type="button" class="update" title="Update" data-toggle="modal" data-target="#editTeks{{$orders->id_order}}"><i class="far fa-edit material-icons text-green"></i></a><p class="font-weight-bold text-green">Edit</p>
                  <a href="#" class="delete" title="Delete" order_teks="{{$orders->id_order}}"><i class="fas fa-trash-alt material-icons text-red"></i></a><p class="font-weight-bold text-red">Hapus</p>
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
    <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    } );
} );
</script>
@endpush

@push('scripts')
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
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
  });
</script>
@endpush

@push('addon-script')
<script>
  $('.delete').click(function(){
    var order_teks = $(this).attr('order_teks')
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
        window.location = "/det-order-teks/"+order_teks+"/delete";  
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
	function countWord() {
	  var words = document
		.getElementById("text").value;
		var count = 0;
		var split = words.split(' ');
		for (var i = 0; i < split.length; i++) {
			if (split[i] != "") {
				count += 1;
			}
		}
    $('#jumlah_karakter').val(count)
		document.getElementById("jml_karakter")
		.innerHTML = count;
	}
</script>
@endpush
