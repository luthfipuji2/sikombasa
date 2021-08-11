@extends('layouts.klien.sidebar')

@section('title', 'biodata')
@section('content')

<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
        .widget-user-header {
            background-position: center center;
            background-size: cover;
            height: 200px !important;
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
                    @if (empty($klien->foto_ktp))
                    <div class="widget-user-image">
                        <img src="./img/profile.png" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                    </div>
                    @else
                    <div class="widget-user-image">
                        <img src="{{asset('/img/biodata/'.$klien->foto_ktp)}}" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                    </div>
                    @endif
                    </div>


                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Status</b> <a class="float-right">Active</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                    </li>
                    </ul>

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

                    <form method="POST" action="/profile-klien/{{$users->id}}"  enctype="multipart/form-data">
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

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                <div class="tab-pane" id="biodata">
                    <form method="POST" action="{{route('profile-klien.store')}}" enctype="multipart/form-data"> 
                        
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
                            
                        <div class="modal-body">
                        <div class="form-group" hidden>
                                <label for="name">ID</label>
                                <input type="text" id="id" placeholder="Masukkan ID" name="id" value="{{ $users->id }}">
                        </div>

                        <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" 
                                id="nik" placeholder="Masukkan NIK" name="nik" value="{{ old('nik') }}">
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
                                    <option value="{{ old('jenis_kelamin') }}" hidden selected>{{ old('jenis_kelamin') }}</option>
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
                                id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                @error ('tgl_lahir')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nomor HP</label>
                                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" 
                                id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ old('no_telp') }}">
                                @error ('no_telp')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <select class="form-control" name="provinces" id="provinces">
                                <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
                                    @foreach ($provinces as $key => $value)
                                    <option value="{{$value->id}}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error ('provinces')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kabupaten</label>
                                <select class="form-control" name="cities" id="cities">
                                <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
                                </select>
                                @error ('cities')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select class="form-control" name="districts" id="districts">
                                <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
                                </select>
                                @error ('districts')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Desa</label>
                                <select class="form-control" name="villages" id="villages">
                                <option value="0" disable="true" selected="true">=== Pilih Desa ===</option>
                                </select>
                                @error ('villages')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Kode Pos</label>
                                <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" 
                                id="kode_pos" placeholder="Masukkan Kode Pos" name="kode_pos" value="{{ old('kode_pos') }}">
                                @error ('kode_pos')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Unggah Foto KTP</label>
                                <input type="file" class="form-control @error('kode_pos') is-invalid @enderror" id="foto_ktp" name="foto_ktp" value="{{ old('foto_ktp') }}">
                                @error ('foto_ktp')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                            
                            </div>
                         </div>
                         </div>
        </form>

                            
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                

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
