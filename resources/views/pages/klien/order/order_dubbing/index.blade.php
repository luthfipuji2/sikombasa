@extends('layouts.klien.sidebar')

@section('title', 'Order Dubbing')
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
                <li class="nav-item"><a class="nav-link active" href="#certificate" data-toggle="tab">Order Menu</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">View Order</a></li>
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
                <form action="/order-dubbing" method="POST" enctype="multipart/form-data">
                @csrf

                
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


                <div class="row">
            <div class="col-6">
                <div class="table-container">
    <div class="table-content">
        <div class="box table">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th class="font-weight-bold text-blue">Basic</th>
                        <th class="font-weight-bold text-blue">Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Klien dapat menentukan waktu pengerjaan</td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-tick.svg" width="24" height="24"></td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-tick.svg" width="24" height="24"></td>
                    </tr>
                    <tr>
                        <td><strong>Melalui proses editing dari translator</strong></td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-cross.svg" width="24" height="24"></td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-tick.svg" width="24" height="24"></td>
                    </tr>
                    <tr>
                        <td><strong>Mendapatkan revisi 1 kali</strong></td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-cross.svg" width="24" height="24"></td>
                        <td><img src="https://fpprofile.cdnpk.net/img/icon-tick.svg" width="24" height="24"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

            <!--mulai jenis layanan basic -->
            <div class="col-3 omega">
                <div id="box-annual" data-plan="annual" class="box plans FR-PREMIUM-1 year">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                &nbsp&nbsp<i class="nav-icon fas fa-file"></i>&nbsp&nbsp Layanan Basic
                </div>
            </a>
                <div class="card-header">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="./img/star.gif" style="width:35%; right: 10px;""></img>  
                </div>
                <br>
                <div class="form-check">
                &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="id_parameter_jenis_layanan"  id="id_parameter_jenis_layanan" value="1">
                <label class="form-check-label" for="id_parameter_jenis_layanan"><h5>Jenis Layanan Basic</label>
                <br><br>
                @error('id_parameter_jenis_layanan')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                </div>
            </div>
            </div>
        <!-- Selesai jenis layanan babsic -->

        <!--mulai jenis layanan premium -->
            <div class="col-3 omega">
                <div id="box-annual" data-plan="annual" class="box plans FR-PREMIUM-1 year">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                &nbsp&nbsp<i class="nav-icon fas fa-file"></i>&nbsp&nbsp Layanan Premium
                </div>
            </a>
                <div class="card-header">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="./img/tiara.gif" style="width:35%; right: 10px;""></img>  
                </div>
                <br>
                <div class="form-check">
                &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="id_parameter_jenis_layanan"  id="id_parameter_jenis_layanan" value="2">
                <label class="form-check-label" for="id_parameter_jenis_layanan"><h5>Jenis Layanan Premium</label>
                <br><br>
                @error('id_parameter_jenis_layanan')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                </div>
            </div>
            </div>
            </div>
        <!-- Selesai jenis layanan premium -->

            <br><hr color="grey">


        <br>

        <div class="form-group">
                        <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
                            <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" 
                            id="durasi_pengerjaan" placeholder="Durasi Pengerjaan" name="durasi_pengerjaan">
                                <option value="1">1 Day</option>
                                <option value="2">2 Day</option>
                                <option value="3">3 Day</option>
                                <option value="4">4 Day</option>
                                <option value="5">5 Day</option>
                                <option value="6">6 Day</option>
                                <option value="7">7 Day</option>
                            </select>
                            @error ('durasi_pengerjaan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

        <br>
        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="jumlah_dubber" class="col-form-label">Jumlah Dubber</label>
                        <input type="number" class="form-control" id="jumlah_dubber" name="jumlah_dubber">
                        @error('jumlah_dubber')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen" class="col-form-label">Nama Video</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
                        @error('nama_dokumen')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                    </div>
                    <div class="form-group">
                        <label for="path_file" class="col-form-label">Upload Video</label>
                        <label for="path_file" class="col-form-label">Dokumen berupa : mp4, mpeg, avi</label>
                        <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" id="path_file" name="path_file" required="required">
                                </div>
                            </div>

                    <div class="form-group">
                        <input type="hidden" name="durasi_video" id="durasi_video" oninput="updateInfos()">
                        <span type="text"  id="dr_video" name="dr_video">
                    </div>
                    <hr>
                    </div>
                    <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <br>
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




@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $(".add-more").click(function(){ 
        var html = $(".copy").html();
        $(".after-add-more").after(html);
    });

    // saat tombol remove dklik control group akan dihapus 
    $("body").on("click",".remove",function(){ 
        $(this).parents(".control-group").remove();
    });
    });
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