@extends('layouts.klien.sidebar')

@section('title', 'Show Order Interpreter')
@section('content')

<div class="container">

<section class="content">

<div class="container-fluid">
        <div class="row">
        <div class="container ">
        {{-- status --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Order Menu</a></li>
                <li class="nav-item"><a class="nav-link active" href="#certificate" data-toggle="tab">View Order</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                <div class="disabled tab-pane" id="progress">
                    <!-- Tab Activity di sini -->
                </div>

                <div class="disabled tab-pane" id="profile">
                    <!-- Tab Profile di sini -->
                </div>

                <div class="disabled tab-pane" id="document">
                <!-- Tab Document di sini -->
                </div>

                <div class="active tab-pane" id="certificate">
                    <form action="  " method="POST" enctype="multipart/form-data">
                    @csrf
                    

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <div>
                            <form action="/order-interpreter" method="POST" class="d-inline">
                                @method('Delete')
                                @csrf
                                <button class="btn btn-danger mx-1 btn-icon" type="submit" onclick="return confirm('Are you sure ?')" class="text-right" style="float: right;"><i class="fas fa-trash-alt"></i>  Batalkan Order</button>
                                <button type="button" class="btn btn-primary mx-1 btn-icon" data-toggle="modal" data-target="#exampleModal{{$order->id_order}}" class="text-right" style="float: right;"><i class="fas fa-pencil-alt"></i>    Update Order</button>
                                <br>
                                <br>
                                </form>
                                </td>
                            </tr>
                            </div>
                            <br>
                                <tr>
                                    <td>Jenis Layanan</td>
                                    <td>{{$order->parameter_order->p_jenis_layanan}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Pertemuan</td>
                                    <td>{{$order->parameter_order->p_durasi_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pertemuan</td>
                                    <td>{{$order->tanggal_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Pertemuan</td>
                                    <td>{{$order->waktu_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Catatan Lokasi</td>
                                    <td>{{$order->lokasi}}</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>{{$order->longitude}}</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>{{$order->latitude}}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>{{$order->parameter_order->harga}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url ('/menu-pembayaran') }}" class="btn btn-success mx-1 btn-icon" type="submit" class="text-right" style="float: right;"><i class="fas fa-sign-in-alt"></i>Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>       
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->


    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModal{{$order->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <div class="modal-body">
            <form action="{{route('update_order_interpreter', $order->id_order)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="idorder" value="{{$order->id_order}}" hidden></td>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="jenis_layanan">Jenis Layanan</label>
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$order->parameter_order->p_jenis_layanan}}" readonly>
                    </div>
                </div class="col">
                <div class="col">
                    <div class="form-group">
                        <label for="jenis_layanan">Durasi Pertemuan</label>
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{$order->parameter_order->p_durasi_pertemuan}}" readonly>
                    </div>
                </div class="col">
        </div>
        <!--Start layanan Basic -->
        <div class="card card-statistic-1">
            <div class="card-icon bg-cyan">
                &nbsp;
                <i class="nav-icon fas fa-medal"></i>
                <i class="nav-icon fas fa-medal"></i>
                <i class="nav-icon fas fa-medal"></i>
            </div>
        <div class="card-wrap">
            <div class="card-header">
                <div>
                    <button class="btn bg-cyan">
                        <label for="basic">Layanan Basic</label>
                    </button>
                </div>
                <label for="basic">Edit Durasi Pertemuan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_order4" name="id_parameter_order" value="4">
                    <label class="form-check-label" for="id_parameter_order">
                        <=1 Day
                    </label>
                </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="id_parameter_order5"  name="id_parameter_order" value="5">
                        <label class="form-check-label" for="id_parameter_order">
                            1-3 Day
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="id_parameter_order6"  name="id_parameter_order" value="6">
                        <label class="form-check-label" for="id_parameter_order">
                            3-5 Day
                        </label>
                    </div>
            </div>
        </div>
        </div>
        <!--selesai layanan basic -->

        <!-- layanan premium -->
        <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                &nbsp;
                <i class="nav-icon fas fa-crown"></i>
                <i class="nav-item fas fa-crown"></i>
                <i class="nav-item fas fa-crown"></i>
                <i class="nav-item fas fa-crown"></i>
                <i class="nav-item fas fa-crown"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                <div>
                <a onclick="layanan_premium()" class="btn btn-danger">
                    <label for="premium">Layanan Premium</label>
                </a>
                </div>
                <div class="card-body">
                </div>
                <div id="premium"></div>
                <label for="basic">Pilih Durasi Pertemuan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_order1" name="id_parameter_order" value="1">
                    <label class="form-check-label" for="id_parameter_order">
                        <=1 Day
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_order2"  name="id_parameter_order" value="2">
                    <label class="form-check-label" for="id_parameter_order">
                        1-3 Day
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_order3"  name="id_parameter_order" value="3">
                    <label class="form-check-label" for="id_parameter_order">
                        3-5 Day
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Selesai layanan premium -->

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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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
        } );
    </script>
@endpush