@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Dokumen')

@section('container')

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Dokumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-dokumen.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">
        <div class="form-group">
                  <label>Jumlah Halaman Min</label>
                  <input type="number" class="form-control @error('jumlah_halaman_min') is-invalid @enderror" 
                  name="jumlah_halaman_min" id="jumlah_halaman_min" value="{{ old('jumlah_halaman_min') }}" placeholder="Masukkan Jumlah minimal halaman">
                  @error ('jumlah_halaman_min')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Jumlah Halaman Max</label>
                  <input type="number" class="form-control @error('jumlah_halaman_max') is-invalid @enderror" 
                  name="jumlah_halaman_max" id="jumlah_halaman_max" value="{{ old('jumlah_halaman_max') }}" placeholder="Masukkan Jumlah maximal halaman">
                  @error ('jumlah_halaman_max')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                  name="harga" id="harga" value="{{ old('harga') }}" placeholder="Masukkan harga ex. 100000">
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

<!-- Modal Edit -->
@foreach ($dokumen as $edit)
<div class="modal fade" id="updateModal{{$edit->id_parameter_order_dokumen}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Dokumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="/daftar-harga-dokumen/{{$edit->id_parameter_order_dokumen}}">
      @method('put')
      @csrf

        <div class="modal-body">

              <input type="text" name="id_dokumen" hidden value="{{$edit->id_parameter_order_dokumen}}">

              <div class="form-group">
                  <label>Jumlah Halaman Min</label>
                  <input type="number" class="form-control @error('jumlah_halaman_min') is-invalid @enderror" 
                  name="jumlah_halaman_min" id="jumlah_halaman_min" value="{{$edit->jumlah_halaman_min}}" placeholder="Masukkan jumlah minimal halaman">
                  @error ('jumlah_halaman_min')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Jumlah Halaman Max</label>
                  <input type="number" class="form-control @error('jumlah_halaman_max') is-invalid @enderror" 
                  name="jumlah_halaman_max" id="jumlah_halaman_max" value="{{$edit->jumlah_halaman_max}}" placeholder="Masukkan jumlah maximal halaman">
                  @error ('jumlah_halaman_max')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                  name="harga" id="harga" value="{{$edit->harga}}" placeholder="Masukkan harga ex. 100000">
                  @error ('harga')
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Dokumen
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th hidden>ID</th>
                    <th scope="row" class="text-center">Jumlah Halaman</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dokumen as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_order_dokumen}}</td>
                    <td scope="row" class="text-center">{{$harga->jumlah_halaman_min}}-{{$harga->jumlah_halaman_max}}</td>
                    <td scope="row" class="text-center">{{$harga->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal{{$harga->id_parameter_order_dokumen}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger delete" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_order_dokumen}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Riwayat Parameter Dokumen -->
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
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Dokumen</th>
                    <th scope="row" class="text-center">Tanggal Perubahan</th>
                    <th scope="row" class="text-center">Jumlah Halaman</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($riwayat as $d)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$d->id_parameter_order_dokumen}}</td>
                    <td scope="row" class="text-center">{{$d->tgl_perubahan}}
                    <td scope="row" class="text-center">{{$d->parameter_dokumen->jumlah_halaman_min}} - {{$d->parameter_dokumen->jumlah_halaman_max}}</td>
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
          text: "Hapus parameter dokumen "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-dokumen/"+harga_id+"/delete";  
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
     
    table.on('click', '.edit', function(){

    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data);

    $('#p_jenis_layanan').val(data[2]);
    $('#p_jumlah_halaman').val(data[3]);
    $('#harga').val(data[4]); 

    $('#editForm').attr('action', '/daftar-harga-dokumen/'+data[1]);
    $('#editModal').modal('show');
    
  });
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
     
    table.on('click', '.edit', function(){

    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data);

    $('#p_jenis_layanan').val(data[2]);
    $('#p_jumlah_halaman').val(data[3]);
    $('#harga').val(data[4]); 

    $('#editForm').attr('action', '/daftar-harga-dokumen/'+data[1]);
    $('#editModal').modal('show');
    
  });
});
</script>
@endpush



