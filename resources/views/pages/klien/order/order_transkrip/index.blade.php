@extends('layouts.klien.sidebar')
@section('content')
<div class="container-fluid">
        <div class="row">
        <div class="container ">
        {{-- status --}}
    <div class="row">
        <div class="p-3 mb-3">
            <div class="card">
            <div class="card-header p-2 bg-blue">
            <h4> <i class="fab fa-shopify"></i> Form Order Transkrip Audio</h4>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                <div class="active tab-pane" id="certificate">
                <form action="{{route('order-transkrip.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
        
            <div class="row" data-aos="fade-up">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            <div class="col-md-3 pt-6">
                <img src="./img/myicon/3.jpg" class="img-fluid" alt="">
            </div>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
            <div class="col-md-7 pt-4">
                <div class="row">
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-cyan">
                            <div id="jenis_layanan"></div>
                                <div class="form-check">
                                &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Basic">
                                <label class="form-check-label" for="jenis_layanan"><b>Basic</b></label>
                                <i class="nav-icon fas fa-medal"></i>
                                <i class="nav-icon fas fa-medal"></i>
                                <i class="nav-icon fas fa-medal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <dic class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <div id="jenis_layanan"></div>
                                <div class="form-check">
                                &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Premium ">
                                <label class="form-check-label" for="jenis_layanan"><b>Premium</b></label>
                                <i class="nav-icon fas fa-crown"></i>
                                <i class="nav-item fas fa-crown"></i>
                                <i class="nav-item fas fa-crown"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" 
                        id="durasi_pengerjaan" placeholder="Durasi Pengerjaan" name="durasi_pengerjaan">
                        <option value="">--Pilih Durasi Pengerjaan--</option>
                        <option value="1">1 Hari</option>
                        <option value="2">2 Hari</option>
                        <option value="3">3 Hari</option>
                    </select>
                    @error ('durasi_pengerjaan')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tuliskan Nama Audio" id="nama_dokumen" name="nama_dokumen">
                </div>
                <div class="form-group">
                    <label for="path_file" class="col-form-label">Upload Audio</label>
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
            <div>
        </div>
    </div>
</div>
        
        

        
        <div class="col-sm-2 ml-auto">
            <button class="btn bg-green" type="submit">ORDER &nbsp;<i class="fab fa-shopify"></i></button>
        </div>
        </form> 
        </div>
        </div>
        </div>
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
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });
    });
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



