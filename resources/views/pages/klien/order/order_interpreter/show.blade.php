@extends('layouts.klien.sidebar')
@section('content')

<div class="container">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="container ">
{{-- status --}}
<div class="row">
        <form action="  " method="POST" enctype="multipart/form-data">
        @csrf
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4 class="text-olive">
                  <i class="fab fa-shopify"></i>  Detail Order Menu Offline
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <br><br>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <br><br>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Jenis Layanan</th>
                      <th>Jenis Menu Offline</th>
                      <th>Durasi Pertemuan</th>
                      <th>Tanggal Pertemuan</th>
                      <th>Waktu Pertemuan</th>
                      <th>Catatan Lokasi</th>
                      <th>Longitude</th>
                      <th>Latitude</th>
                      <th>Jarak</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{$order->parameter_order->p_jenis_layanan}}</td>
                      <td>{{$order->tipe_offline}}</td>
                      <td>{{$order->parameter_order->p_durasi_pertemuan}} Hari</td>
                      <td>{{$order->tanggal_pertemuan}}</td>
                      <td>{{$order->waktu_pertemuan}}</td>
                      <td>{{$order->lokasi}}</td>
                      <td>{{$order->longitude}}</td>
                      <td>{{$order->latitude}}</td>
                      <td>{{$order->jarak}}</td>
                      <td>
                        <form action="/order-interpreter" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-sm bg-red" data-toggle="modal" data-target="#delete"  type="button" class="text-right" style="float: right;"><i class="fas fa-trash-alt"></i></button>
                        <hr>
                        <button type="button" class="btn btn-sm bg-cyan" data-toggle="modal" data-target="#exampleModal{{$order->id_order}}" class="text-right" style="float: right;"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-7">
                  <p class="lead">Payment Methods:</p>
                  <i class="fab fa-cc-visa" alt="Visa"></i>
                  <i class="fab fa-cc-mastercard" alt="Mastercard"></i>
                  <i class="fab fa-cc-amex" alt="American Express"></i>
                  <i class="fab fa-cc-paypal" alt="Paypal"></i>
                  
                  <div style="text-align:justify;">
                  <p class="text-muted well well-sm shadow-none" class="text-align" style="margin-top: 10px;">
                  Setelah melakukan pemesanan, silahkan melakukan pembayaran dengan cara transfer ke salah satu dari rekening bank yang
                  tersedia. Kemudian upload bukti transfer anda. Kami menganjurkan agar anda juga tetap menyimpan bukti transfer anda, 
                  sebagai bukti jika terjadi perselisihan. Tim Sikombasa akan memastikan bahwa bukti transfer yang anda upload valid dan 
                  dana yang anda kirimkan berhasil terkirim.
                  </p></div>
                </div>
                <!-- /.col -->
                <div class="col-5"><br>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Harga (Sudah Termasuk Biaya Transportasi Translator)      :</th>
                        <td> Rp. {{$order->parameter_order->harga}}</td>
                      </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
               <!-- /.col -->
            </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <a href="{{ url ('/menu-pembayaran') }}" class="btn bg-green mx-1 btn-icon" type="submit" class="text-right" style="float: right;"><i class="fas fa-money-check-alt"></i>&nbsp;Submit Payment</a>
                </div>
              </div>
            </div>

            <!-- Modal Delete -->
            <div class="modal modal-danger" id="delete">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data Ini ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline pull-left">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- Modal Edit -->
            <div class="modal fade" id="exampleModal{{$order->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"  role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                <form action="{{route('update_order_interpreter', $order->id_order)}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="idorder" value="{{$order->id_order}}" hidden></td>
                
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_layanan">Jenis Layanan</label>
                                    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$order->parameter_order->p_jenis_layanan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_layanan">Durasi Pertemuan</label>
                                    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$order->parameter_order->p_durasi_pertemuan}}" readonly>
                                </div>
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-cyan">
                                        &nbsp;
                                        <i class="nav-icon fas fa-medal"></i>
                                        <i class="nav-icon fas fa-medal"></i>
                                        <i class="nav-icon fas fa-medal"></i>
                                        &nbsp;
                                        <b>Basic</b>
                                    </div>
                                    <input type="text" name="p_jenis_layanan2" value="Basic" hidden>
                                    <select class="form-control @error('id_parameter_order') is-invalid @enderror" 
                                        id="id_parameter_order" name="id_parameter_order2">
                                        <option value="">--Pilih Durasi Pertemuan--</option>
                                        @foreach ($basic as $b)
                                        <option value="{{$b->id_parameter_order}}">{{$b->p_durasi_pertemuan}}</option>
                                        @endforeach
                                        </select>
                                        @error ('id_parameter_order')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                        @enderror
                                </div>
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-danger">
                                        &nbsp;
                                        <i class="nav-icon fas fa-crown"></i>
                                        <i class="nav-item fas fa-crown"></i>
                                        <i class="nav-item fas fa-crown"></i>
                                        &nbsp;
                                        <b>Premium</b>
                                    </div>
                                    <input type="text" name="p_jenis_layanan" value="Premium" hidden>
                                    <select class="form-control @error('id_parameter_order') is-invalid @enderror" 
                                        id="id_parameter_order" name="id_parameter_order">
                                        <option value="">--Pilih Durasi Pertemuan--</option>
                                        @foreach ($premium as $p)
                                        <option value="{{$p->id_parameter_order}}">{{$p->p_durasi_pertemuan}}</option>
                                        @endforeach
                                    </select>
                                    @error ('id_parameter_order')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select class="form-control @error('tipe_offline') is-invalid @enderror" 
                                        id="tipe_offline" name="tipe_offline">
                                        <option value="">--Edit Jenis Menu Offline--</option>
                                        <option value="Interpreter">Interpreter</option>
                                        <option value="Transkrip">Transkrip</option>
                                    </select>
                                    @error ('tipe_offline')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal_pertemuan">Edit Tanggal Pertemuan</label>
                                        <input type="date" id="tanggal_pertemuan" name="tanggal_pertemuan" value="{{$order->tanggal_pertemuan}}" class="form-control @error('tanggal_pertemuan') is-invalid @enderror">
                                    </div>
                                </div class="col">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="waktu_pertemuan">Edit Waktu Pertemuan</label>
                                        <input type="time" id="waktu_pertemuan" name="waktu_pertemuan" value="{{$order->waktu_pertemuan}}" class="form-control">
                                    </div>
                                </div class="col">
                                </div class="row">
                                    <div class="form-group">
                                        <label for="lokasi" class="col-form-label">Edit Catatan Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$order->lokasi}}">
                                    </div>
                                <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="longitude" value="{{$order->longitude}}" readonly>
                                    </div>
                                </div class="col">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="latitude" value="{{$order->latitude}}" readonly>
                                    </div>
                                </div class="col">
                                </div class="row">
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div> 
<!-- /.tab-content -->
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
</div><!-- /.container-fluid -->
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#kriteria-table').DataTable();
    });
</script>
@endpush

