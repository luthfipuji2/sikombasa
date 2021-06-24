@extends('layouts/admin/template')

@section('title', 'Daftar Admin')

@section('container')

<!-- Modal Detail -->
@foreach ($admin as $a)
<div class="modal fade" id="detailModal{{$a->id_admin}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form  method="POST" id="detailForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Nama Admin</label>
                <input type="text" value="{{$a->name}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Foto Profile</label>
                <br>
                @if (!empty($a->profile_photo_path))
                  <a href="{{ route('users.download', $a->id) }}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i></a>
                @endif            
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="text" value="{{$a->email}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" value="{{$a->role}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" value="{{$a->jenis_kelamin}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" value="{{$a->tgl_lahir}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Handphone</label>
                <input type="text" value="{{$a->no_telp}}" class="form-control" readonly>
            </div>
          </div>
          
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" class="form-control" readonly>{{$a->alamat}}</textarea>
            </div>
            <div class="form-group">
                <label>Kecamatan</label>
                <input type="text" value="{{$a->kecamatan}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kabupaten</label>
                <input type="text" value="{{$a->kabupaten}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" value="{{$a->provinsi}}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" value="{{$a->kode_pos}}" class="form-control" readonly>
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        
            
        
        
            
            
        </div>
      

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center" style="width: 50px">No</th>
                    <th scope="row" class="text-center" hidden>ID Admin</th>
                    <th scope="row" class="text-center">Nama Admin</th>
                    <th scope="row" class="text-center" hidden>Email</th>
                    
                    <th scope="row" class="text-center" hidden>Jenis Kelamin</th>
                    <th scope="row" class="text-center" hidden>Tanggal Lahir</th>
                    <th scope="row" class="text-center" hidden>Nomor Telepon</th>
                    <th scope="row" class="text-center" hidden>Alamat</th>
                    <th scope="row" class="text-center" hidden>Kecamatan</th>
                    <th scope="row" class="text-center" hidden>Kota/Kabupaten</th>
                    <th scope="row" class="text-center" hidden>Provinsi</th>
                    <th scope="row" class="text-center" hidden>Kode Pos</th>
                    <th scope="row" class="text-center" style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($admin as $admin)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$admin->id_admin}}</td>
                    <td scope="row" class="text-center">{{$admin->name}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->email}}</td>
         
                    <td scope="row" class="text-center" hidden>{{$admin->jenis_kelamin}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->tgl_lahir}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->no_telp}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->alamat}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->kecamatan}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->kabupaten}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->provinsi}}</td>
                    <td scope="row" class="text-center" hidden>{{$admin->kode_pos}}</td> 
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-sm btn-primary detail" data-toggle="modal" data-target="#detailModal{{$admin->id_admin}}"><i class="fas fa-info"></i></button>
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
                titleAttr: 'PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
            }
    ]
  })
     
    table.on('click', '.detail', function(){

    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data);

    $('#name').val(data[2]);
    $('#email').val(data[3]);
    $('#role').val(data[4]); 
    $('#jenis_kelamin').val(data[5]); 
    $('#tgl_lahir').val(data[6]); 
    $('#no_telp').val(data[7]); 
    $('#alamat').val(data[8]); 
    $('#kecamatan').val(data[9]); 
    $('#kabupaten').val(data[10]); 
    $('#provinsi').val(data[11]); 
    $('#kode_pos').val(data[12]); 

    $('#detailForm').attr('action', '/daftar-admin/'+data[1]);
    $('#detailModal').modal('show');
    
  });
});
</script>
@endpush



