@extends('layouts.translator.master')
@section('title', 'Find a Job')
@section('content')


<!-- Modal Terima -->
@foreach($detail as $d)
<div class="modal fade" id="terimaOrder{{$d->id_order}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">No. Order {{$d->order->id_order}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('update_find_a_job', $d->order->id_order)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
            Apakah Anda Yakin Ingin Mengambil Order Ini ?
            <input type="text" name="id_translator" id="id_translator" value="{{$translator->id_translator}}" class="form-input" hidden>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-success">Yes</button>
        </div>
      </div>
      </form>

    </div>
  </div>
</div>
@endforeach


<div class="container">
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#review" data-toggle="tab">List Order</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="list">
                    @foreach($detail as $d)
                    <div class="card">
                      <div class="card-header">
                        <p class="font-weight-bold text-muted">No. Order {{$d->id_order}}</p>
                        <p class="font-weight-bold text-blue">Tanggal Order {{$d->tgl_order}}</p>
                      </div>
                      <div class="card-body">
                        <table width="250px">
                          @if(!empty($d->order->harga))
                          <tr>
                            <td><p class="font-weight-bold">Total Pembayaran</p><td> 
                            <td><p class="font-weight">Rp. {{$d->order->harga}}</p></td>
                          </tr>
                          @else
                          <tr>
                            <td><p class="font-weight-bold">Total Pembayaran</p><td> 
                            <td><p class="font-weight">Rp. {{$d->p_harga}}</p></td>
                          </tr>
                          @endif
                          @if(!empty($d->parameter_order->p_jenis_layanan))
                          <tr>
                            <td><p class="font-weight-bold">Jenis Layanan</p><td>
                            <td><p class="font-weight">{{$d->parameter_order->p_jenis_layanan}}</p></td>
                          </tr>
                         @else
                         <tr>
                            <td><p class="font-weight-bold">Jenis Layanan</p><td>
                            <td><p class="font-weight">{{$d->p_jenis_layanan}}</p></td>
                          </tr>
                         @endif
                          <tr>
                            <td><p class="font-weight-bold">Menu</p><td>
                            <td><p class="font-weight">{{$d->menu}}</p></td>
                          </tr>
                        </table>
                        <div class="float-right">
                          <button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#terimaOrder{{$d->id_order}}" ><i class="nav-icon fas fa-handshake"></i> Accept</button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div><!-- /.card -->
          </div><!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
