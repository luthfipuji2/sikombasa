@extends('layouts/admin/template')

@section('title', 'Daftar Transaksi')

@section('container')

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Status Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/daftar-transaksi" method="POST" id="editForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">
            <div class="form-group">
                <label>Tanggal Order</label>
                <input type="text" name="tgl_order" id="tgl_order" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nominal Transaksi</label>
                <input type="text" name="nominal_transaksi" id="nominal_transaksi" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="status_transaksi">Status Transaksi</label>
                    <select class="form-control @error('status_transaksi') is-invalid @enderror" 
                     id="status_transaksi" name="status_transaksi">
                    
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

<!-- Modal Detail -->
@foreach ($transaksi as $r)
<div class="modal fade" id="detailModal{{$r->id_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi {{$loop->iteration}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="detailForm">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

        <div class="modal-body">

          <!-- Main content -->
            <section class="content">

              <!-- Default box -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                      <div class="row">
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Tanggal Order</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$r->tgl_order}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Tanggal Transaksi</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$r->tgl_transaksi}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="info-box bg-light">
                            <div class="info-box-content">
                              <span class="info-box-text text-center text-muted">Total Order</span>
                              <span class="info-box-number text-center text-muted mb-0">{{$r->harga}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                        <div class="col-12">

                            <div class="post">

                              @if (!empty($r->jenis_layanan))
                              <div class="user-block">
                                  <b>Jenis Layanan</b>
                                  <p class="text-muted">
                                    {{$r->jenis_layanan}}
                                  </p>
                              </div>
                              @endif
                            
                  
                              @if (!empty($r->text))
                              <div class="user-block">
                                  <b>Text</b>
                                  <p class="text-muted">
                                    {{ substr($r->text, 0,  500) }}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->jumlah_karakter))
                              <div class="user-block">
                                  <b>Jumlah Karakter</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_karakter}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->jumlah_halaman))
                              <div class="user-block">
                                  <b>Jumlah Halaman</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_halaman}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_video))
                              <div class="user-block">
                                  <b>Durasi Video</b>
                                  <p class="text-muted">
                                    {{$r->durasi_video}}
                                  </p>
                              </div>
                              @endif


                              @if (!empty($r->jumlah_dubber))
                              <div class="user-block">
                                  <b>Jumlah Dubber</b>
                                  <p class="text-muted">
                                    {{$r->jumlah_dubber}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_pertemuan))
                              <div class="user-block">
                                  <b>Durasi Pertemuan</b>
                                  <p class="text-muted">
                                    {{$r->durasi_pertemuan}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->durasi_pengerjaan))
                              <div class="user-block">
                                  <b>Durasi Pengerjaan</b>
                                  <p class="text-muted">
                                    {{$r->durasi_pengerjaan}} Hari
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->latitude))
                              <div class="user-block">
                                  <b>Latitude</b>
                                  <p class="text-muted">
                                    {{$r->latitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->longitude))
                              <div class="user-block">
                                  <b>Longitude</b>
                                  <p class="text-muted">
                                    {{$r->longitude}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->lokasi))
                              <div class="user-block">
                                  <b>Lokasi</b>
                                  <p class="text-muted">
                                    {{$r->lokasi}}
                                  </p>
                              </div>
                              @endif

                              @if (!empty($r->nama_dokumen))
                              <b>Project files</b>
                              <ul class="list-unstyled">
                                <li>
                                  <a><i class="fas fa-file-upload"></i> {{$r->nama_dokumen}}</a>
                                </li>
                              </ul>
                              @endif
                              <!-- /.user-block -->     
                            </div>         
                        </div>
                      
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                      <h3 class="text-primary"><i class="fas fa-globe"></i> SIKOMBASA</h3>
                      <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                      <br>
                      <div class="text-muted">
                        <p class="text-sm">Nama
                          <b class="d-block">{{$r->name}}</b>
                        </p>
                        <p class="text-sm">Email
                          <b class="d-block">{{$r->email}}</b>
                        </p>
                      </div>

                      <h5 class="mt-5 text-muted">Status Transaksi</h5>
                      <ul class="list-unstyled">
                        <li>
                          <a class="btn-link text-secondary"><b>{{$r->status_transaksi}}</b></a>
                        </li>
                      </ul>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              
              <!-- /.card -->

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
                <div class="card-tools">
              
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>   
                  <tr>
                    <th scope="row" class="text-center">No</th>
                    <th scope="row" class="text-center" hidden>ID Transaksi</th>
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
                    <td scope="row" class="text-center" hidden>{{$t->id_transaksi}}</td>
                    <td scope="row" class="text-center">{{$t->tgl_order}}</td>
                    <td scope="row" class="text-center">{{$t->tgl_transaksi}}</td>
                    <td scope="row" class="text-center">{{$t->nominal_transaksi}}</td>
                    <td scope="row" class="text-center"><a href="{{route('bukti.download', $t->id_transaksi)}}">{{$t->bukti_transaksi}}</a></td>
                    <td scope="row" class="text-center">{{$t->status_transaksi}}</td>
                    <td scope="row" class="text-center">
                      <button type="button" class="btn btn-success btn-sm edit" data-toggle="modal" data-target="#updateModal">Edit Status</button>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal{{$t->id_transaksi}}"><i class="fas fa-info"></i></button>
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



