@extends('layouts.klien.sidebar_show')

@section('title', 'Show Order Dubbing')
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
                            <form action="" method="POST" class="d-inline">
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
                                    <td>Durasi Pengerjaan</td>
                                    <td>{{$order->durasi_pengerjaan}} Hari</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Dubber</td>
                                    <td>{{$order->jumlah_dubber}} Orang</td>
                                </tr>
                                <tr>
                                    <td>Nama Video</td>
                                    <td>{{$order->nama_dokumen}}</td>
                                </tr>
                                <tr>
                                    <td>Dokumen</td>
                                    <td>{{$order->path_file}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Video</td>
                                    <td>{{(($order->durasi_video/60)%60)}} Menit</td>
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
        <form action="{{route('update_order_dubbing', $order->id_order)}}" method="post">
            @csrf
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
                <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
                <input type="number" class="form-control" placeholder="Masukkan Durasi Pengerjaan" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$order->durasi_pengerjaan}}">
            </div>
            <br>
            <div class="form-group">
                <label for="jumlah_dubber">Jumlah Dubber</label>
                <input type="number" class="form-control" placeholder="Masukkan Jumlah Dubber Disini" name="jumlah_dubber" id="jumlah_dubber" value="{{$order->jumlah_dubber}}">
            </div>
            <br>
            {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_dokumen" class="col-form-label">Nama Video</label>
                        <h6 for="durasi_pengerjaan"> * Video Anda = {{$order->path_file}}</h6>
                    <br>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="{{$order->nama_dokumen}}">
                    </div>
                    <div class="form-group">
                        <label for="path_file" class="col-form-label" value="{{$order->path_file}}">Upload Video</label>
                        <label for="path_file" class="col-form-label">Dokumen berupa : mp4, mpeg, avi</label>
                        <div class="modal-body" value="{{$order->path_file}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" id="path_file" name="path_file" required="required" value="{{$order->path_file}}">
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                    <label for="durasi_video" class="col-form-label" value="{{$order->durasi_video}}"></label>
                        <input type="hidden" name="durasi_video" id="durasi_video" oninput="updateInfos()" >
                        <span type="text"  id="dr_video" name="dr_video">
                    </div>

                    <br>
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
        var myVideos = [];
             console.log(myVideos);
        window.URL = window.URL || window.webkitURL;
        document.getElementById('path_file').onchange = setFileInfo;

        function setFileInfo() {
        var files = this.files;
             console.log(files);
        myVideos.push(files[0]);
        var video = document.createElement('video');
             console.log(video);
        video.preload = 'metadata';

        video.onloadedmetadata = function() {
            window.URL.revokeObjectURL(video.src);
            var duration = video.duration;
                 console.log(duration);
            $('#durasi_video').val(duration);
            myVideos[myVideos.length - 1].duration = duration;
            
        }
        video.src = URL.createObjectURL(files[0]);;
        }

        function updateInfos() {
        var duration = video.duration;
             console.log(duration);
        $('#durasi_video').val(duration);

        $("#durasi_video").val()
        var dr_video = document.getElementById("dr_video");
             console.log(dr_video);
        $('#durasi_video').val(dr_video);

        var durasi_video = document.getElementById("durasi_video");
             console.log(durasi_video);
            
        dr_video.textContent = "";
        for (var i = 0; i < myVideos.length; i++) {
             console.log(i);
            dr_video.textContent += myVideos[i].name + " duration: " + myVideos[i].duration + '\n';
        }
        }
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