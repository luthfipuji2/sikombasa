@extends('layouts/admin/template')

@section('title', 'Daftar Translator')

@section('container')

<!-- Modal Edit -->
@foreach ($trans as $r)
<div class="modal fade" id="editModal{{$r->id_translator}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Status Translator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/daftar-translator/{{$r->id_translator}}" method="POST">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Nama Translator</label>
                <input type="text" value="{{$r->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Status Translator</label>
                  <select class="form-control @error('status') is-invalid @enderror" 
                    id="status" placeholder="Role" name="status">
                        <option hidden>{{$r->status}}</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <option value="Aktif">Aktif</option>
                    </select>
                    @error ('status')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Detail -->
@foreach ($trans as $t)
<div class="modal fade" id="detailModal{{$t->id_translator}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail data Translator </h5>
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
                <label>Nama Translator</label>
                <input type="text" value="{{$t->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" value="{{$t->nama}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Foto Profile</label>
                <br>
                @if (!empty($t->profile_photo_path))
                  <a href="{{ route('users.download', $t->id) }}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i></a>
                @endif            
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="text" value="{{$t->email}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" value="{{$t->role}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Keahlian</label>
                <textarea type="text"  class="form-control" readonly>{{$t->keahlian}}</textarea>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" value="{{$t->jenis_kelamin}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" value="{{$t->tgl_lahir}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Handphone</label>
                <input type="text" value="{{$t->no_telp}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" value="{{$t->nama_bank}}" class="form-control" readonly>
            </div>
            
          </div>
          
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Nama Rekening</label>
                <input type="text" value="{{$t->nama_rekening}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="text" value="{{$t->rekening_bank}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" value="{{$t->nik}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>KTP</label>
                <br>
                @if (!empty($t->foto_ktp))
                <a href="{{ route('translator.download', $t->id_translator) }}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i></a>
                @endif            
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" class="form-control" readonly>{{$t->alamat}}</textarea>
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <input type="text" value="{{$t->kecamatan}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kabupaten</label>
                <input type="text" value="{{$t->kabupaten}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" value="{{$t->provinsi}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" value="{{$t->kode_pos}}" class="form-control" readonly>
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
                    <th scope="row" class="text-center" hidden>ID</th>
                    <th scope="row" class="text-center">Nama Translator</th>
                    <th scope="row" class="text-center" hidden>Nama Lengkap</th>
                    <th scope="row" class="text-center" style="width: 100px">Status</th>
                    <th scope="row" class="text-center" hidden>Email</th>
                    <th scope="row" class="text-center" hidden>Keahlian</th>
                    <th scope="row" class="text-center" hidden>Jenis Kelamin</th>
                    <th scope="row" class="text-center" hidden>Tanggal Lahir</th>
                    <th scope="row" class="text-center" hidden>Nomor Telepon</th>
                    <th scope="row" class="text-center" hidden>Nama Bank</th>
                    <th scope="row" class="text-center" hidden>Nama Rekening</th>
                    <th scope="row" class="text-center" hidden>Nomor Rekening</th>
                    <th scope="row" class="text-center" hidden>NIK</th>
                    <th scope="row" class="text-center" hidden>Alamat</th>
                    <th scope="row" class="text-center" hidden>Kecamatan</th>
                    <th scope="row" class="text-center" hidden>Kabupaten</th>
                    <th scope="row" class="text-center" hidden>Provinsi</th>
                    <th scope="row" class="text-center" hidden>Kode Pos</th>
                    <th scope="row" class="text-center" style="width: 150px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($trans as $trans)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$trans->id_translator}}</td>
                    <td scope="row" class="text-center">{{$trans->name}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->nama}}</td>
                    <td scope="row" class="text-center">{{$trans->status}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->email}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->keahlian}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->jenis_kelamin}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->tgl_lahir}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->no_telp}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->nama_bank}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->nama_rekening}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->rekening_bank}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->nik}}</td> 
                    <td scope="row" class="text-center" hidden>{{$trans->alamat}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->kecamatan}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->kabupaten}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->provinsi}}</td>
                    <td scope="row" class="text-center" hidden>{{$trans->kode_pos}}</td> 
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal{{$trans->id_translator}}"><i class="fas fa-info"></i></button>
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal{{$trans->id_translator}}">Edit Status</button>
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
                pageSize: 'TABLOID',
            }
    ]
  })
});
</script>
@endpush



