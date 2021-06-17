@extends('layouts.klien.sidebar')

@section('title', 'Show Order Transkrip (Audio)')
@section('content')


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

                <div class="active tab-pane" id="certificate">
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
                                    <td>{{$order->jenis_layanan}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Pengerjaan</td>
                                    <td>{{$order->durasi_pengerjaan}} Hari</td>
                                </tr>
                                <tr>
                                    <td>Nama Audio</td>
                                    <td>{{$order->nama_dokumen}}</td>
                                </tr>
                                <tr>
                                    <td>Dokumen</td>
                                    <td>{{$order->path_file}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Audio</td>
                                    <td>{{$order->durasi_audio}} Seconds</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>{{$order->harga}}</td>
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
        <form action="{{route('update_order_transkrip', $order->id_order)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="idLampiran" value="{{$order->id_order}}" hidden></td>
            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" class="form-control" placeholder="Masukkan nama lampiran" name="jenis_layanan" id="jenis_layanan" value="{{$order->jenis_layanan}}" readonly>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="radio" id="jenis_layanan" name="jenis_layanan" value="basic">
            <label class="form-check-label" for="jenis_layanan">
                Basic
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" id="jenis_layanan"  name="jenis_layanan" value="premium">
            <label class="form-check-label" for="jenis_layanan">
                Premium
            </label>
            </div>
            <br>
            <div class="form-group">
                <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
                <input type="number" class="form-control" placeholder="Masukkan nama lampiran" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$order->durasi_pengerjaan}}">
            </div>
            {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_dokumen" class="col-form-label">Nama Audio</label>
                        <h6 for="durasi_pengerjaan"> * Audio Anda = {{$order->path_file}}</h6>
                    <br>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="{{$order->nama_dokumen}}">
                    </div>
                    <div class="form-group">
                        <label for="path_file" class="col-form-label" value="{{$order->path_file}}">Upload Audio</label>
                        <div class="modal-body" value="{{$order->path_file}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" id="path_file" name="path_file" required="required" value="{{$order->path_file}}">
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                    <label for="durasi_audio" class="col-form-label" value="{{$order->durasi_audio}}"></label>
                        <input type="hidden" name="durasi_audio" id="durasi_audio" oninput="updateInfos()" >
                        <span type="text"  id="dr_audio" name="dr_audio">
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
        var myAudios = [];
             console.log(myAudios);
        window.URL = window.URL || window.webkitURL;
        document.getElementById('path_file').onchange = setFileInfo;

        function setFileInfo() {
        var files = this.files;
             console.log(files);
        myAudios.push(files[0]);
        var audio = document.createElement('audio');
             console.log(audio);
             audio.preload = 'metadata';

            audio.onloadedmetadata = function() {
            window.URL.revokeObjectURL(audio.src);
            var duration = audio.duration;
                 console.log(duration);
            $('#durasi_audio').val(duration);
            myAudios[myAudios.length - 1].duration = duration;
            
        }
        audio.src = URL.createObjectURL(files[0]);;
        }

        function updateInfos() {
        var duration = audio.duration;
             console.log(duration);
        $('#durasi_audio').val(duration);

        $("#durasi_audio").val()
        var dr_audio = document.getElementById("dr_audio");
             console.log(dr_audio);
        $('#durasi_audio').val(dr_audio);

        var durasi_audio = document.getElementById("durasi_audio");
             console.log(durasi_audio);
            
        dr_audio.textContent = "";
        for (var i = 0; i < myAudios.length; i++) {
             console.log(i);
            dr_audio.textContent += myAudios[i].name + " duration: " + myAudios[i].duration + '\n';
        }
        }
</script>
@endpush