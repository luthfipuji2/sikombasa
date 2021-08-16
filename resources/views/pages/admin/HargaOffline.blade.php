@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Offline')

@section('container')

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Menu Ofline</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-offline.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label>Jenis Layanan</label>
                <select type="text" name="p_jenis_layanan" class="form-control @error('p_jenis_layanan') is-invalid @enderror"
                 placeholder="" value="{{ old('p_jenis_layanan') }}">
                    <option>--Pilih Jenis Layanan--</option>
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                </select>
                @error ('p_jenis_layanan')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Durasi Pertemuan (hari)</label>
                <input type="text" name="p_durasi_pertemuan" class="form-control @error('p_durasi_pertemuan') is-invalid @enderror"
                 placeholder="Masukkan Range Durasi Pertemuan (hari) ex. 1-2" value="{{ old('p_durasi_pertemuan') }}">
                @error ('p_durasi_pertemuan')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="p_harga" class="form-control @error('p_harga') is-invalid @enderror"
                 placeholder="Masukkan harga ex. 100000" value="{{ old('p_harga') }}">
                @error ('p_harga')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
        </div>
      

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
@foreach ($offline as $edit)
<div class="modal fade" id="editModal{{$edit->id_parameter_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Menu Offline</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="/daftar-harga-offline/{{$edit->id_parameter_order}}">
      @method('put')
      @csrf

        <div class="modal-body">

          <input type="text" name="id_offline" hidden value="{{$edit->id_parameter_order}}">

          <div class="form-group">
                <label for="p_jenis_layanan">Jenis Layanan</label>
                    <select class="form-control @error('p_jenis_layanan') is-invalid @enderror" 
                      placeholder="Jenis Layanan" name="p_jenis_layanan">
                      <option hidden>{{$edit->p_jenis_layanan}}</option>
                      <option value="Basic">Basic</option>
                      <option value="Premium">Premium</option>
                    
                    </select>
                    @error ('p_jenis_layanan')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Durasi Pertemuan (hari)</label>
                <input type="text" name="p_durasi_pertemuan" class="form-control @error('p_durasi_pertemuan') is-invalid @enderror"
                 placeholder="Masukkan Range Durasi Pertemuan (hari) ex. 1-2" value="{{$edit->p_durasi_pertemuan}}">
                @error ('p_durasi_pertemuan')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="p_harga" class="form-control @error('p_harga') is-invalid @enderror"
                 placeholder="Masukkan harga ex. 100000" value="{{$edit->p_harga}}">
                @error ('p_harga')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>

            <div class="form-group">
              <label>Deskripsi Perubahan</label>
              <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
              name="deskripsi" placeholder="Masukkan deskripsi perubahan"></textarea>
              @error ('deskripsi')
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

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
              
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Menu Offline
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center">No</th>
                    <th hidden>ID Harga</th>
                    <th scope="row" class="text-center">Jenis Layanan</th>
                    <th scope="row" class="text-center">Durasi Pertemuan (hari)</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($offline as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_order}}</td>
                    <td scope="row" class="text-center">{{$harga->p_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$harga->p_durasi_pertemuan}}</td>
                    <td scope="row" class="text-center">{{$harga->p_harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#editModal{{$harga->id_parameter_order}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger delete" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_order}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Riwayat Parameter Offline -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
              <h5>Riwayat Perubahan Harga</h5>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable2" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Offline</th>
                    <th scope="row" class="text-center">Tanggal Perubahan</th>
                    <th scope="row" class="text-center">Durasi Pertemuan</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($riwayat as $d)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$d->id_parameter_order}}</td>
                    <td scope="row" class="text-center">{{$d->tgl_perubahan}}</td>
                    <td scope="row" class="text-center">{{$d->parameter_order->p_durasi_pertemuan}}</td>
                    <td scope="row" class="text-center">{{$d->harga_perubahan}}</td>
                    <td scope="row" class="text-center">{{$d->deskripsi}}</td>
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
    $('.delete').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Hapus parameter menu offline "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-offline/"+harga_id+"/delete";  
            Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus ',
              'success'
            )
          }
        })
    });
</script>

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
                titleAttr: 'PDF'
            }
    ]
  })
});
</script>

<script>
$(document).ready(function () {

  var table = $('#datatable2').DataTable({
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
                titleAttr: 'PDF'
            }
    ]
  })
});
</script>
@endpush



