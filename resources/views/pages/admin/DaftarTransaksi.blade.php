@extends('layouts/admin/template')

@section('title', 'Daftar Transaksi')

@section('container')

<!-- Modal Edit -->
@foreach ($transaksi as $r)
<div class="modal fade" id="editModal{{$r->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Status Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/daftar-transaksi/{{$r->id_transaksi}}" method="POST">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Tanggal Order</label>
                <input type="text" name="tgl_order" value="{{$r->tgl_order}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" value="{{$r->tgl_transaksi}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nominal Transaksi</label>
                <input type="text" name="nominal_transaksi" value="{{$r->nominal_transaksi}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="status_transaksi">Status Transaksi</label>
                    <select class="form-control @error('status_transaksi') is-invalid @enderror" 
                     value="status_transaksi" name="status_transaksi">
                      <option hidden>{{$r->status_transaksi}}</option>
                      <option value="Pending">Pending</option>
                      <option value="Berhasil">Berhasil</option>
                      <option value="Gagal">Gagal</option>
                    </select>
                    @error ('status_transaksi')
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
                    <th scope="row" class="text-center">ID Transaksi</th>
                    <th scope="row" class="text-center">Tanggal Order</th>
                    <th scope="row" class="text-center">Tanggal Transaksi</th>
                    <th scope="row" class="text-center">Nominal Transaksi</th>
                    <th scope="row" class="text-center">Bukti Transaksi</th>
                    <th scope="row" class="text-center">Status</th>
                    <th scope="row" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($transaksi as $t)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$t->id_transaksi}}</td>
                    <td scope="row" class="text-center">{{$t->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$t->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">{{$t->nominal_transaksi}}</td>
                    <td scope="row" class="text-center"><a href="{{route('bukti.download', $t->id_transaksi)}}">{{$t->bukti_transaksi}}</a></td>
                    <td scope="row" class="text-center">{{$t->status_transaksi}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal{{$t->id_transaksi}}">Edit Status</button>
                      <a href="{{route('detail-transaksi', $t->id_transaksi)}}" class="btn btn-sm btn-primary">Detail</i></a>
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

      $('#tgl_order').val(data[2]);
      $('#tgl_transaksi').val(data[3]);
      $('#nominal_transaksi').val(data[4]); 
      $('#bukti_transaksi').val(data[5]); 
      $('#status_transaksi').val(data[6]); 

      $('#editForm').attr('action', '/daftar-transaksi/'+data[1]);
      $('#editModal').modal('show');
      
    });

    table.on('click', '.detail', function(){

      $tr = $(this).closest('tr');
      if($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#tgl_order').val(data[2]);
      $('#tgl_transaksi').val(data[3]);
      $('#nominal_transaksi').val(data[4]); 
      $('#bukti_transaksi').val(data[5]); 
      $('#status_transaksi').val(data[6]);

      $('#detailForm').attr('action', '/daftar-transaksi/'+data[1]);
      $('#detailModal').modal('show');

    });

});
</script>
@endpush



