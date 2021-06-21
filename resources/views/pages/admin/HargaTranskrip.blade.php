@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Transkrip')

@section('container')

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Transkrip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-transkrip.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">

              <div class="form-group">
                  <label>Durasi Audio Min (detik)</label>
                  <input type="number" class="form-control @error('min_durasi_audio') is-invalid @enderror" 
                  name="min_durasi_audio" id="min_durasi_audio" value="{{ old('min_durasi_audio') }}"  placeholder="Masukkan durasi minimal audio (detik)">
                  @error ('min_durasi_audio')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Durasi Audio Max (detik)</label>
                  <input type="number" class="form-control @error('max_durasi_audio') is-invalid @enderror" 
                  name="max_durasi_audio" id="max_durasi_audio" value="{{ old('max_durasi_audio') }}" placeholder="Masukkan durasi maximal audio (detik)">
                  @error ('max_durasi_audio')
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
@foreach ($transkrip as $edit)
<div class="modal fade" id="updateModal{{$edit->id_parameter_order_audio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Transkrip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="/daftar-harga-transkrip/{{$edit->id_parameter_order_audio}}">
      @method('patch')
      @csrf

        <div class="modal-body">

              <div class="form-group">
                  <label>Durasi Video Min (detik)</label>
                  <input type="number" class="form-control @error('min_durasi_audio') is-invalid @enderror" 
                  name="min_durasi_audio" id="min_durasi_audio" value="{{$edit->min_durasi_audio}}" placeholder="Masukkan durasi minimal audio (detik)">
                  @error ('min_durasi_audio')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Durasi Video Max (detik)</label>
                  <input type="number" class="form-control @error('max_durasi_audio') is-invalid @enderror" 
                  name="max_durasi_audio" id="max_durasi_audio" value="{{$edit->max_durasi_audio}}" placeholder="Masukkan durasi maximal audio (detik)">
                  @error ('max_durasi_audio')
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
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Transkrip
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" hidden>ID</th>
                    <th scope="row" class="text-center">Durasi Audio (detik)</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($transkrip as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_order_audio}}</td>
                    <td scope="row" class="text-center">{{$harga->min_durasi_audio}}-{{$harga->max_durasi_audio}}</td>
                    <td scope="row" class="text-center">{{$harga->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#updateModal{{$harga->id_parameter_order_audio}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger delete" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_order_audio}}"><i class="fas fa-trash-alt"></i></a>
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
    $('.delete').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Hapus parameter transkrip "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-transkrip/"+harga_id+"/delete";  
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
    $('#p_tipe_transkrip').val(data[3]);
    $('#p_durasi_pertemuan').val(data[4]);
    $('#harga').val(data[5]); 

    $('#editForm').attr('action', '/daftar-harga-transkrip/'+data[1]);
    $('#editModal').modal('show');
    
  });
});
</script>
@endpush



