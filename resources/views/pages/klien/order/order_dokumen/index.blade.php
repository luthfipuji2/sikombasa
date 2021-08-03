@extends('layouts.klien.sidebar')

@section('title', 'Order Dokumen')
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
                <form action="/order-dokumen" method="POST" enctype="multipart/form-data">
                @csrf
                
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
                </div>
                </div>
            </div>
            </div>
            </div>
        <!-- Selesai jenis layanan premium -->

            <br><hr color="grey">

            <div class="row">


             <!--mulai jenis layanan basic -->
             <div class="col-6 omega">
                <div id="box-annual" data-plan="annual" class="box plans FR-PREMIUM-1 year">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                &nbsp&nbsp<i class="nav-icon fas fa-file"></i>&nbsp&nbsp Dokumen Umum
                </div>
            </a>
                <div class="card-header">
                * Dokumen Bebas/Bersifat Umum <br><br>
                </div>
                <br>
                <div class="form-check">
                &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="id_parameter_jenis_teks"  id="id_parameter_jenis_teks" value="1">
                <label class="form-check-label" for="id_parameter_jenis_teks"><h5>Jenis Dokumen Umum</label>
                <br><br>
                </div>
                </div>
            </div>
            </div>
        <!-- Selesai jenis layanan babsic -->

        <!--mulai jenis layanan premium -->
            <div class="col-6 omega">
                <div id="box-annual" data-plan="annual" class="box plans FR-PREMIUM-1 year">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                &nbsp&nbsp<i class="nav-icon fas fa-file"></i>&nbsp&nbsp Dokumen Khusus
                </div>
            </a>
                <div class="card-header">
                * Dokumen Resmi/Bersifat Rahasia <br><br>
                </div>
                <br>
                <div class="form-check">
                &nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="radio" name="id_parameter_jenis_teks"  id="id_parameter_jenis_teks" value="2">
                <label class="form-check-label" for="id_parameter_jenis_teks"><h5>Jenis Dokumen Khusus</label>
                <br><br>
                </div>
                </div>
            </div>
            </div>
            </div>
                
        <!-- Selesai jenis layanan premium -->

        <br><hr color="grey">
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
                        <label for="nama_dokumen" class="col-form-label">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_halaman" class="col-form-label">Jumlah Halaman Dokumen</label>
                        <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman">
                    </div>

                    <div class="form-group">
                        <label for="path_file" class="col-form-label">Upload Dokumen</label>
                        <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" name="path_file" required="required">
                                </div>
                            </div>
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
        document.getElementById("basic").innerHTML = " * Translator Ditentukan <br> * Tidak Terdapat Editor <br> * Tidak Mendapat Revisi <hr>";
    }
    
</script>
@endpush

@push('scripts')
<script >		
    // membuat function tampilkan_nama
    function layanan_premium(){
        document.getElementById("premium").innerHTML = " * Translator Ditentukan <br> * Terdapat Proses Editing <br> *  Terdapat Revisi 1 kali <hr>";
    }
    
</script>
@endpush

@push('scripts')
<script >		
    // membuat function tampilkan_nama
    function teks_umum(){
        document.getElementById("umum").innerHTML = " * Dokumen Bebas/Bersifat Umum <br> <hr>";
    }
    
</script>
@endpush

@push('scripts')
<script >		
    // membuat function tampilkan_nama
    function teks_khusus(){
        document.getElementById("khusus").innerHTML = " * Dokumen Resmi/Bersifat Rahasia <br><hr>";
    }
    
</script>
@endpush