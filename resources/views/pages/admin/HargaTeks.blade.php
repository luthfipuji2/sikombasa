@extends('layouts/admin/template')

@section('title', 'Daftar Harga Menu Teks')

@section('container')

<!-- Modal Tambah Kata-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Parameter Teks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('daftar-harga-teks.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">
    
            <div class="form-group">
                <label>Jumlah Kata Min</label>
                <input type="number" class="form-control @error('jumlah_karakter_min') is-invalid @enderror" 
                name="jumlah_karakter_min" id="jumlah_karakter_min" value="{{ old('p_jumlah_karakter_min') }}" placeholder="Masukkan Jumlah minimal kata">
                @error ('jumlah_karakter_min')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Jumlah Kata Max</label>
                <input type="number" class="form-control @error('jumlah_karakter_max') is-invalid @enderror" 
                name="jumlah_karakter_max" id="jumlah_karakter_max" value="{{ old('p_jumlah_karakter_max') }}" placeholder="Masukkan Jumlah maximal kata">
                @error ('jumlah_karakter_max')
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

<!-- Modal Edit Kata -->
@foreach($harga as $h)
<div class="modal fade" id="updateKataModal{{$h->id_parameter_order_teks}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parameter Teks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="/daftar-harga-teks/{{$h->id_parameter_order_teks}}">
      @method('patch')
      @csrf
      
      <div class="modal-body">
    
          <div class="form-group">
                <label>Jumlah Kata Min</label>
                <input type="number" class="form-control @error('jumlah_karakter_min') is-invalid @enderror" 
                name="jumlah_karakter_min" id="jumlah_karakter_min" value="{{$h->jumlah_karakter_min}}" placeholder="Masukkan Jumlah minimal kata">
                @error ('jumlah_karakter_min')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Jumlah Kata Max</label>
                <input type="number" class="form-control @error('jumlah_karakter_max') is-invalid @enderror" 
                name="jumlah_karakter_max" id="jumlah_karakter_max" value="{{$h->jumlah_karakter_max}}" placeholder="Masukkan Jumlah maximal kata">
                @error ('jumlah_karakter_max')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>

          <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control @error('harga') is-invalid @enderror" 
              name="harga" id="harga" value="{{$h->harga}}" placeholder="Masukkan harga ex. 100000">
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

<!-- Parameter Jumlah Kata -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">

                 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Parameter Teks
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
                    <th scope="row" class="text-center">Jumlah Kata</th>
                    <th scope="row" class="text-center">Harga</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($harga as $harga)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$harga->id_parameter_order_teks}}</td>
                    <td scope="row" class="text-center">{{$harga->jumlah_karakter_min}} - {{$harga->jumlah_karakter_max}}</td>
                    <td scope="row" class="text-center">{{$harga->harga}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateKataModal{{$harga->id_parameter_order_teks}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-sm btn-danger delete" harga-num="{{$loop->iteration}}" harga-id="{{$harga->id_parameter_order_teks}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- Delete Kata -->
<script>
    $('.delete').click(function(){

        var harga_id = $(this).attr('harga-id')
        var harga_num = $(this).attr('harga-num')

        Swal.fire({
          title: "Apakah Anda Yakin?",
          text: "Hapus parameter teks "+harga_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/daftar-harga-teks/"+harga_id+"/delete";  
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
@endpush



