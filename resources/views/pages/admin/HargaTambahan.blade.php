@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Tambahan')

@section('container')

<!-- Modal Tambah Jenis-->
<div class="modal fade" id="addJenisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Jenis Teks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="daftar-harga-tambahan.storeJenis" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">
    
            <div class="form-group">
                  <label>Jenis Teks</label>
                  <select type="text" name="p_jenis_teks" class="form-control @error('p_jenis_teks') is-invalid @enderror"
                  placeholder="" value="{{ old('p_jenis_teks') }}">
                      <option>--Pilih Jenis Layanan--</option>
                      <option value="Umum">Umum</option>
                      <option value="Khusus">Khusus</option>
                  </select>
                  @error ('p_jenis_teks')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control @error('harga_jenis') is-invalid @enderror" 
                name="harga_jenis" id="harga_jenis" value="{{ old('harga_jenis') }}" placeholder="Masukkan harga ex. 100000">
                @error ('harga_jenis')
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

<!-- Modal Edit Jenis -->
@foreach($jenis as $j)
<div class="modal fade" id="updateJenisModal{{$j->id_parameter_jenis_teks}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Jenis Teks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="daftar-harga-tambahan.updateJenis/{{$j->id_parameter_jenis_teks}}">
      @method('patch')
      @csrf
      
      <div class="modal-body">

            <input type="text" name="id_jenis_teks" hidden value="{{$j->id_parameter_jenis_teks}}">
    
            <div class="form-group">
                  <label>Jenis Teks</label>
                  <select type="text" name="p_jenis_teks" class="form-control @error('p_jenis_teks') is-invalid @enderror"
                  placeholder="" value="{{$j->p_jenis_teks}}">
                      <option value="{{$j->p_jenis_teks}}" hidden selected>{{$j->p_jenis_teks}}</option>
                      <option value="Umum">Umum</option>
                      <option value="Khusus">Khusus</option>
                  </select>
                  @error ('p_jenis_teks')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control @error('harga_jenis') is-invalid @enderror" 
                name="harga_jenis" id="harga_jenis" value="{{$j->harga}}" placeholder="Masukkan harga ex. 100000">
                @error ('harga_jenis')
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

<!-- Parameter Jenis Teks -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">

                 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addJenisModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Jenis Teks
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th hidden>ID Parameter Jenis Teks</th>
                    <th scope="row" class="text-center">Jenis Teks</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($jenis as $jenis)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$jenis->id_parameter_jenis_teks}}</td>
                    <td scope="row" class="text-center">{{$jenis->p_jenis_teks}}</td>
                    <td scope="row" class="text-center">{{$jenis->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateJenisModal{{$jenis->id_parameter_jenis_teks}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger deleteJenis" harga-num="{{$loop->iteration}}" harga-id="{{$jenis->id_parameter_jenis_teks}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Riwayat Parameter Jenis Teks -->
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
                <table id="datatable3" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Jenis Teks</th>
                    <th scope="row" class="text-center">Tanggal Perubahan</th>
                    <th scope="row" class="text-center">Jenis Teks</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($riwayat_jenis as $d)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$d->id_parameter_jenis_teks}}</td>
                    <td scope="row" class="text-center">{{$d->tgl_perubahan}}</td>
                    <td scope="row" class="text-center">{{$d->parameter_jenis_teks->p_jenis_teks}}</td>
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

<!-- Modal Tambah Layanan-->
<div class="modal fade" id="addLayananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-tambahan.store')}}" method="POST">

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
                <label>Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                name="harga" value="{{ old('harga') }}" placeholder="Masukkan harga ex. 100000">
                @error ('harga')
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

<!-- Modal Edit Jenis -->
@foreach($layanan as $l)
<div class="modal fade" id="updateLayananModal{{$l->id_parameter_jenis_layanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Jenis Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="daftar-harga-tambahan/{{$l->id_parameter_jenis_layanan}}">
      @method('patch')
      @csrf
      
      <div class="modal-body">
            <input type="text" name="id_layanan" hidden value="{{$l->id_parameter_jenis_layanan}}">
            
            <div class="form-group">
                  <label>Jenis Layanan</label>
                  <select type="text" name="p_jenis_layanan" class="form-control @error('p_jenis_layanan') is-invalid @enderror"
                  placeholder="" value="{{$l->p_jenis_layanan}}">
                      <option value="{{$l->p_jenis_layanan}}" hidden selected>{{$l->p_jenis_layanan}}</option>
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
                <label>Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                name="harga" id="harga" value="{{$l->harga}}" placeholder="Masukkan harga ex. 100000">
                @error ('harga_jenis')
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

<!-- Parameter Jenis Layanan -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">

                 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLayananModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Jenis Layanan
                  </button>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable2" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th hidden>ID</th>
                    <th scope="row" class="text-center">Jenis Layanan</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach ($layanan as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$harga->p_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$harga->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateLayananModal{{$harga->id_parameter_jenis_layanan}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger deleteLayanan" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_jenis_layanan}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Riwayat Parameter Jenis Layanan -->
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
                <table id="datatable4" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Jenis Layanan</th>
                    <th scope="row" class="text-center">Tanggal Perubahan</th>
                    <th scope="row" class="text-center">Jenis Layanan</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($riwayat_layanan as $dl)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$dl->id_parameter_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$dl->tgl_perubahan}}</td>
                    <td scope="row" class="text-center">{{$dl->parameter_layanan->p_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$dl->harga_perubahan}}</td>
                    <td scope="row" class="text-center">{{$dl->deskripsi}}</td>
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

<!-- Delete Jenis -->
<script>
    $('.deleteJenis').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah Anda Yakin?",
          text: "Hapus parameter jenis teks "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-tambahan.destroyJenis/"+harga_id+"/deleteJenis";  
            Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus ',
              'success'
            )
          }
        })
    });
</script>

<!-- Data table -->
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

<!-- Delete Layanan -->
<script>
    $('.deleteLayanan').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah Anda Yakin?",
          text: "Hapus parameter jenis layanan "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-tambahan/"+harga_id+"/delete";  
            Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus ',
              'success'
            )
          }
        })
    });
</script>

<!-- Data table -->
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

<!-- Data table -->
<script>
$(document).ready(function () {

  var table = $('#datatable3').DataTable({
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

<!-- Data table -->
<script>
$(document).ready(function () {

  var table = $('#datatable4').DataTable({
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



