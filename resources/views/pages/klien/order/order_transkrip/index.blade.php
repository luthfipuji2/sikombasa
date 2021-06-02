@extends('layouts.klien.sidebar')
@section('title', 'Order Transkrip')
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
                <form action="/order-transkrip" method="POST" enctype="multipart/form-data">
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
                <button onclick="layanan_basic()" class="btn bg-cyan">
                    <label for="basic">Layanan Basic</label>
                </button>
                </div>
                <div class="card-body">
                </div>
                <div id="basic"></div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jenis_layanan" id="jenis_layanan" value="basic">
                <label class="form-check-label" for="jenis_layanan"><h5>Pilih Layanan Basic</label>
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
                <button onclick="layanan_premium()" class="btn btn-danger">
                    <label for="premium">Layanan Premium</label>
                </button>
                </div>
                <div class="card-body">
                </div>
                <div id="premium"></div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jenis_layanan" value="premium" id="jenis_layanan">
                <label class="form-check-label" for="jenis_layanan"><h5>Pilih Layanan Premium</label>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Selesai layanan premium -->
        <br>
                    <div class="form-group">
                        <label for="tipe_transkrip"> Tipe Transkrip</label>
                            <select onchange="showdurasipengerjaan()" class="form-control @error('tipe_transkrip') is-invalid @enderror" 
								id="tipe_transkrip" placeholder="Tipe Transkrip"name="tipe_transkrip">
                                <option value="">Select Tipe Transkrip</option>
                                <option value="1">Upload Audio</option>
                                <option value="2">Bertemu Langsung</option>
                            </select>
                            @error ('tipe_transkrip')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                            <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" 
                            id="durasi_pengerjaan" name="durasi_pengerjaan" style="visibility: visible;">
                                <option value="">Select Durasi Pengerjaan</option>
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
        {{ csrf_field() }}
                    <div class="form-group" >
                        <input type="text" placeholder="Tuliskan Nama Audio"class="form-control" id="nama_dokumen" name="nama_dokumen"style="visibility: visible;">
                    </div>
                    <div class="form-group" >
                        <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" name="path_file" id="path_file" style="visibility: visible;">
                                </div>
                        </div>
					</div>
                    <div class="form-group">
                            <select class="form-control @error('durasi_audio') is-invalid @enderror" 
                            id="durasi_audio" name="durasi_audio" style="visibility: visible;">
                                <option value="">Select Durasi Audio</option>
								<option value="<=1 Jam"><=1 Jam</option>
                                <option value="1-3 Jam">1-3 Jam</option>
                                <option value="3-5 Jam">3-5 Jam</option>
                            </select>
                            @error ('durasi_pengerjaan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                      </div>
					<div class="form-group">
                            <select class="form-control @error('durasi_pertemuan') is-invalid @enderror" 
                            id="durasi_pertemuan" name="durasi_pertemuan" style="visibility: visible;">
                                <option value="">Select Durasi Pertemuan</option>
								<option value="<=1 Day"><=1 Day</option>
                                <option value="1-3 Day">1-3 Day</option>
                                <option value="3-5 Day">3-5 Day</option>
                            </select>
                            @error ('durasi_pertemuan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                      </div>

                <div class="form-group" id="datetime">
                    <label for="durasi_pertemuan"> Masukkan Tanggal Pertemuan</label>
                    <input type="date" name="tanggal_pertemuan" id="tanggal_pertemuan" class="form-control @error('tanggal_pertemuan') is-invalid @enderror">
                    <label for="durasi_pertemuan">Masukkan Waktu Pertemuan</label>
                    <input type="time" name="waktu_pertemuan" id="waktu_pertemuan" class="form-control @error('waktu_pertemuan') is-invalid @enderror">
                </div>

                    <div class="form-group">
                        <input type="text" placeholder="Tuliskan Catatan Lokasi" class="form-control" id="lokasi" name="lokasi"style="visibility: visible;">
                    </div>
                    <div class="badge bg-primary text-wrap" style="width: 6rem;" id="selectlocation" name="selectlocation"style="visibility: visible;">
                        Select Your Location
                    </div>
						<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
						integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
						crossorigin=""/>

						<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
							integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
							crossorigin="">
						</script>

                        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
                        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
                        <style>#mapid { height: 180px; }</style>

                    <div id="mapid" placeholder="Select Your Location"style="visibility: visible;"></div>

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

                    </br>
                    <input type="text" placeholder="Longitude" class="form-control"  id="latitude" name="latitude"style="visibility: visible;">
                            
                    </br>
                    <input type="text" placeholder="Latitude" class="form-control" id="longitude" name="longitude"style="visibility: visible;">
                    <hr>
                    <br>
                    <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
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

@push('scripts')
<script >		
    // membuat function kontrol tipe transkrip
    function showdurasipengerjaan(){
        var selectBox=document.getElementById('tipe_transkrip');
        var userInput=selectBox.options[selectBox.selectedIndex].value;
        if(userInput=='1'){

            document.getElementById("durasi_pengerjaan").style.visibility='visible';
		    document.getElementById("nama_dokumen").style.visibility='visible';
			document.getElementById("path_file").style.visibility='visible';
            document.getElementById("durasi_audio").style.visibility='visible';
            document.getElementById("durasi_pertemuan").style.visibility='hidden';
            document.getElementById("selectlocation").style.visibility='hidden';
            document.getElementById("lokasi").style.visibility='hidden';
            document.getElementById("mapid").style.visibility='hidden';
            document.getElementById("longitude").style.visibility='hidden';
            document.getElementById("latitude").style.visibility='hidden';
            document.getElementById("datetime").style.visibility='hidden';
        }else{
         
            document.getElementById("durasi_pengerjaan").style.visibility='hidden';
			document.getElementById("nama_dokumen").style.visibility='hidden';
			document.getElementById("path_file").style.visibility='hidden';
            document.getElementById("durasi_pertemuan").style.visibility='visible';
            document.getElementById("durasi_audio").style.visibility='hidden';
            document.getElementById("selectlocation").style.visibility='visible';
            document.getElementById("lokasi").style.visibility='visible';
            document.getElementById("mapid").style.visibility='visible';
            document.getElementById("longitude").style.visibility='visible';
            document.getElementById("latitude").style.visibility='visible';
            document.getElementById("datetime").style.visibility='visible';
        }
        return false;
    }
    
</script>
@endpush