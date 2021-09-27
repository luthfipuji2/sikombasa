@extends('layouts/admin/template')

@section('title', 'Daftar Klien')

@section('container')

<!-- Modal Detail -->
@foreach ($klien as $k)
<div class="modal fade" id="detailModal{{$k->id_klien}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail data Klien </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form>

     
        <div class="modal-body">


  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Nama Klien</label>
                <input type="text" value="{{$k->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Foto Profile</label>
                <br>
                @if (!empty($k->profile_photo_path))
                  <a href="{{ route('users.download', $k->id) }}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i></a>
                @endif            
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="text" value="{{$k->email}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" value="{{$k->role}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" value="{{$k->jenis_kelamin}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" value="{{$k->tgl_lahir}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Handphone</label>
                <input type="text" value="{{$k->no_telp}}" class="form-control" readonly>
            </div>            
          </div>
          
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" value="{{$k->nik}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>KTP</label>
                <br>
                @if (!empty($k->foto_ktp))
                <a href="{{ route('klien.download', $k->id_klien) }}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i></a>
                @endif            
            </div>

            <div class="form-group">
                <label>Kecamatan</label>
                <input type="text" value="{{ $k->kecamatan->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kabupaten</label>
                <input type="text" value="{{ $k->kabupaten->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" value="{{ $k->provinsi->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Desa</label>
                <input type="text" value="{{ $k->desa->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" value="{{$k->kode_pos}}" class="form-control" readonly>
            </div>
          </div>
          <!--/.col (right) -->
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

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 50px">No</th>
                    <th scope="row" class="text-center" hidden>ID Klien</th>
                    <th scope="row" class="text-center">Nama Klien</th>
                    <th scope="row" class="text-center" hidden>Email</th>
                    <th scope="row" class="text-center" hidden>Jenis Kelamin</th>
                    <th scope="row" class="text-center" hidden>Tanggal Lahir</th>
                    <th scope="row" class="text-center" hidden>NIK</th>
                    <th scope="row" class="text-center" hidden>Nomor Telepon</th>
                    <th scope="row" class="text-center" hidden>Kecamatan</th>
                    <th scope="row" class="text-center" hidden>Kabupaten</th>
                    <th scope="row" class="text-center" hidden>Provinsi</th>
                    <th scope="row" class="text-center" hidden>Desa</th>
                    <th scope="row" class="text-center" hidden>Kode Pos</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($klien as $kliens)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th> 
                    <td scope="row" class="text-center" hidden>{{$kliens->id_klien}}</td>
                    <td scope="row" class="text-center">{{$kliens->name}}</td>
                    <td scope="row" class="text-center" hidden>{{$kliens->email}}</td>
                    <td scope="row" class="text-center" hidden>{{$kliens->jenis_kelamin}}</td>
                    <td scope="row" class="text-center" hidden>{{$kliens->tgl_lahir}}</td>
                    <td scope="row" class="text-center" hidden>{{$kliens->nik}}</td>
                    <td scope="row" class="text-center" hidden>{{$kliens->no_telp}}</td>

                    <td scope="row" class="text-center" hidden>{{$kliens->kode_pos}}</td> 
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{$kliens->id_klien}}"><i class="fas fa-info"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@push('addon-script')

<script>
$(document).ready(function () {

  var table = $('#datatable').DataTable({
     dom: 'Bfrtip',
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": [
      {
                extend:    'copyHtml5',
                text:      '<i class="far fa-copy"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="far fa-file-excel"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fas fa-file-csv"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="far fa-file-pdf"></i>',
                titleAttr: 'PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
    ]
  })
});
</script>
@endpush



