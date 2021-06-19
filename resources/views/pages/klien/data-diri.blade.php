@extends('layouts.klien.sidebar')

@section('title', 'Get a Job')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#document" data-toggle="tab">Required Documents</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#progress" data-toggle="tab">Progress</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="disabled tab-pane" id="progress">
                    <!-- Tab Activity di sini -->
                  </div>

                  <div class="active tab-pane" id="profile">
                    <form class="form-horizontal" method="POST" action="/career" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="id" value={{ Auth::user()->id }}>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="Nomor Induk Kependudukan">
                          @error('nik')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                          @error('nama')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Keahlian</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" value="{{ old('keahlian') }}" placeholder="Keahlian">
                          @error('keahlian')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="inputName2" name="provinsi" value="{{ old('provinsi') }}" placeholder="Provinsi">
                        @error('provinsi')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Kota / Kabupaten</label>
                        <div class="col-sm-10">
                        <!-- <select name="city" id="city" class="form-control" name="kabupaten">
                            <option value="">Kota / Kabupaten</option>
                        </select> -->
                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="inputName2" name="kabupaten" value="{{ old('kabupaten') }}" placeholder="Kota / Kabupaten (Cth: Kota Kediri / Kabupaten Kediri)">
                        @error('kabupaten')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="inputName2" name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan">
                        @error('kecamatan')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="inputName2" name="kode_pos" value="{{ old('kode_pos') }}" placeholder="Kode Pos">
                          @error('kode_pos')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Detail Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="inputName2" name="alamat" value="{{ old('alamat') }}" placeholder="Detail Lainnya (Cth:Blok / Unit No. dan Patokan)">
                          @error('alamat')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Nama Bank</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="inputName2" name="nama_bank" value="{{ old('nama_bank') }}" placeholder="Nama Bank">
                          @error('nama_bank')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No. Rekening</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('rekening_bank') is-invalid @enderror" id="inputName2" name="rekening_bank" value="{{ old('rekening_bank') }}" placeholder="Nomor Rekening">
                          @error('rekening_bank')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">A/N Rekening</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" id="inputName2" name="nama_rekening" value="{{ old('nama_rekening') }}" placeholder="A/N Rekening (Cth: Ista Wiratama)">
                          @error('nama_rekening')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date"  name="tgl_lahir"  value="{{ old('tgl_lahir') }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                          @error('tgl_lahir')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" name="jenis_kelamin" value="laki-laki" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="jenis_kelamin" value="perempuan" class="custom-control-input">
                          <label class="custom-control-label" for="customRadio2">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No. Telepon / HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="inputName2" name="no_telp" value="{{ old('no_telp') }}" placeholder="Nomor Telepon / Handphone">
                          @error('no_telp')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Foto KTP</label>
                        <div class="col-sm-10">
                          <input type="file" name="foto_ktp" value="{{ old('foto_ktp') }}" class="form-input @error('foto_ktp') is-invalid @enderror">
                          @error('foto_ktp')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>

                      <!-- <div class="form-group row">
                        <label for="profile_photo_path" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <input type="file" name="profile_photo_path" value="{{ old('profile_photo_path') }}" class="form-input @error('foto_ktp') is-invalid @enderror">
                          @error('profile_photo_path')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div> -->

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="disabled tab-pane" id="document">
                    <!-- Tab Document di sini -->
                  </div>

                  <div class="disabled tab-pane" id="certificate">
                   <!-- Tab Certificate di sini -->
                  </div>
                  </div>
                  <!-- /.tab-pane -->
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

@endpush

