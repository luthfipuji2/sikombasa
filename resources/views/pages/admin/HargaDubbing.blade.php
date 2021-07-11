@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Dubbing')

@section('container')

<!-- Modal Tambah Dubber -->
<div class="modal fade" id="addDubberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Dubber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="daftar-harga-dubbing.storeDubber" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">

        <div class="form-group">
                  <label>Jumlah Dubber</label>
                  <input type="number" class="form-control @error('p_jumlah_dubber') is-invalid @enderror" 
                  name="p_jumlah_dubber" id="p_jumlah_dubber"value="{{ old('p_jumlah_dubber') }}" placeholder="Masukkan jumlah dubber">
                  @error ('p_jumlah_dubber')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                  name="harga_dubber" id="harga_dubber" value="{{ old('harga') }}" placeholder="Masukkan harga ex. 100000">
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

<!-- Modal Edit Dubber -->
@foreach ($dubber as $e)
<div class="modal fade" id="updateDubberModal{{$e->id_parameter_dubber}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Dubber</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="daftar-harga-dubbing.updateDubber/{{$e->id_parameter_dubber}}">
      @method('patch')
      @csrf

        <div class="modal-body">

              <div class="form-group">
                  <label>Jumlah Dubber</label>
                  <input type="number" class="form-control @error('p_jumlah_dubber') is-invalid @enderror" 
                  name="p_jumlah_dubber" id="p_jumlah_dubber" value="{{$e->p_jumlah_dubber}}" placeholder="Masukkan jumlah dubber">
                  @error ('p_jumlah_dubber')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                  name="harga_dubber" id="harga_dubber" value="{{$e->harga}}" placeholder="Masukkan harga ex. 100000">
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

<!-- Main content Paramater Dubber -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
              
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDubberModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Dubber
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
                    <th scope="row" class="text-center">Jumlah Dubber</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dubber as $d)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$d->id_parameter_dubber}}</td>
                    <td scope="row" class="text-center">{{$d->p_jumlah_dubber}}</td>
                    <td scope="row" class="text-center">{{$d->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateDubberModal{{$d->id_parameter_dubber}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger deleteDubber" harga-num="{{$loop->iteration}}" harga-id="{{$d->id_parameter_dubber}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal Tambah Dubbing -->
<div class="modal fade" id="addDubbingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Dubbing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-dubbing.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">

              <div class="form-group">
                  <label>Durasi Video Min (detik)</label>
                  <input type="number" class="form-control @error('durasi_video_min') is-invalid @enderror" 
                  name="durasi_video_min" id="durasi_video_min" value="{{ old('durasi_video_min') }}"  placeholder="Masukkan durasi minimal video (detik)">
                  @error ('durasi_video_min')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Durasi Video Max (detik)</label>
                  <input type="number" class="form-control @error('durasi_video_max') is-invalid @enderror" 
                  name="durasi_video_max" id="durasi_video_max" value="{{ old('durasi_video_max') }}" placeholder="Masukkan durasi maximal video (detik)">
                  @error ('durasi_video_max')
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

<!-- Modal Edit Dubbing -->
@foreach ($dubbing as $edit)
<div class="modal fade" id="updateDubbingModal{{$edit->id_parameter_order_dubbing}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Dubbing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="/daftar-harga-dubbing/{{$edit->id_parameter_order_dubbing}}">
      @method('patch')
      @csrf

        <div class="modal-body">

              <div class="form-group">
                  <label>Durasi Video Min (detik)</label>
                  <input type="number" class="form-control @error('durasi_video_min') is-invalid @enderror" 
                  name="durasi_video_min" id="durasi_video_min" value="{{$edit->durasi_video_min}}" placeholder="Masukkan durasi minimal video (detik)">
                  @error ('durasi_video_min')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Durasi Video Max (detik)</label>
                  <input type="number" class="form-control @error('durasi_video_max') is-invalid @enderror" 
                  name="durasi_video_max" id="durasi_video_max" value="{{$edit->durasi_video_max}}" placeholder="Masukkan durasi maximal video (detik)">
                  @error ('durasi_video_max')
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

<!-- Main content Paramater Dubbing -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
              
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDubbingModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Dubbing
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
                    <th scope="row" class="text-center">Durasi Video (detik)</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dubbing as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_order_dubbing}}</td>
                    <td scope="row" class="text-center">{{$harga->durasi_video_min}}-{{$harga->durasi_video_max}}</td>
                    <td scope="row" class="text-center">{{$harga->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateDubbingModal{{$harga->id_parameter_order_dubbing}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger delete" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_order_dubbing}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Delete Dubber -->
<script>
    $('.deleteDubber').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah Anda Yakin?",
          text: "Hapus parameter jumlah dubber "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-dubbing.destroyDubber/"+harga_id+"/deleteDubber";  
            Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus ',
              'success'
            )
          }
        })
    });
</script>

<!-- Delete Dubbing -->
<script>
    $('.delete').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Hapus parameter dubbing "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-dubbing/"+harga_id+"/delete";  
            Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus ',
              'success'
            )
          }
        })
    });
</script>

<!-- Data Table -->
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



