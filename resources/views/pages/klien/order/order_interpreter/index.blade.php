@extends('layouts.klien.sidebar')
@section('title', 'Order Menu Offline')
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
                <form action="/order-interpreter" method="POST" enctype="multipart/form-data">
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
                        <label for="basic">Layanan Basic</label>
                    </a>
                    </div>
                    <div class="card-body">
                    <input type="text" name="p_jenis_layanan2" value="Basic" hidden>
                        <div class="form-group">
                            <label for="basic">Durasi Pertemuan</label>
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
                    <input type="text" name="p_jenis_layanan" value="Premium" hidden>
                        <div class="form-group">
                            <label for="basic">Durasi Pertemuan</label>
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
                    </div>   
                </div>
            </div>
        </div>
        <!-- Selesai layanan premium -->
        

        <div class="form-group">
            <label for="tipe_offline">Jenis Menu Offline</label>
            <select onchange="showtipetranskrip()" class="form-control @error('tipe_offline') is-invalid @enderror" 
		        id="tipe_offline" name="tipe_offline">
                <option value="">--Pilih Jenis Menu Offline--</option>
                <option value="Interpreter">Interpreter</option>
                <option value="Transkrip">Transkrip</option>
            </select>
            @error ('tipe_offline')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                    @enderror
        </div>

        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="tanggal_pertemuan"> Masukkan Tanggal Pertemuan</label>
                <input type="date" id="tanggal_pertemuan" name="tanggal_pertemuan" class="form-control @error('tanggal_pertemuan') is-invalid @enderror">
            </div>
            </div class="col">
        <div class="col">
            <div class="form-group">
                <label for="waktu_pertemuan">Masukkan Waktu Pertemuan</label>
                <input type="time" id="waktu_pertemuan" name="waktu_pertemuan" class="form-control">
            </div>
        </div class="col">
        </div class="row">
       
        {{ csrf_field() }}
        <br>
                <div class="row">
                <div class="col">
                    <label for="lokasi" class="col-form-label">Tentukan Lokasi Anda Saat Ini</label>
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
                    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
                    crossorigin=""/>

                    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                    crossorigin=""></script>

                    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
                    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

                    <style>#mapid { height: 300px; }</style>
                    
                    <div id="mapid"></div>

                    <script>
                        var map = L.map('mapid').setView([-7.5557418, 110.8545274], 13);
                        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                            maxZoom: 20,
                            subdomains:['mt0','mt1','mt2','mt3'] 
                            }).addTo(map);
                            L.Control.geocoder().addTo(map);
                    </script>
                        
                    <script>
                        var theMarker = {};
                        map.on('click', function(e){
                            if (theMarker !=undefined){
                                map.removeLayer(theMarker);
                                $('#latitude').val(e.latlng.lat);
                                $('#longitude').val(e.latlng.lng);
                            };
                            theMarker = L.marker([e.latlng.lat,e.latlng.lng]).addTo(map);
                        });
                    </script>
                    
                </div class="col">
                    <div class="col">
                        <label for="text">Longitude</label>
                        <input type="text" class="form-control"  id="latitude" name="latitude">
                        <label for="text">Latitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude">
                        <label for="lokasi" class="col-form-label">Tuliskan Catatan Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div class="col">
                </div class="row">
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
</section>
</div>

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
        document.getElementById("basic").innerHTML = "Garansi 1 Bulan Setelah 3x Order<hr>";
    }
    
</script>
@endpush

@push('scripts')
<script >		
    // membuat function tampilkan_nama
    function layanan_premium(){
        document.getElementById("premium").innerHTML = " Garansi 3 Bulan Sejak Berlangganan<hr> ";
    }
    
</script>
@endpush
