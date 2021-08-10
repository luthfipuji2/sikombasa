@extends('layouts.klien.sidebar')

@section('title', 'Career')
@section('content')
<!DOCTYPE html>
<html lang="en">
  <body>
  <head>
  </head>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link disabled" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#document" data-toggle="tab">Required Documents</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#progress" data-toggle="tab">Progress</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="progress">
                    <section class="features">
                    <div class="container">
                      @if(empty($seleksi->hasil))
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                      </div>
                      <br>
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-3">
                          <img src="./img/features-1.svg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4">
                          <h3>Terimakasih telah mengisi formulir, {{$translator->nama}}!</h3>
                          <p class="font-italic">
                          Data Anda akan segera kami proses. Pengisian formulir dilakukan pada {{$translator->updated_at}}
                          </p>
                        </div>
                      </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='')
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                      </div>
                      <br>
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-3">
                          <img src="./img/18771.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4">
                          <h3>Selamat, {{$translator->nama}}!</h3>
                          <p class="font-italic">
                            Anda dinyatakan lulus tahap pertama (Seleksi Administrasi) menjadi translator SIKOMBASA. Untuk selanjutnya Anda dapat melakukan sesi wawancara bersama kami. Terimakasih! 
                          </p>
                        </div>
                      </div>
                      <br>
                      <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          Detail Pengajuan Lamaran
                        </button>
                      </p>
                      <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> SIKOMBASA
                                    </h4>

                                    <!-- info row -->
                                      <div class="row invoice-info">
                                          <div class="col-sm-4 invoice-col">
                                          From
                                          <address>
                                              <strong>SIKOMBASA</strong><br>
                                              SIKOMBASA<br>
                                              Jl Kolonel Sutarto 150 K,<br>
                                              Jebres Surakarta, Jawa Tengah<br>
                                              0271-664126
                                          </address>
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-sm-4 invoice-col">
                                          To
                                          <address>
                                              <strong>{{$translator->nama}}</strong><br>
                                              {{$translator->alamat}}<br>
                                              {{$translator->no_telp}}<br>
                                              {{$user->email}}
                                          </address>
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-sm-4 invoice-col">
                                          <b>No. Seleksi #{{$seleksi->id_seleksi_berkas}}</b><br>
                                          <br>
                                          <b>Waktu Pengajuan Lamaran:</b> {{$seleksi->created_at}}<br>
                                          <b>Nama Penyeleksi:</b> {{$seleksi->penyeleksi}}<br>
                                          </div>
                                          <!-- /.col -->
                                      </div>
                                      <table class="table table-bordered">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Indikator Penilaian</th>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Keterangan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Penguasaan Video Editing</td>
                                            <td>{{$seleksi->nilai_video}}</td>
                                            <td>{{$seleksi->catatan_video}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">2</th>
                                            <td>Curriculum Vitae</td>
                                            <td>{{$seleksi->nilai_cv}}</td>
                                            <td>{{$seleksi->catatan_cv}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">3</th>
                                            <td>Portofolio</td>
                                            <td>{{$seleksi->nilai_portofolio}}</td>
                                            <td>{{$seleksi->catatan_portofolio}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">4</th>
                                            <td>Ijazah Terakhir</td>
                                            <td>{{$seleksi->nilai_ijazah}}</td>
                                            <td>{{$seleksi->catatan_ijazah}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">5</th>
                                            <td>Surat Keterangan Sehat</td>
                                            <td>{{$seleksi->nilai_sk_sehat}}</td>
                                            <td>{{$seleksi->catatan_sk_sehat}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">6</th>
                                            <td>Surat Keterangan Berkelakuan Baik</td>
                                            <td>{{$seleksi->nilai_skck}}</td>
                                            <td>{{$seleksi->catatan_skck}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">7</th>
                                            <td>Sertifikat</td>
                                            <td>{{$seleksi->nilai_sertifikat}}</td>
                                            <td>{{$seleksi->catatan_sertifikat}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <!-- /.row -->
                                </div>
                              </div>
                              <br>
                              <div class="card">
                                <h5 class="card-header bg-dark">Formulir</h5>
                                <div class="card-body">
                                <form>
                                  <div class="form-group row">
                                      <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama" id="nama" readonly value="{{$translator->nama}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nik" id="nik" readonly value="{{$translator->nik}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" readonly value="{{$translator->jenis_kelamin}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly value="{{$translator->tgl_lahir}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="no_telp" class="col-sm-3 col-form-label">No. HP / telepon</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="no_telp" id="no_telp" readonly value="{{$translator->no_telp}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="keahlian" class="col-sm-3 col-form-label">Video Editing</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="keahlian" id="keahlian" readonly value="{{$translator->keahlian}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="provinsi" id="provinsi" readonly value="{{$translator->provinsi}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten / Kota</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kabupaten" id="kabupaten" readonly value="{{$translator->kabupaten}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kecamatan" id="kecamatan" readonly value="{{$translator->kecamatan}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kode_pos" id="kode_pos" readonly value="{{$translator->kode_pos}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="alamat" class="col-sm-3 col-form-label">Detail Alamat</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="alamat" id="alamat" readonly value="{{$translator->alamat}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama_bank" id="nama_bank" readonly value="{{$translator->nama_bank}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="rekening_bank" class="col-sm-3 col-form-label">No. Rekening</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="rekening_bank" id="rekening_bank" readonly value="{{$translator->rekening_bank}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nama_rekening" class="col-sm-3 col-form-label">A/N Rekening</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama_rekening" id="nama_rekening" readonly value="{{$translator->nama_rekening}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="foto_ktpa" class="col-sm-3 col-form-label">Foto KTP</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/biodata/'.$translator->foto_ktp)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/biodata/'.$translator->foto_ktp)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="cv" class="col-sm-3 col-form-label">CV</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->cv)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->cv)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="ijazah_terakhir" class="col-sm-3 col-form-label">Ijazah Terakhir</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="portofolio" class="col-sm-3 col-form-label">Portofolio</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="sk_sehat" class="col-sm-3 col-form-label">Surat Keterangan Sehat</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="skck" class="col-sm-3 col-form-label">Surat Keterangan Berkelakuan Baik</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->skck)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->skck)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  @foreach($skills as $s)
                                      <div class="form-group row">
                                          <label for="nama_sertifikat" class="col-sm-3 col-form-label">Nama Sertifikat</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat" readonly value="{{$s->nama_sertifikat}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="no_sertifikat" class="col-sm-3 col-form-label">Nomor Sertifikat</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" readonly value="{{$s->no_sertifikat}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="diterbitkan_oleh" class="col-sm-3 col-form-label">Diterbitkan Oleh</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh" readonly value="{{$s->diterbitkan_oleh}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="masa_berlaku" class="col-sm-3 col-form-label">Masa Berlaku</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="masa_berlaku" id="masa_berlaku" readonly value="{{$s->masa_berlaku}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bukti_dokumen" class="col-sm-3 col-form-label">Bukti Dokumen</label>
                                          <div class="col-sm-9">
                                              <img src="{{asset('/img/sertifikat/'.$s->bukti_dokumen)}}" height="90" width="150" alt="" srcset="">
                                              <br>
                                              <a href="{{asset('/img/sertifikat/'.$s->bukti_dokumen)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                          </div>
                                      </div>
                                  @endforeach
                                </form>
                                </div>
                              </div>
                            </div>
                      </div>
                      @elseif($seleksi->hasil=='tidak lolos' && $seleksi->hasil_wawancara=='')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/no-document.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Sayang sekali, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                              Anda dinyatakan tidak lulus tahap pertama (Seleksi Administrasi) menjadi translator SIKOMBASA. Semoga pada kesempatan berikutnya Anda dapat bergabung bersama kami. Terimakasih!
                            </p>
                          </div>
                        </div>
                        <br>
                          <div class="float-right">
                            <a href="/post-apply" class="btn btn-primary">
                              Coba lagi
                            </a>
                          </div>
                          <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                              Detail Pengajuan Lamaran
                            </button>
                          </p>
                          <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> SIKOMBASA
                                    </h4>

                                    <!-- info row -->
                                      <div class="row invoice-info">
                                          <div class="col-sm-4 invoice-col">
                                          From
                                          <address>
                                              <strong>SIKOMBASA</strong><br>
                                              SIKOMBASA<br>
                                              Jl Kolonel Sutarto 150 K,<br>
                                              Jebres Surakarta, Jawa Tengah<br>
                                              0271-664126
                                          </address>
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-sm-4 invoice-col">
                                          To
                                          <address>
                                              <strong>{{$translator->nama}}</strong><br>
                                              {{$translator->alamat}}<br>
                                              {{$translator->no_telp}}<br>
                                              {{$user->email}}
                                          </address>
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-sm-4 invoice-col">
                                          <b>No. Seleksi #{{$seleksi->id_seleksi_berkas}}</b><br>
                                          <br>
                                          <b>Waktu Pengajuan Lamaran:</b> {{$seleksi->created_at}}<br>
                                          <b>Nama Penyeleksi:</b> {{$seleksi->penyeleksi}}<br>
                                          </div>
                                          <!-- /.col -->
                                      </div>
                                      <table class="table table-bordered">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Indikator Penilaian</th>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Keterangan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Penguasaan Video Editing</td>
                                            <td>{{$seleksi->nilai_video}}</td>
                                            <td>{{$seleksi->catatan_video}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">2</th>
                                            <td>Curriculum Vitae</td>
                                            <td>{{$seleksi->nilai_cv}}</td>
                                            <td>{{$seleksi->catatan_cv}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">3</th>
                                            <td>Portofolio</td>
                                            <td>{{$seleksi->nilai_portofolio}}</td>
                                            <td>{{$seleksi->catatan_portofolio}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">4</th>
                                            <td>Ijazah Terakhir</td>
                                            <td>{{$seleksi->nilai_ijazah}}</td>
                                            <td>{{$seleksi->catatan_ijazah}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">5</th>
                                            <td>Surat Keterangan Sehat</td>
                                            <td>{{$seleksi->nilai_sk_sehat}}</td>
                                            <td>{{$seleksi->catatan_sk_sehat}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">6</th>
                                            <td>Surat Keterangan Berkelakuan Baik</td>
                                            <td>{{$seleksi->nilai_skck}}</td>
                                            <td>{{$seleksi->catatan_skck}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">7</th>
                                            <td>Sertifikat</td>
                                            <td>{{$seleksi->nilai_sertifikat}}</td>
                                            <td>{{$seleksi->catatan_sertifikat}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <!-- /.row -->
                                </div>
                              </div>
                              <br>
                              <div class="card">
                                <h5 class="card-header bg-dark">Formulir</h5>
                                <div class="card-body">
                                <form>
                                  <div class="form-group row">
                                      <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama" id="nama" readonly value="{{$translator->nama}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nik" id="nik" readonly value="{{$translator->nik}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" readonly value="{{$translator->jenis_kelamin}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly value="{{$translator->tgl_lahir}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="no_telp" class="col-sm-3 col-form-label">No. HP / telepon</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="no_telp" id="no_telp" readonly value="{{$translator->no_telp}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="keahlian" class="col-sm-3 col-form-label">Video Editing</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="keahlian" id="keahlian" readonly value="{{$translator->keahlian}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="provinsi" id="provinsi" readonly value="{{$translator->provinsi}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten / Kota</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kabupaten" id="kabupaten" readonly value="{{$translator->kabupaten}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kecamatan" id="kecamatan" readonly value="{{$translator->kecamatan}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="kode_pos" id="kode_pos" readonly value="{{$translator->kode_pos}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="alamat" class="col-sm-3 col-form-label">Detail Alamat</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="alamat" id="alamat" readonly value="{{$translator->alamat}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama_bank" id="nama_bank" readonly value="{{$translator->nama_bank}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="rekening_bank" class="col-sm-3 col-form-label">No. Rekening</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="rekening_bank" id="rekening_bank" readonly value="{{$translator->rekening_bank}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nama_rekening" class="col-sm-3 col-form-label">A/N Rekening</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" name="nama_rekening" id="nama_rekening" readonly value="{{$translator->nama_rekening}}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="foto_ktpa" class="col-sm-3 col-form-label">Foto KTP</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/biodata/'.$translator->foto_ktp)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/biodata/'.$translator->foto_ktp)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="cv" class="col-sm-3 col-form-label">CV</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->cv)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->cv)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="ijazah_terakhir" class="col-sm-3 col-form-label">Ijazah Terakhir</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="portofolio" class="col-sm-3 col-form-label">Portofolio</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="sk_sehat" class="col-sm-3 col-form-label">Surat Keterangan Sehat</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="skck" class="col-sm-3 col-form-label">Surat Keterangan Berkelakuan Baik</label>
                                      <div class="col-sm-9">
                                          <img src="{{asset('/img/dokumen/'.$dokumen->skck)}}" height="90" width="150" alt="" srcset="">
                                          <br>
                                          <a href="{{asset('/img/dokumen/'.$dokumen->skck)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                      </div>
                                  </div>
                                  @foreach($skills as $s)
                                      <div class="form-group row">
                                          <label for="nama_sertifikat" class="col-sm-3 col-form-label">Nama Sertifikat</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat" readonly value="{{$s->nama_sertifikat}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="no_sertifikat" class="col-sm-3 col-form-label">Nomor Sertifikat</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" readonly value="{{$s->no_sertifikat}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="diterbitkan_oleh" class="col-sm-3 col-form-label">Diterbitkan Oleh</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh" readonly value="{{$s->diterbitkan_oleh}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="masa_berlaku" class="col-sm-3 col-form-label">Masa Berlaku</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" name="masa_berlaku" id="masa_berlaku" readonly value="{{$s->masa_berlaku}}">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="bukti_dokumen" class="col-sm-3 col-form-label">Bukti Dokumen</label>
                                          <div class="col-sm-9">
                                              <img src="{{asset('/img/sertifikat/'.$s->bukti_dokumen)}}" height="90" width="150" alt="" srcset="">
                                              <br>
                                              <a href="{{asset('/img/sertifikat/'.$s->bukti_dokumen)}}" target="_blank" rel="noopener noreferrer">Lihat gambar</a>
                                          </div>
                                      </div>
                                  @endforeach
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='tidak lolos')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/3024051.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Sayang sekali, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                              Anda dinyatakan tidak lulus tahap terakhir (Seleksi Wawancara) menjadi translator SIKOMBASA. Semoga pada kesempatan berikutnya Anda dapat bergabung bersama kami. Terimakasih!
                            </p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <a href="/post-apply" class="btn btn-primary">
                            Coba lagi
                          </a>
                        </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='lolos')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/18771.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Selamat, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                            Anda dinyatakan lulus tahap terakhir (Seleksi Wawancara) menjadi translator SIKOMBASA. Semoga sukses untuk posisi barunya. Sekali lagi selamat dan terimakasih!
                            </p>
                          </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Persetujuan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Syarat dan Ketentuan Mitra SIKOMBASA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class = "card">
                                <div class="col-sm-12 invoice-col">
                                  <h4>
                                    <i class="fas fa-globe"></i> SIKOMBASA
                                  </h4>
                                  <address>
                                  <strong>SIKOMBASA</strong><br>
                                  Jl Kolonel Sutarto 150 K,Jebres Surakarta, Jawa Tengah<br>
                                  0271-664126
                                  </address>
                                  <p>
                                    Sebelum menjadi Mitra SIKOMBASA atau translator sistem, Anda harus membaca dan menerima semua syarat
                                    dan ketentuan dalam, dan yang berkaitan dengan, Syarat Layanan Mitra SIKOMBASA ini.
                                  </p>
                                  <p>
                                    SIKOMBASA berhak untuk mengganti, mengubah, menangguhkan atau menghentikan semua atau bagian apapun dari Sistem ini
                                    atau layanan setiap saat atau setelah memberikan pemberitahuan. SIKOMBASA dapat meluncurkan layanan tertentu atau fitur terbaru
                                    dalam versi beta, yang mungkin tidak berfungsi dengan baik atau sama seperti versi akhir. SIKOMBASA dapat 
                                    membatasi akses Anda ke bagian atau seluruh Sistem atau Layanan atas kebijakannya sendiri dan tanpa pemberitahuan atau kewajiban.
                                  </p>
                                  <p>
                                    Fee yang diterima translator adalah nominal transkaksi semula yang dibagi antara pihak SIKOMBASA dan translator,
                                    nominal transaksi ini didapat dari biaya transaksi yang dibebankan pada klien dan dibagi dua menjadi 90% untuk translator dan 10% untuk Sistem.
                                  </p>
                                  </div>
                                </div>
                              <form class="form-horizontal" method="POST" action="/progress" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                    <div class="form-group row">
                                      @if($seleksi->persetujuan=='Setuju')
                                      <div class="col-sm-10">
                                        <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio1" name="persetujuan" value="Setuju" class="custom-control-input" checked>
                                          <label class="custom-control-label" for="customRadio1">Saya menyetujui syarat dan ketentuan yang berlaku</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio2" name="persetujuan" value="Tidak Setuju" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio2">Saya tidak menyetujui syarat dan ketentuan yang berlaku</label>
                                        </div>
                                      </div>
                                      @elseif($seleksi->persetujuan=='Tidak Setuju')
                                      <div class="col-sm-10">
                                        <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio1" name="persetujuan" value="Setuju" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio1">Saya menyetujui syarat dan ketentuan yang berlaku</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio2" name="persetujuan" value="Tidak Setuju" class="custom-control-input" checked>
                                          <label class="custom-control-label" for="customRadio2">Saya tidak menyetujui syarat dan ketentuan yang berlaku</label>
                                        </div>
                                      </div>
                                      @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <br>
                      @endif
                      <br>
                      <!-- <div class="col-md-4">
                        <img src="./img/features-1.svg" class="img-fluid" alt="" style="display:block; margin:auto;">
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>

                  <div class="disabled tab-pane" id="profile">
                    <!-- Tab Profile di sini -->
                  </div>

                  <div class="disabled tab-pane" id="document">
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
  </body>
</html>
@endsection

@push('scripts')
@endpush

