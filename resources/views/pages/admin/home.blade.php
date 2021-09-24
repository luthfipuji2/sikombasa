@extends('layouts/admin/template')

@section('title', 'Dashboard')

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
        <div class="row mt-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$order}}</h3>
                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/daftar-order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user}}</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$translator}}</h3>
                <p>Translators</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/daftar-translator" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$klien}}</h3>
                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="daftar-klien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg connectedSortable">

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


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->

@endsection

@push('addon-script')
<script>
$(document).ready(function () {

  var table = $('#datatable').DataTable({
    pageLength : 5,
  })
    
});
</script>
@endpush