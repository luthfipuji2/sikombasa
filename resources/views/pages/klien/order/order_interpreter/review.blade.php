@extends('layouts.klien.sidebar_show')
@section('title','Review Order Bertemu Langsung')
@section('content')


 <!-- Modal Tambah -->
@foreach($review as $v)
<div class="modal fade" id="tambah{{$v->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('order-interpreter-review.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$v->id_order}}" hidden>
            <div class="form-group">
              <label for="review_text">Teks Review</label>
                <input type="teks" name="review_text" placeholder="Tuliskan Review Order" class="form-control">
            </div> 
            <div class="form-group">
              <label for="rating">Rating<i class="nav-icon fas fa-star text-yellow"></i></label>
                <input type="number" name="rating" placeholder="Range 1 - 5" class="form-control">
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Tambah</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endforeach
<!-- Selesai Modal Tambah -->

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
                  <li class="nav-item"><a class="nav-link active" href="#review" data-toggle="tab">Review</a></li>
                  <li class="nav-item"><a class="nav-link" href="#riwayat" data-toggle="tab">Riwayat Review</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="review">
                    @foreach($review as $d)
                    <div class="card">
                      <div class="card-header">
                        <p class="font-weight-bold text-muted">No. Order {{$d->id_order}}</p>
                        <p class="font-weight-bold text-blue">Tanggal Order {{$d->tgl_order}}</p>
                      </div>
                      <div class="card-body">
                        <table>
                          <tr>
                            <td><p class="font-weight-bold">Total Pembayaran</p><td> 
                            <td><p class="font-weight">Rp. {{$d->p_harga}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Jenis Layanan</p><td>
                            <td><p class="font-weight">{{$d->p_jenis_layanan}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi</p><td>
                            <td><p class="font-weight">{{$d->lokasi}}</p></td>
                          </tr>
                        </table>
                        <div class="float-right">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah{{$d->id_order}}"><i class="nav-icon fas fa-star text-yellow"></i>Tambah Review</button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="tab-pane" id="riwayat">
                    @foreach($riwayatreview as $r)
                    <div class="card">
                      <div class="card-header">
                        <p class="font-weight-bold text-muted">No. Order {{$r->id_order}}</p>
                        <p class="font-weight-bold text-blue">Tanggal Order {{$r->tgl_order}}</p>
                      </div>
                      <div class="card-body">
                        <table>
                          @if($r->rating=='1')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                          @endif
                          @if($r->rating=='2')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                          @endif
                          @if($r->rating=='3')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                          @endif
                          @if($r->rating=='4')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                          @endif
                          @if($r->rating=='5')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i><i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                          @endif
                        </table>
                      </div>
                    </div><!-- /.tab-pane -->
                    @endforeach
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