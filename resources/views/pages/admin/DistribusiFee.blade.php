@extends('layouts/admin/template')

@section('title', 'Distribusi Fee')

@section('container')

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Distribusi Fee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/distribusi-fee" method="POST" id="editForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nominal Transaksi</label>
                <input type="text" name="nominal_transaksi" id="nominal_transaksi" class="form-control" readonly>
            </div>  
            <div class="form-group">
                <label>Fee Translator</label>
                <input type="text" class="form-control @error('fee_translator') is-invalid @enderror" 
                name="fee_translator" id="fee_translator" placeholder="Masukkan Fee Translator">
                @error ('fee_translator')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fee Sistem</label>
                <input type="text" class="form-control @error('fee_sistem') is-invalid @enderror" 
                name="fee_sistem" id="fee_sistem" placeholder="Masukkan Fee Sistem">
                @error ('fee_sistem')
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

<!-- Modal Input -->
@foreach ($fee as $e)
<div class="modal fade" id="inputModal{{$e->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nominal Fee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('distribusi-fee.store')}}" method="POST">

      {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group" hidden>
                <label for="name">ID Transaksi</label>
                <input type="text" name="id_transaksi" value="{{ $e->id_transaksi }}">
            </div>
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" value="{{$e->tgl_transaksi}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nominal Transaksi</label>
                <input type="text" name="nominal_transaksi" value="{{$e->nominal_transaksi}}" class="form-control" readonly>
            </div>  
            <div class="form-group">
                <label>Fee Translator</label>
                <input type="text" class="form-control @error('fee_translator') is-invalid @enderror" 
                name="fee_translator" placeholder="Masukkan Fee Translator">
                @error ('fee_translator')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fee Sistem</label>
                <input type="text" class="form-control @error('fee_sistem') is-invalid @enderror" 
                name="fee_sistem" placeholder="Masukkan Fee Sistem">
                @error ('fee_sistem')
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
              
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th>No</th>
                    <th hidden>ID Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nominal Transaksi</th>
                    <th>Fee Translator</th>
                    <th>Fee Sistem</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($fee as $f)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$f->id_transaksi}}</td>
                    <td>{{$f->tgl_transaksi}}</td>
                    <td>{{$f->nominal_transaksi}}</td>
                    <td>{{$f->fee_translator}}</td>
                    <td>{{$f->fee_sistem}}</td>
                    <td>
                      @if (empty($f->fee_translator) && empty($f->fee_sistem))
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#inputModal{{$f->id_transaksi}}">Input Fee</button>
                      @else
                      <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#editModal">Edit Fee</button>
                      @endif
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

      $('#tgl_transaksi').val(data[2]);
      $('#nominal_transaksi').val(data[3]); 
      $('#fee_translator').val(data[4]); 
      $('#fee_sistem').val(data[5]); 

      $('#editForm').attr('action', '/distribusi-fee/'+data[1]);
      $('#editModal').modal('show');
      
    });

    table.on('click', '.input', function(){

    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')) {
    $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data);

    $('#tgl_transaksi').val(data[2]);
    $('#nominal_transaksi').val(data[3]); 
    $('#fee_translator').val(data[4]); 
    $('#fee_sistem').val(data[5]); 

    $('#inputForm').attr('action', '/distribusi-fee/'+data[1]);
    $('#inputModal').modal('show');

    });

});
</script>
@endpush



