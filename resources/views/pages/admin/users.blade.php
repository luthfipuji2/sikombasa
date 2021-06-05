@extends('layouts/admin/template')

@section('title', 'Users & Permission List')

@section('container')

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/bank" method="POST" id="editForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" id="name" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror" 
                    id="role" placeholder="Role" name="role">
                        <option value="admin">Admin</option>
                        <option value="klien">Client</option>
                        <option value="translator">Translator</option>
                    </select>
                    @error ('role')
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
                    <th scope="row" class="text-center" hidden>ID User</th>
                    <th scope="row" class="text-center">Nama</th>
                    <th scope="row" class="text-center">Email</th>
                    <th scope="row" class="text-center">Role</th>
                    <th scope="row" class="text-center">Created At</th>
                    <th scope="row" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" hidden>{{$user->id}}</td>
                    <td scope="row" class="text-center">{{$user->name}}</td>
                    <td scope="row" class="text-center">{{$user->email}}</td>
                    <td scope="row" class="text-center">{{$user->role}}</td>
                    <td scope="row" class="text-center">{{$user->created_at}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#updateModal"><i class="fas fa-pencil-alt"></i></button>
                      <a href="#" class="btn btn-danger btn-sm delete" user-id="{{$user->id}}" user-num="{{$loop->iteration}}"><i class="fas fa-trash-alt"></i></a>
                      
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

        var user_id = $(this).attr('user-id')
        var user_num = $(this).attr('user-num')

        Swal.fire({
          title: "Apakah anda yakin?",
          text: "Hapus data user "+user_num+"??",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/users/"+user_id+"/delete";  
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

    $('#name').val(data[2]);
    $('#email').val(data[3]);
    $('#role').val(data[4]);

    $('#editForm').attr('action', '/users/'+data[1]);
    $('#editModal').modal('show');
    
  });
});
</script>
@endpush