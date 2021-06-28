@extends('layouts.translator.master')

@section('title', 'Profile')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="profile">
                    <form class="form-horizontal" action="/profile-translator" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nomor Induk Kependudukan" value="{{$data->nama}}">
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
                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" value="{{$data->nik}}">
                          @error('nik')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Video Editing</label>
                        @if($data->keahlian=='Bisa')
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
                        @elseif($data->keahlian=='Tidak bisa')
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
                          <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" placeholder="Provinsi" value="{{$data->provinsi}}">
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
                          <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" placeholder="Kota / Kabupaten (Cth: Kota Kediri / Kabupaten Kediri)" value="{{$data->kabupaten}}">
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
                          <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="{{$data->kecamatan}}">
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
                          <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="{{$data->kode_pos}}">
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
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Detail Lainnya (Cth:Blok / Unit No. dan Patokan)" value="{{$data->alamat}}">
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
                          <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="{{$data->nama_bank}}">
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
                          <input type="text" class="form-control @error('rekening_bank') is-invalid @enderror" name="rekening_bank" id="rekening_bank" placeholder="Nomor Rekening" value="{{$data->rekening_bank}}">
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
                          <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" name="nama_rekening" id="inputName2" placeholder="A/N Rekening" value="{{$data->nama_rekening}}">
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
                          <input type="date"  name="tgl_lahir"  class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{$data->tgl_lahir}}">
                          @error('tgl_lahir')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        @if($data->jenis_kelamin=='Laki-laki')
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
                        @elseif($data->jenis_kelamin=='Perempuan')
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
                          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="Nomor Telepon / Handphone" value="{{$data->no_telp}}">
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
                              <input type="file" name="foto_ktp" class="form-input" value="{{$data->foto_ktp}}">
                              </br>
                              </br>
                                <div>
                                    <img src="{{asset('/img/biodata/'.$data->foto_ktp)}}" height="90" width="150" alt="" srcset="">
                                </div>
                            </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="certificate">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createCertificate">
                        <i class="nav-icon fas fa-folder-plus"></i> Add More Certificates
                    </button>
                    </br>
                    </br>

                    <!-- Modal -->
                    <div class="modal fade" id="createCertificate" tabindex="-1" aria-labelledby="createCertificateLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="createCertificateLabel">Tambah Sertifikat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="/certificate-create" method="POST" enctype="multipart/form-data">
                            @csrf
                              <label for="nama_sertifikat" class="col-sm-5 col-form-label">Nama Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat1" placeholder="Nama Sertifikat">
                                </div>
                                <label for="no_sertifikat1" class="col-sm-5 col-form-label">Nomor Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat1" placeholder="Nomor Sertifikat">
                                </div>
                                <label for="bukti_dokumen1" class="col-sm-5 col-form-label">Bukti Dokumen</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="bukti_dokumen" class="form-input">
                                  </div>
                                <label for="diterbitkan_oleh1" class="col-sm-5 col-form-label">Diterbitkan Oleh</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh1" placeholder="Diterbitkan Oleh">
                                  </div>
                                <label for="masa_berlaku1" class="col-sm-5 col-form-label">Masa Berlaku</label>
                                  <div class="col-sm-10">
                                    <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku1" placeholder="Masa Berlaku">
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table id="datatable" class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Sertifikat</th>
                          <th scope="col">Nomor Sertifikat</th>
                          <th scope="col">Bukti Dokumen</th>
                          <th scope="col">Diterbitkan Oleh</th>
                          <th scope="col">Masa Berlaku</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($certificate as $sertif)
                          <tr>
                            <td>{{$sertif->id_keahlian}}</td>
                            <td>{{$sertif->nama_sertifikat}}</td>
                            <td>{{$sertif->no_sertifikat}}</td>
                            <td>
                                <div class="col-sm-10">
                                  <img src="{{asset('/img/sertifikat/'.$sertif->bukti_dokumen)}}" height="90" width="150" alt="" srcset="">
                                </div>
                            </td>
                            <td>{{$sertif->diterbitkan_oleh}}</td>
                            <td>{{$sertif->masa_berlaku}}</td>
                            <td>
                              <a href="/certificate/{{$sertif->id_keahlian}}" class="btn btn-danger" >
                              <i class="nav-icon fas fa-trash-alt"></i>
                              </a>

                              <button class="btn btn-primary edit" type="button" data-toggle="modal" data-target="#updateCertificate">
                              <i class="nav-icon fas fa-edit"></i>
                              </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="updateCertificate" tabindex="-1" aria-labelledby="updateCertificateLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateCertificateLabel">Edit Data Sertifikat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="/certificate-update" method="POST" enctype="multipart/form-data" id="editForm">
                            @csrf
                              <label for="nama_sertifikat" class="col-sm-5 col-form-label">Nama Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat" placeholder="Nama Sertifikat">
                                </div>
                                <label for="no_sertifikat" class="col-sm-5 col-form-label">Nomor Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" placeholder="Nomor Sertifikat">
                                </div>
                                <label for="bukti_dokumen" class="col-sm-5 col-form-label">Bukti Dokumen</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="bukti_dokumen" id="bukti_dokumen" class="form-input">
                                  </div>
                                <label for="diterbitkan_oleh" class="col-sm-5 col-form-label">Diterbitkan Oleh</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh" placeholder="Diterbitkan Oleh">
                                  </div>
                                <label for="masa_berlaku" class="col-sm-5 col-form-label">Masa Berlaku</label>
                                  <div class="col-sm-10">
                                    <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Masa Berlaku">
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> 

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
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
  var table = $('#datatable').DataTable();
  //Edit Record
  table.on('click', '.edit', function(){
    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')){
      $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    console.log(data);

    $('#nama_sertifikat').val(data[1]);
    $('#no_sertifikat').val(data[2]);
    $('#bukti_dokumen').html(data[3]);
    $('#diterbitkan_oleh').val(data[4]);
    $('#masa_berlaku').val(data[5]);

    $('#editForm').attr('action', '/certificate-update/'+data[0]);
    $('#updateCertificate').modal('show');
  })
})
</script>
<script>
    $(function(){
        var url = document.location.toString();
        if (url.match('#')) {
            console.log(url.split('#')[1]);
            $('a[href="#'+url.split('#')[1]+'"]').parent().addClass('active');
            $('#'+url.split('#')[1]).addClass('active in')
        }
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        });
    });
</script>
@endpush