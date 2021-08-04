@extends('layouts.klien.sidebar')

@section('title', 'Career')
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
                    <form class="form-horizontal" action="/biodata-post" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nomor Induk Kependudukan" value="{{$translator->nama}}">
                          @error('nama')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" value="{{$translator->nik}}">
                          @error('nik')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Video Editing*</label>
                        @if($translator->keahlian=='Bisa')
                        <div class="col-sm-10">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="keahlian" value="Bisa" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio3">Ya, saya menguasainya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="keahlian" value="Tidak bisa" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">Tidak, saya tidak menguasainya</label>
                          </div>
                        </div>
                        @elseif($translator->keahlian=='Tidak bisa')
                        <div class="col-sm-10">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="keahlian" value="Bisa" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3">Ya, saya menguasainya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="keahlian" value="Tidak bisa" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio4">Tidak, saya tidak menguasainya</label>
                          </div>
                        </div>
                        @endif
                      </div>
                      <div class="form-group row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Provinsi" value="{{$translator->provinsi}}">
                          @error('provinsi')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kabupaten" class="col-sm-2 col-form-label">Kota / Kabupaten</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" placeholder="Kota / Kabupaten (Cth: Kota Kediri / Kabupaten Kediri)" value="{{$translator->kabupaten}}">
                          @error('kabupaten')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="{{$translator->kecamatan}}">
                          @error('kecamatan')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="{{$translator->kode_pos}}">
                          @error('kode_pos')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Detail Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Detail Lainnya (Cth:Blok / Unit No. dan Patokan)" value="{{$translator->alamat}}">
                          @error('alamat')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama_bank" class="col-sm-2 col-form-label">Nama Bank</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="{{$translator->nama_bank}}">
                          @error('nama_bank')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="rekening_bank" class="col-sm-2 col-form-label">No. Rekening</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('rekening_bank') is-invalid @enderror" name="rekening_bank" id="rekening_bank" placeholder="Nomor Rekening" value="{{$translator->rekening_bank}}">
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
                          <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" name="nama_rekening" id="inputName2" placeholder="A/N Rekening" value="{{$translator->nama_rekening}}">
                          @error('nama_rekening')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date"  name="tgl_lahir"  class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{$translator->tgl_lahir}}">
                          @error('tgl_lahir')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        @if($translator->jenis_kelamin=='Laki-laki')
                        <div class="col-sm-10">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                          </div>
                        </div>
                        @elseif($translator->jenis_kelamin=='Perempuan')
                        <div class="col-sm-10">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                          </div>
                        </div>
                        @endif
                      </div>
                      <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon / HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="Nomor Telepon / Handphone" value="{{$translator->no_telp}}">
                          @error('no_telp')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                            <div class="col-sm-10">
                              <input type="file" name="foto_ktp" class="form-input" value="{{ old('foto_ktp') }}">
                              </br>
                              </br>
                                <div>
                                    <img src="{{asset('/img/biodata/'.$translator->foto_ktp)}}" height="90" width="150" alt="" srcset="">
                                </div>
                            </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                    <p style="color:red;">*Keterangan: Penguasaan video editing diperlukan dalam menyelesaikan order pada menu dubbing dan subtitle</p>
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

