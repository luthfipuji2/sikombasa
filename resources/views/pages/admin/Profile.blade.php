@extends('layouts/admin/template')

@section('title', 'Edit Data User')

@section('container')
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

          <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background-image:url('./img/bg.jpg')">
                <h3 class="widget-user-username text-right">{{$users->name}}</h3>
                <h5 class="widget-user-desc text-right">{{$users->role}}</h5>
              </div>
              @if (empty($users->profile_photo_path))
              <div class="widget-user-image">
                <img src="./img/profile.png" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
              </div>
              @else
              <div class="widget-user-image">
                <img src="{{asset('images/'.$users->profile_photo_path)}}" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
              </div>
              @endif
            </div>

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

                  <form method="POST" action="/profile-admin/{{$users->id}}" enctype="multipart/form-data">
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

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                            id="password" placeholder="Password (kosongkan jika tidak ingin mengganti password Anda)" name="password" >
                            @error ('password')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>  

                        <div class="form-group">
                            <label for="profile_photo_path">Photo Profile</label>
                            <input type="file" id="profile_photo_path"  name="profile_photo_path" class="form-control">
                        </div> 

                        <div class="float-right">
                            <div class="form-group row" >
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </div>

                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="biodata">
                  <form method="POST" action="/biodata-admin/{{$users->id_admin}}">
                    @method('patch')
                    @csrf
                    <form role="form">
                    <div class="form-group" hidden>
                            <label for="name">ID</label>
                            <input type="text" id="id" placeholder="Masukkan Tanggal Lahir" name="id" value="{{ $users->id }}">
                        </div>
                    <div class="form-group">
                   
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                            id="jenis_kelamin" placeholder="Pilih Jenis Kelamin" name="jenis_kelamin">
                                <option value="{{$users->jenis_kelamin}}" hidden selected>{{$users->jenis_kelamin}}</option>
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
                            id="tgl_lahir" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" value="{{ $users->tgl_lahir }}">
                            @error ('tgl_lahir')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nomor HP</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" 
                            id="no_telp" placeholder="Masukkan Nomor Telepon" name="no_telp" value="{{ $users->no_telp }}">
                            @error ('no_telp')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                            id="alamat" placeholder="Masukkan Alamat" name="alamat">{{$users->alamat}}</textarea>
                            @error ('alamat')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Kecamatan</label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                            id="kecamatan" placeholder="Masukkan Kecamatan" name="kecamatan" value="{{ $users->kecamatan }}">
                            @error ('kecamatan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Kabupaten</label>
                            <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                            id="kabupaten" placeholder="Masukkan Kabupaten" name="kabupaten" value="{{ $users->kabupaten }}">
                            @error ('kabupaten')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Provinsi</label>
                            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                            id="provinsi" placeholder="Masukkan Provinsi" name="provinsi" value="{{ $users->provinsi }}">
                            @error ('provinsi')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Kode Pos</label>
                            <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" 
                            id="kode_pos" placeholder="Masukkan Kode Pos" name="kode_pos" value="{{ $users->kode_pos }}">
                            @error ('kode_pos')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="float-right">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
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