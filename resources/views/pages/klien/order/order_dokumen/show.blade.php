@extends('layouts.klien.sidebar_show')

@section('title', 'Show Order Dokumen')
@section('content')

<link rel="stylesheet" href="{{ asset('css/refresh.css') }}">
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
                <li class="nav-item"><a class="nav-link disabled" href="#progress" data-toggle="tab">Transaksi</a></li>
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

                <body>
                    <button type="submit" value="Refresh Page" onClick="document.location.reload(true)" class="btn-green" >
                        <img  class="icon" src="https://htmlacademy.ru/assets/icons/reload-6x-white.png"> &nbsp; &nbsp; Cek Harga
                    </button>
                </body>

                    <form action="  " method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <div>
                            <form action="/order-dokumen" method="POST" class="d-inline">
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
                                    <td>{{$order->parameterjenislayanan->p_jenis_layanan}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Teks</td>
                                    <td>{{$order->parameterjenisteks->p_jenis_teks}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Pengerjaan</td>
                                    <td>{{$order->durasi_pengerjaan}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Dokumen</td>
                                    <td>{{$order->nama_dokumen}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Halaman Dokumen</td>
                                    <td>{{$order->jumlah_halaman}}</td>
                                </tr>
                                <tr>
                                    <td>Dokumen</td>
                                    <td >{{$order->path_file}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Total Harga</th>
                                    <th>{{$order->harga}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url ('/menu-pembayaran') }}" class="btn btn-success mx-1 btn-icon" class="text-right" style="float: right;">Transaksi    <i class="fas fa-sign-in-alt"></i></a>
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

                        {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

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
                <form action="{{route('update_order_dokumen', $order->id_order)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                    <input type="text" name="idLampiran" value="{{ old('id_order') }}" hidden></td>
                    <div class="form-group">
                        <label for="id_parameter_jenis_layanan">Jenis Layanan</label>
                        <input type="text" class="form-control" placeholder="Masukkan jenis layanan" value="{{$order->parameterjenislayanan->p_jenis_layanan}}" readonly>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_jenis_layanan" name="id_parameter_jenis_layanan" value="1">
                    <label class="form-check-label" for="id_parameter_jenis_layanan">
                        Basic
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_jenis_layanan"  name="id_parameter_jenis_layanan" value="2">
                    <label class="form-check-label" for="id_parameter_jenis_layanan">
                        Premium
                    </label>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="id_parameter_jenis_teks">Jenis Teks</label>
                        <input type="text" class="form-control" placeholder="Masukkan jenis teks"  value="{{$order->parameterjenisteks->p_jenis_teks}}" readonly>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_jenis_teks" name="id_parameter_jenis_teks" value="1">
                    <label class="form-check-label" for="id_parameter_jenis_teks">
                        Umum
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" id="id_parameter_jenis_teks"  name="id_parameter_jenis_teks" value="2">
                    <label class="form-check-label" for="id_parameter_jenis_teks">
                        Khusus
                    </label>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
                        <input type="number" class="form-control" placeholder="Masukkan durasi pengerjaan" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$order->durasi_pengerjaan}}"> 
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen" class="col-form-label">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="{{$order->nama_dokumen}}">
                    </div>

                    <div class="form-group">
                        <input type="number" name="jumlah_halaman" value="{{$order->jumlah_halaman}}" hidden></td>
                        <label for="jumlah_halaman" class="col-form-label">Jumlah Halaman Dokumen</label>
                        <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="{{$order->jumlah_halaman}}">
                    </div>

                    <div class="form-group">
                        <label for="path_file" class="col-form-label">Upload Dokumen</label>
                        <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                <h6 for="path_file"> * Dokumen Anda = {{$order->path_file}}</h6>
                                <br>
                                    <input type="file" name="path_file" required="required" value="{{$order->path_file}}">
                                </div>
                            </div>
                    </div>
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
    </div><!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kriteria-table').DataTable();
        } );
    </script>
@endpush

@push('scripts')
    <script>
        function reloadpage()
        {
        location.reload()
        }
    </script>
@endpush