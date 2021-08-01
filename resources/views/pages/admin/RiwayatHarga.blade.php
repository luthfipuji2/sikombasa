@extends('layouts/admin/template')

@section('title', 'Riwayat Perubahan Harga')

@section('container')

<!-- Parameter Jenis Layanan -->
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
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Jenis Layanan</th>
                    <th scope="row" class="text-center">Jenis Layanan</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($layanan as $layanan)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" >{{$layanan->id_parameter_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$layanan->parameter_layanan->p_jenis_layanan}}</td>
                    <td scope="row" class="text-center">{{$layanan->harga_perubahan}}</td>
                    <td scope="row" class="text-center">{{$layanan->deskripsi}}</td>
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

<!-- Parameter Jenis Teks -->
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
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Jenis Teks</th>
                    <th scope="row" class="text-center">Jenis Teks</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($jenis_teks as $jt)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$jt->id_parameter_jenis_teks}}</td>
                    <td scope="row" class="text-center">{{$jt->parameter_jenis_teks->p_jenis_teks}}</td>
                    <td scope="row" class="text-center">{{$jt->harga_perubahan}}</td>
                    <td scope="row" class="text-center">{{$jt->deskripsi}}</td>
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

<!-- Parameter Jumlah Kata -->
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
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Teks</th>
                    <th scope="row" class="text-center">Jumlah Kata</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($teks as $teks)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center" >{{$teks->id_parameter_order_teks}}</td>
                    <td scope="row" class="text-center">{{$teks->parameter_teks->jumlah_karakter_min}} - {{$teks->parameter_teks->jumlah_karakter_max}}</td>
                    <td scope="row" class="text-center">{{$teks->harga_perubahan}}</td>
                    <td scope="row" class="text-center">{{$teks->deskripsi}}</td>
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

<!-- Parameter Dokumen -->
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
                    <th scope="row" class="text-center" style="width: 100px">No</th>
                    <th scope="row" class="text-center" style="width: 100px">ID Parameter Dokumen</th>
                    <th scope="row" class="text-center">Jumlah Halaman</th>
                    <th scope="row" class="text-center">Riwayat Harga</th>
                    <th scope="row" class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dokumen as $d)
                  <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="row" class="text-center">{{$d->id_parameter_order_dokumen}}</td>
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



