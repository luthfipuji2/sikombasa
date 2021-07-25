@extends('layouts.translator.master')

@section('title', 'Pengaturan Akun')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
          </div>
          <!-- /.col -->
          <div class="col-md-12 mt-3">

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Pengaturan Akun</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Aktivitas</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="account">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white"
                            style="background-image:url('./img/bg-bg.jpg')">
                            <h3 class="widget-user-username text-right">{{$user->name}}</h3>
                            <h5 class="widget-user-desc text-right">{{$user->role}}</h5>
                        </div>
                        @if (empty($user->profile_photo_path))
                        <div class="widget-user-image">
                            <img src="./img/profile.png" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                        </div>
                        @else
                        <div class="widget-user-image">
                            <img src="{{asset('images/'.$user->profile_photo_path)}}" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="/account-translator/{{$user->id}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <form role="form">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                                @error ('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"class="form-control @error('email') is-invalid @enderror" 
                                id="email" placeholder="Enter Email" name="email" value="{{ $user->email }}">
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
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                  </div>

                  <div class="tab-pane" id="activity">
                    <div class="container-fluid">
                      @foreach($order as $o)
                      <div class="card">
                        <div class="card-header">
                        <b>No. Order #{{$o->id_order}}</b>
                        <br>
                        {{$o->tgl_order}}
                        </div>
                        <div class="card-body">
                          <table width="400px">
                            <tr>
                              <td><p class="text-left">Nama Klien</p><td> 
                              <td><p class="font-weight-bold text-left"><a href="#">{{$o->name}}</a> {{$o->email}}</p></td>
                            </tr>
                            <tr>
                            <td><p class="text-left">Menu</p><td>
                              @if(empty($o->tipe_offline)) 
                              <td><p class="font-weight-bold text-left">{{$o->menu}}</p></td>
                              @else
                              <td><p class="font-weight-bold text-left">{{$o->tipe_offline}} Offline</p></td>
                              @endif
                            </tr>
                            <tr>
                              <td><p class="text-left">Nilai Order</p><td> 
                              <td><p class="font-weight-bold text-left">IDR {{$o->nominal_transaksi}},-</p></td>
                            </tr>
                          </table>
                          <p>
                          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample-{{$o->id_order}}" aria-expanded="false" aria-controls="collapseExample">
                            Detail Order
                          </button>
                          </p>
                          <div class="collapse" id="collapseExample-{{$o->id_order}}">
                            <div class="card card-body">
                            @if($o->menu == "Text")
                              <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->p_jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Teks</b></td>
                                    <td>{{$o->p_jenis_teks}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Teks</b></td>
                                    <td>{{$o->text}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Jumlah Kata</b></td>
                                    <td>{{$o->jumlah_karakter}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$o->durasi_pengerjaan}} hari</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->menu=='Transkrip' && $o->tipe_offline=='')
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$o->nama_dokumen}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Audio</b></td>
                                    <td>{{$o->durasi_audio}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$o->durasi_pengerjaan}} hari</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->menu=='Interpreter' && $o->tipe_offline=='Transkrip')
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pertemuan</b></td>
                                    <td>{{$o->p_durasi_pertemuan}} hari</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Tanggal Pertemuan</b></td>
                                    <td>{{$o->tanggal_pertemuan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Waktu Pertemuan</b></td>
                                    <td>{{$o->waktu_pertemuan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Detail Lokasi</b></td>
                                    <td>{{$o->lokasi}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->menu=='Dubbing')
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->p_jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$o->nama_dokumen}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Ekstensi File</b></td>
                                    <td>{{$o->ekstensi}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Jumlah Dubber</b></td>
                                    <td>{{$o->jumlah_dubber}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Video</b></td>
                                    <td>{{$o->durasi_video}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$o->durasi_pengerjaan}} hari</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->tipe_offline=='Interpreter' && $o->menu == "Interpreter")
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pertemuan</b></td>
                                    <td>{{$o->p_durasi_pertemuan}} hari</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Tanggal Pertemuan</b></td>
                                    <td>{{$o->tanggal_pertemuan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Waktu Pertemuan</b></td>
                                    <td>{{$o->waktu_pertemuan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Detail Lokasi</b></td>
                                    <td>{{$o->lokasi}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->menu=='Dokumen')
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->p_jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Dokumen</b></td>
                                    <td>{{$o->p_jenis_teks}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$o->nama_dokumen}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Ekstensi File</b></td>
                                    <td>{{$o->ekstensi}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Jumlah Halaman</b></td>
                                    <td>{{$o->pages}} halaman</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$o->durasi_pengerjaan}} hari</td>
                                  </tr>
                                </tbody>
                              </table>
                            @elseif($o->menu=='Subtitle')
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    <td>{{$o->p_jenis_layanan}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$o->nama_dokumen}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Ekstensi File</b></td>
                                    <td>{{$o->ekstensi}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Video</b></td>
                                    <td>{{$o->durasi_video}}</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$o->durasi_pengerjaan}} hari</td>
                                  </tr>
                                </tbody>
                              </table>
                            @endif
                            </div>
                          </div>
                        </div>
                        <div class="card-footer bg-info">
                          <div class="row">
                            <div class="col-sm-2">
                              @if(!empty($o->id_translator) && empty($o->path_file_trans) && empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Translator menerima order -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-light">2</span>
                              <span class="badge badge-pill badge-light">3</span>
                              <span class="badge badge-pill badge-light">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menyelesaikan order file, status_at=='belum selesai', belum ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-light">3</span>
                              <span class="badge badge-pill badge-light">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menyelesaikan order text, status_at=='belum selesai', belum ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-light">3</span>
                              <span class="badge badge-pill badge-light">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan order file, status_at=='selesai', sudah ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan order text, status_at=='selesai', sudah ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menerima permintaan revisi text, belum ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-light">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menerima permintaan revisi file, belum ada konfirmasi 'selesai' dari klien  -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-light">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menyelesaikan permintaan revisi file, belum ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <!-- Menyelesaikan permintaan revisi teks, belum ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-light">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan permintaan revisi file, sudah ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan permintaan revisi teks, sudah ada konfirmasi 'selesai' dari klien -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-light">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan permintaan revisi teks, sudah ada konfirmasi 'selesai' dari klien, menerima fee -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-primary">6</span>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Menyelesaikan permintaan revisi file, sudah ada konfirmasi 'selesai' dari klien, menerima fee -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-primary">6</span>
                              @elseif(!empty($o->id_translator) && empty($o->pesan_revisi) && !empty($o->text_trans) && empty($o->text_revisi) && empty($path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <!-- Selesai order teks, tidak menerima permintaan revisi, sudah ada konfirmasi 'selesai' dari klien, menerima fee -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-primary">6</span>
                              @elseif(!empty($o->id_translator) && empty($o->pesan_revisi) && !empty($o->path_file_trans) && empty($o->text_revisi) && empty($path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                               <!-- Selesai order file, tidak menerima permintaan revisi, sudah ada konfirmasi 'selesai' dari klien, menerima fee -->
                              <span class="badge badge-pill badge-primary">1</span>
                              <span class="badge badge-pill badge-primary">2</span>
                              <span class="badge badge-pill badge-primary">3</span>
                              <span class="badge badge-pill badge-primary">4</span>
                              <span class="badge badge-pill badge-primary">5</span>
                              <span class="badge badge-pill badge-primary">6</span>
                              @endif
                            </div>
                            <div class="col-sm-10">
                              @if(!empty($o->id_translator) && empty($o->path_file_trans) && empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menerima order</p>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menyelesaikan order</p>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menyelesaikan order</p>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Order Selesai</p>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Order Selesai</p>
                              @elseif(!empty($o->id_translator) && !empty($o->text_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menerima permintaan revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menerima permintaan revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menyelesaikan permintaan revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='belum selesai')
                              <p class="text-right">Status: Menyelesaikan permintaan revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Selesai Revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Selesai Revisi</p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Menerima pembayaran. Download bukti pembayaran <a href="/activity-download/{{$o->id_fee}}">disini</a></p>
                              @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Menerima pembayaran. Download bukti pembayaran <a href="/activity-download/{{$o->id_fee}}">disini</a></p>
                              @elseif(!empty($o->id_translator) && empty($o->pesan_revisi) && !empty($o->text_trans) && empty($o->text_revisi) && empty($path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Menerima pembayaran. Download bukti pembayaran <a href="/activity-download/{{$o->id_fee}}">disini</a></p>
                              @elseif(!empty($o->id_translator) && empty($o->pesan_revisi) && !empty($o->path_file_trans) && empty($o->text_revisi) && empty($path_file_revisi) && !empty($o->bukti_fee_trans) && $o->status_at=='selesai')
                              <p class="text-right">Status: Menerima pembayaran. Download bukti pembayaran <a href="/activity-download/{{$o->id_fee}}">disini</a></p>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      </div>
                      <!-- /.timeline -->
                    </div>
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
    </div>
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