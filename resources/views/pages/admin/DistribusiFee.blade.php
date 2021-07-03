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

      <form action="/distribusi-fee" method="POST" id="editForm" enctype="multipart/form-data">

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
                <input type="number" class="form-control @error('fee_translator') is-invalid @enderror" 
                name="fee_translator" id="fee_translator" placeholder="Masukkan Fee Translator">
                @error ('fee_translator')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fee Sistem</label>
                <input type="number" class="form-control @error('fee_sistem') is-invalid @enderror" 
                name="fee_sistem" id="fee_sistem" placeholder="Masukkan Fee Sistem">
                @error ('fee_sistem')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Bukti Pembayaran Fee</label>
                <input type="file" class="form-control @error('bukti_fee_trans') is-invalid @enderror" 
                name="bukti_fee_trans" id="bukti_fee_trans" placeholder="Masukkan Fee Sistem">
                @error ('bukti_fee_trans')
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

      <form action="{{route('distribusi-fee.store')}}" method="POST" enctype="multipart/form-data">

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
                <input type="number" class="form-control @error('fee_translator') is-invalid @enderror" 
                name="fee_translator" placeholder="Masukkan Fee Translator">
                @error ('fee_translator')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Fee Sistem</label>
                <input type="number" class="form-control @error('fee_sistem') is-invalid @enderror" 
                name="fee_sistem" placeholder="Masukkan Fee Sistem">
                @error ('fee_sistem')
                  <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Bukti Pembayaran Fee</label>
                <input type="file" class="form-control @error('bukti_fee_trans') is-invalid @enderror" 
                name="bukti_fee_trans" id="bukti_fee_trans" placeholder="Masukkan Fee Sistem">
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
                    <th scope="row" class="text-center">No</th>
                    <th scope="row" class="text-center" hidden>ID</th>
                    <th scope="row" class="text-center" hidden>ID Transaksi</th>
                    <th scope="row" class="text-center">Tanggal Transaksi</th>
                    <th scope="row" class="text-center">Nominal Transaksi</th>
                    <th scope="row" class="text-center">Fee Translator</th>
                    <th scope="row" class="text-center">Fee Sistem</th>
                    <th scope="row" class="text-center" style="width: 100">Bukti Pembayaran Fee</th>
                    <th scope="row" class="text-center">Status order</th>
                    <th scope="row" class="text-center" >Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($fee as $f)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$f->id_fee}}</td>
                    <td scope="row" class="text-center" hidden>{{$f->id_transaksi}}</td>
                    <td scope="row" class="text-center">{{$f->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">{{$f->nominal_transaksi}}</td>
                    <td scope="row" class="text-center">{{$f->fee_translator}}</td>
                    <td scope="row" class="text-center">{{$f->fee_sistem}}</td>
                    <td scope="row" class="text-center">{{$f->bukti_fee_trans}}</td>
                    
                    <td scope="row" class="text-center">
                    @if(!empty($f->status))
                    {{$f->status}}
                    @elseif(!empty($f->status_at))
                    {{$f->status_at}}
                    </td>
                    @endif

                    <td scope="row" class="text-center">
                      
                      
                      @if(!empty($f->fee_translator) && !empty($f->fee_sistem) && !empty($f->bukti_fee_trans))
                      @elseif (!empty($f->fee_translator) && !empty($f->fee_sistem) && empty($f->bukti_fee_trans))
                      <button type="button" class="btn btn-success btn-sm edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                      @elseif ($f->status_at === 'selesai' || $f->status === 'selesai')
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inputModal{{$f->id_transaksi}}"><i class="fas fa-plus-square"></i></button>
                      @endif
                      <a href="{{route('detail-transaksi', $f->id_transaksi)}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i></a>
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

      $('#tgl_transaksi').val(data[3]);
      $('#nominal_transaksi').val(data[4]); 
      $('#fee_translator').val(data[5]); 
      $('#fee_sistem').val(data[6]); 

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



