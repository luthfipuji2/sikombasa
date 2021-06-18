@extends('layouts.klien.sidebar')

@section('title', 'Order Transkrip (Audio)')
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
                <form action="{{route('order-transkrip.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
        
        
        <!-- layanan basic -->
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
                <a onclick="layanan_basic()" class="btn bg-cyan">
                    <label for="id_parameter_jenis_layanan">Layanan Basic</label>
                </a>
                </div>
                <div class="card-body">
                </div>
                <div id="id_parameter_jenis_layanan"></div>
                <div class="form-check">
                
                <input class="form-check-input" type="checkbox" name="id_parameter_jenis_layanan" id="id_parameter_jenis_layanan" value="1">
                
                <label class="form-check-label" for="id_parameter_jenis_layanan"><h5>Pilih Layanan Basic</label>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--selesai layanan baisc -->

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
            <div class="card-wrap">
                <div class="card-header">
                <div>
                <a onclick="layanan_premium()" class="btn btn-danger">
                    <label for="id_parameter_jenis_layanan">Layanan Premium</label>
                </a>
                </div>
                <div class="card-body">
                </div>
                <div id="id_parameter_jenis_layanan"></div>
                <div class="form-check">
                
                <input class="form-check-input" type="checkbox" name="id_parameter_jenis_layanan" id="id_parameter_jenis_layanan" value="2">
                
                <label class="form-check-label" for="id_parameter_jenis_layanan"><h5>Pilih Layanan Premium</label>
                </div>
                </div>
            </div>
            </div>
            <br>
        <!-- Selesai layanan premium -->

        <div class="form-group">
                        <label for="durasi_pengerjaan">Durasi Pengerjaan</label>
                            <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" 
                            id="durasi_pengerjaan" placeholder="Durasi Pengerjaan" name="durasi_pengerjaan">
                                <option value="1">1 Day</option>
                                <option value="2">2 Day</option>
                                <option value="3">3 Day</option>
                                <option value="4">4 Day</option>
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
                        <label for="nama_dokumen" class="col-form-label">Tulis Nama Audio</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
                    </div>
                    <div class="form-group">
                        <label for="path_file" class="col-form-label">Upload Audio (Size Max 30 Mb)</label>
                        <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" id="path_file" name="path_file" required="required">
                                </div>
                            </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="durasi_audio" id="durasi_audio" oninput="updateInfos()">
                        <span type="text"  id="dr_audio" name="dr_audio">
                    </div>
                    <hr>
                    
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
<script >		
    // membuat function tampilkan_nama
    function layanan_basic(){
        document.getElementById("basic").innerHTML = " * Klien Dapat Memilih Penerjemah <br> * Tidak Terdapat Editor <br> * Tidak ada Garansi <hr>";
    }
    
</script>
@endpush

@push('scripts')
<script >		
    // membuat function tampilkan_nama
    function layanan_premium(){
        document.getElementById("premium").innerHTML = " * Translator Ditentukan <br> * Terdapat Proses Editing <br> *  Bergaransi <hr>";
    }
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