    @extends('layouts.klien.sidebar')

    @section('title', 'biodata')
    @section('content')
        <!-- Main content -->

        <script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
    .widget-user-header {
        background-position: center center;
        background-size: cover;
        height: 200px !important;
    }
    </style>
    <style>
        .checked {
        color: orange;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            
            <!-- /.col -->
            <div class="col-md-12 mt-3">


                    <!-- Main content -->
                    <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-3">

                    <!-- Profile Image -->
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <div class="widget-user-header text-white">
                    @if (empty($klien->user->profile_photo_path))
                    <div class="widget-user-image">
                        <img src="./img/profile.png" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                    </div>
                    @else
                    <div class="widget-user-image">
                        <img src="{{asset('/img/biodata/'.$klien->user->profile_photo_path)}}" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                    </div>
                    @endif
                    </div>

                    <h3 class="profile-username text-center">{{$klien->user->name}}</h3>
                    <p class="text-muted text-center">{{$klien->user->role}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Status</b> <a class="float-right">Active</a>
                    </li>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                        </div>

                    <div class="col-md-9">
                    <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#biodata" data-toggle="tab">Biodata</a></li>
                    
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                    <div class="active tab-pane" id="profile">

                    <form method="POST" action="/profile-klien/{{$users->id}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <form role="form">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" placeholder="Enter Name" name="name" value="{{ $users->name }}">
                                @error ('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"class="form-control @error('email') is-invalid @enderror" 
                                id="email" placeholder="Enter Email" name="email" value="{{ $users->email }}">
                                @error ('email')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>  

                            <div class="form-group row">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="biodata">
                    <form method="POST" action="/biodata-klien/{{$klien->id_klien}}" enctype="multipart/form-data"> 
                        @method('patch')
                        @csrf
                        <form role="form">
                        <div class="form-group" hidden>
                                <label for="name">ID</label>
                                <input type="text" id="id" placeholder="Masukkan Tanggal Lahir" name="id" value="{{ $klien->id }}">
                            </div>
                        <div class="form-group">

                        <div class="form-group">
                                <label for="name">NIK</label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" 
                                id="nik" placeholder="Masukkan NIK" name="nik" value="{{ $klien->nik }}">
                                @error ('nik')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                    
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                    id="jenis_kelamin" placeholder="Pilih Jenis Kelamin" name="jenis_kelamin">
                                        <option value="{{$klien->jenis_kelamin}}" hidden selected>{{$klien->jenis_kelamin}}</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                    </select>
                                    @error ('jenis_kelamin')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" 
                                id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" value="{{ $klien->tgl_lahir }}">
                                @error ('tgl_lahir')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nomor HP</label>
                                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" 
                                id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ $klien->no_telp }}">
                                @error ('no_telp')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <select class="form-control" name="provinces" id="provinces">
                                <option value="0" disable="true" selected="true">{{ $klien->provinsi->name }}</option>
                                    @foreach ($provinces as $key => $value)
                                    <option value="{{$value->id}}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error ('provinces_id')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <select class="form-control" name="cities" id="cities">
                                <option value="0" disable="true" selected="true">{{ $klien->kabupaten->name }}</option>
                                </select>
                                @error ('cities_id')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select class="form-control" name="districts" id="districts">
                                <option value="0" disable="true" selected="true">{{ $klien->kecamatan->name }}</option>
                                </select>
                                @error ('districts_id')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Desa</label>
                                <select class="form-control" name="villages" id="villages">
                                <option value="0" disable="true" selected="true">{{ $klien->desa->name }}</option>
                                </select>
                                @error ('villages_id')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                            </div>
                         </div>


                            <div class="form-group">
                                <label for="name">Kode Pos</label>
                                <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" 
                                id="kode_pos" placeholder="Masukkan Kode Pos" name="kode_pos" value="{{ $klien->kode_pos }}">
                                @error ('kode_pos')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                                    <div class="col-sm-10">
                                    <input type="file" name="foto_ktp" class="form-input" value="{{$klien->foto_ktp}}">
                                    </br>
                                    </br>
                                        <div>
                                            <img src="{{asset('/img/biodata/'.$klien->foto_ktp)}}" height="90" width="150" alt="" srcset="">
                                        </div>
                                    </div>
                            </div>


                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>


                        </form>
                        
                    </div>
                    <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    

    @push('scripts')
    <script type="text/javascript">
        $('#provinces').on('change', function(e){
            console.log(e);
            var province_id = e.target.value;
            $.get('/json-cities?province_id=' + province_id,function(data) {
            console.log(data);
            $('#cities').empty();
            $('#cities').append('<option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>');

            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Desa ===</option>');

            $.each(data, function(index, citiesObj){
                $('#cities').append('<option value="'+ citiesObj.id +'">'+ citiesObj.name +'</option>');
            })
            });
        });

        $('#cities').on('change', function(e){
            console.log(e);
            var city_id = e.target.value;
            $.get('/json-districts?city_id=' + city_id,function(data) {
            console.log(data);
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

            $.each(data, function(index, districtsObj){
                $('#districts').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
            })
            });
        });

        $('#districts').on('change', function(e){
            console.log(e);
            var district_id = e.target.value;
            $.get('/json-village?district_id=' + district_id,function(data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Desa ===</option>');

            $.each(data, function(index, villagesObj){
                $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
            })
            });
        });

    </script>
    @endpush