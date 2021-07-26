@extends('layouts/admin/template')

@section('title', 'Daftar Bank')

@section('container')

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('bank.store')}}" method="POST">

      {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" 
                name="nama_bank" class="form-control" placeholder="Masukkan Nama Bank">
                @error ('nama_bank')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama Rekening</label>
                <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror"
                name="nama_rekening" class="form-control" placeholder="Masukkan Nama Rekening">
                @error ('nama_rekening')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="text" class="form-control @error('no_rekening') is-invalid @enderror"
                name="no_rekening" class="form-control" placeholder="Masukkan Nomor Rekening">
                @error ('no_rekening')
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
@foreach ($bank as $b)
<div class="modal fade" id="editModal{{$b->id_bank}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/bank/{{$b->id_bank}}" method="POST">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" name="nama_bank" value="{{$b->nama_bank}}" class="form-control" placeholder="Masukkan Nama Bank">
            </div>
            <div class="form-group">
                <label>Nama Rekening</label>
                <input type="text" name="nama_rekening" value="{{$b->nama_rekening}}" class="form-control" placeholder="Masukkan Nama Rekening">
            </div>
            <div class="form-group">
                <label>Nomor Rekening</label>
                <input type="text" name="no_rekening" value="{{$b->no_rekening}}" class="form-control" placeholder="Masukkan Nomor Rekening">
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
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Bank
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center">No</th>
                    <th scope="row" class="text-center" hidden>ID Bank</th>
                    <th scope="row" class="text-center">Nama Bank</th>
                    <th scope="row" class="text-center">Nama Rekening</th>
                    <th scope="row" class="text-center">No Rekening</th>
                    <th scope="row" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($bank as $bank)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$bank->id_bank}}</td>
                    <td scope="row" class="text-center">{{$bank->nama_bank}}</td>
                    <td scope="row" class="text-center">{{$bank->nama_rekening}}</td>
                    <td scope="row" class="text-center">{{$bank->no_rekening}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$bank->id_bank}}"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-danger btn-sm delete" bank-id="{{$bank->id_bank}}" bank-num="{{$loop->iteration}}"><i class="fas fa-trash-alt"></i></a>
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

        var bank_id = $(this).attr('bank-id')
        var bank_num = $(this).attr('bank-num')

        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Hapus data bank "+bank_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/bank/"+bank_id+"/delete";  
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
@endpush



