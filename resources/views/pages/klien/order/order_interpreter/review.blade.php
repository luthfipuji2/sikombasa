@extends('layouts.klien.run')
@section('title','Review Order Bertemu Langsung')
@section('content')


 <!-- Modal Tambah -->
@foreach($review as $v)
<div class="modal fade" id="tambah{{$v->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel">Tambah Review</h5>
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
              <label for="rating">Rating&nbsp;
                <i class="nav-icon fas fa-star text-yellow"></i>
                <i class="nav-icon fas fa-star text-yellow"></i>
                <i class="nav-icon fas fa-star text-yellow"></i>
                <i class="nav-icon fas fa-star text-yellow"></i>
                <i class="nav-icon fas fa-star text-yellow"></i>
              </label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="1">
                <label class="form-check-label" for="rating">1</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="2">
                <label class="form-check-label" for="rating">2</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="3">
                <label class="form-check-label" for="rating">3</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="4">
                <label class="form-check-label" for="rating">4</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rating" id="rating" value="5">
                <label class="form-check-label" for="rating">5</label>
              </div>
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
                    @if(!empty($d->lokasi) && ($d->id_review == NULL))
                    <div class="card">
                      <div class="card-header">
                      <p class="font-weight-bold text-red"><b class="font-weight-bold text-dark">No. Order :</b> TR{{date('dmy', strtotime($d->tgl_order))}}{{$d->id_order}}</p>
                      <p class="font-weight-bold text-muted">Tanggal Order {{date('Y-m-d',strtotime($d->tgl_order))}}</p>
                      </div>
                      <div class="card-body">
                        <table>
                          <tr>
                            <td><p class="font-weight-bold">Total Pembayaran</p><td> 
                            <td><p class="font-weight">Rp. {{($d->p_harga)/1000}}.000</p></td>
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
                          <button type="button" class="btn btn-sm bg-orange text-white" data-toggle="modal" data-target="#tambah{{$d->id_order}}"><i class="nav-icon fas fa-star text-white"></i>Tambah Review</button>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                  <div class="tab-pane" id="riwayat">
                    @foreach($riwayatreview as $r)
                    @if(!empty($r->id_review) && ($r->lokasi))
                    <div class="card">
                      <div class="card-header">
                        <p class="font-weight-bold text-red"><b class="font-weight-bold text-dark">No. Order :</b> TR{{date('dmy', strtotime($r->tgl_order))}}{{$r->id_order}}</p>
                        <p class="font-weight-bold text-green"><b class="font-weight-bold text-dark">Tanggal Order :</b> {{date('Y-m-d',strtotime($r->tgl_order))}}</p>
                      </div>
                      <div class="card-body">
                        <table>
                          @if($r->rating=='1')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          @endif
                          @if($r->rating=='2')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          @endif
                          @if($r->rating=='3')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          @endif
                          @if($r->rating=='4')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          @endif
                          @if($r->rating=='5')
                          <tr>
                            <td><p class="font-weight-bold">Rating </p><td> 
                            <td><p class="font-weight">: <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i>
                            <i class="nav-icon fas fa-star text-yellow"></i></p></td>
                          </tr>
                          @endif
                          <tr>
                            <td><p class="font-weight-bold">Teks Review </p><td>
                            <td><p class="font-weight">: {{$r->review_text}}</p></td>
                          </tr>
                          <tr>
                            <td><p class="font-weight-bold">Lokasi </p><td>
                            <td><p class="font-weight">: {{$r->lokasi}}</p></td>
                          </tr>
                        </table>
                      </div>
                    </div><!-- /.tab-pane -->
                    @endif
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