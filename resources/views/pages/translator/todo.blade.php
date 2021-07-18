@extends('layouts.translator.master')

@section('title', 'To Do List')
@section('content')
<!-- TO DO List -->
<div class="container-fluid">
<div class="row">
          <div class="col-md-1">
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#order" data-toggle="tab">Daftar Pekerjaan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#revisi" data-toggle="tab">Permintaan Revisi</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="order">
                    @foreach($order as $o)
                      <div class="card">
                        <div class="card-header">
                          <b>No. Order #{{$o->id_order}}</b>
                          <br>
                          {{$o->tgl_order}}
                        </div>
                        <!-- /.card-header -->
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
                              @if(empty($o->tipe_offline)) 
                              <td><p class="text-left">Deadline</p><td> 
                              <td><p class="font-weight-bold text-left">{{Carbon\Carbon::parse($o->tgl_order)->addDays($o->durasi_pengerjaan)}}</p></td>
                              @else
                              <td><p class="text-left">Bertemu pada</p><td> 
                              <td><p class="font-weight-bold text-left">{{$o->tanggal_pertemuan}} | {{$o->waktu_pertemuan}} </p></td>
                              @endif
                            </tr>
                          </table>
                          <div class="tools">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateOrder-{{$o->id_order}}">
                              <i class="nav-icon fas fa-eye"></i> Detail Order
                            </button>
                          </div>
                        </div>
                      </div>
                    @endforeach


                    @foreach($order as $o)
                            <div class="modal fade" id="updateOrder-{{$o->id_order}}" tabindex="-1" aria-labelledby="updateSelectionLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="updateSelectionLabel">Detail Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        @if($o->menu=='Text')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="p_jenis_teks" class="col-sm-3 col-form-label">Jenis Teks</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_teks" id="p_jenis_teks" readonly value="{{$o->p_jenis_teks}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="teks" class="col-sm-3 col-form-label">Teks</label>
                                          <div class="col-sm-9">
                                            <textarea class="form-control" id="teks" name="teks" rows="5" readonly="readonly">{{$o->text}}</textarea>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="jumlah_karakter" class="col-sm-3 col-form-label">Jumlah Kata</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jumlah_karakter" id="jumlah_karakter" readonly value="{{$o->jumlah_karakter}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                                          </div>
                                        </div>
                                        <form action="/text-translator/{{$o->id_order}}" method="POST">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="text_trans" class="col-sm-3 col-form-label">Terjemahan</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" id="text_trans" name="text_trans" rows="5">{{$o->text_trans}}</textarea>
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->menu=='Transkrip' && $o->tipe_offline=='')
                                        <div class="form-group row">
                                            <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$o->nama_dokumen}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="durasi_audio" class="col-sm-3 col-form-label">Durasi Audio</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="durasi_audio" id="durasi_audio" readonly value="{{$o->durasi_audio}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$o->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                          </div>
                                          <form action="/tdl-upload-audio/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->menu=='Interpreter' && $o->tipe_offline=='Transkrip')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$o->p_durasi_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="tanggal_pertemuan" class="col-sm-3 col-form-label">Tanggal Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tanggal_pertemuan" id="tanggal_pertemuan" readonly value="{{$o->tanggal_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="waktu_pertemuan" class="col-sm-3 col-form-label">Waktu Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="waktu_pertemuan" id="waktu_pertemuan" readonly value="{{$o->waktu_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="lokasi" class="col-sm-3 col-form-label">Detail Lokasi</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" readonly value="{{$o->lokasi}}">
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-offline/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload Bukti Bertemu</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->menu=='Dubbing')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$o->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$o->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="jumlah_dubber" class="col-sm-3 col-form-label">Jumlah Dubber</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jumlah_dubber" id="jumlah_dubber" readonly value="{{$o->jumlah_dubber}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$o->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-video/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->tipe_offline=='Interpreter' && $o->menu == "Interpreter")
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$o->p_durasi_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="tanggal_pertemuan" class="col-sm-3 col-form-label">Tanggal Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tanggal_pertemuan" id="tanggal_pertemuan" readonly value="{{$o->tanggal_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="waktu_pertemuan" class="col-sm-3 col-form-label">Waktu Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="waktu_pertemuan" id="waktu_pertemuan" readonly value="{{$o->waktu_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="lokasi" class="col-sm-3 col-form-label">Detail Lokasi</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" readonly value="{{$o->lokasi}}">
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-offline/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload Bukti Bertemu</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->menu=='Dokumen')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="p_jenis_teks" class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_teks" id="p_jenis_teks" readonly value="{{$o->p_jenis_teks}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$o->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$o->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="pages" class="col-sm-3 col-form-label">Jumlah Halaman</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pages" id="pages" readonly value="{{$o->pages}} halaman">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$o->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-dokumen/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($o->menu=='Subtitle')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$o->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$o->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_video" class="col-sm-3 col-form-label">Durasi Video</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_video" id="durasi_video" readonly value="{{$o->durasi_video}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$o->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-video/{{$o->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                    @endforeach
                  </div>

                  <div class="tab-pane" id="revisi">
                    @foreach($revisi as $r)
                      <div class="card">
                        <div class="card-header">
                          <b>No. Order #{{$r->id_order}}</b>
                          <br>
                          {{$r->tgl_pengajuan_revisi}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table width="400px">
                            <tr>
                              <td><p class="text-left">Nama Klien</p><td> 
                              <td><p class="font-weight-bold text-left"><a href="#">{{$r->name}}</a> {{$r->email}}</p></td>
                            </tr>
                            <tr>
                              <td><p class="text-left">Menu</p><td>
                              @if(empty($r->tipe_offline)) 
                              <td><p class="font-weight-bold text-left">{{$r->menu}}</p></td>
                              @else
                              <td><p class="font-weight-bold text-left">{{$r->tipe_offline}} Offline</p></td>
                              @endif
                            </tr>
                            <tr>
                              @if(empty($r->tipe_offline)) 
                              <td><p class="text-left">Deadline Revisi</p><td> 
                              <td><p class="font-weight-bold text-left">{{Carbon\Carbon::parse($r->tgl_pengajuan_revisi)->addDays($r->durasi_pengerjaan_revisi)}}</p></td>
                              @else
                              <td><p class="text-left">Bertemu pada</p><td> 
                              <td><p class="font-weight-bold text-left">{{$r->tanggal_pertemuan}} | {{$r->waktu_pertemuan}} </p></td>
                              @endif
                            </tr>
                          </table>
                          <div class="tools">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateOrder-{{$r->id_order}}">
                              <i class="nav-icon fas fa-eye"></i> Detail Order
                            </button>
                          </div>
                        </div>
                      </div>
                    @endforeach

                    @foreach($revisi as $r)
                            <div class="modal fade" id="updateOrder-{{$r->id_order}}" tabindex="-1" aria-labelledby="updateSelectionLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="updateSelectionLabel">Detail Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        @if($r->menu=='Text')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$r->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="p_jenis_teks" class="col-sm-3 col-form-label">Jenis Teks</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_teks" id="p_jenis_teks" readonly value="{{$r->p_jenis_teks}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="jumlah_karakter" class="col-sm-3 col-form-label">Jumlah Kata</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jumlah_karakter" id="jumlah_karakter" readonly value="{{$r->jumlah_karakter}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$r->durasi_pengerjaan_revisi}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="pesan_revisi" class="col-sm-3 col-form-label">Catatan Revisi</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pesan_revisi" id="pesan_revisi" readonly value="{{$r->pesan_revisi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="teks" class="col-sm-3 col-form-label">Teks</label>
                                          <div class="col-sm-9">
                                            <textarea class="form-control" id="teks" name="teks" rows="5" readonly="readonly">{{$r->text}}</textarea>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text_trans" class="col-sm-3 col-form-label">Hasil Terjemahan (1)</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" id="text_trans" name="text_trans" rows="5" readonly="readonly">{{$r->text_trans}}</textarea>
                                            </div>
                                          </div>
                                        <form action="/textRevisi-translator/{{$r->id_order}}" method="POST">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="text_revisi" class="col-sm-3 col-form-label">Revisi</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" id="text_revisi" name="text_revisi" rows="5">{{$r->text_revisi}}</textarea>
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->menu=='Transkrip' && $r->tipe_offline=='')
                                        <div class="form-group row">
                                            <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$r->jenis_layanan}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$r->nama_dokumen}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="durasi_audio" class="col-sm-3 col-form-label">Durasi Audio</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="durasi_audio" id="durasi_audio" readonly value="{{$r->durasi_audio}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$r->durasi_pengerjaan_revisi}} hari">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="pesan_revisi" class="col-sm-3 col-form-label">Catatan Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="pesan_revisi" id="pesan_revisi" readonly value="{{$r->pesan_revisi}}">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                            <div class="col-sm-9">
                                            <a href="/to-do-list-download/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="path_file" class="col-sm-3 col-form-label">File Terjemahan Pertama</label>
                                            <div class="col-sm-9">
                                            <a href="/to-do-list-downloadRevisi/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                            </div>
                                          </div>
                                          <form action="/tdl-upload-audioRevisi/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_revisi" class="col-sm-3 col-form-label">Upload File</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_revisi" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->menu=='Interpreter' && $r->tipe_offline=='Transkrip')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$r->jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$r->p_durasi_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="tanggal_pertemuan" class="col-sm-3 col-form-label">Tanggal Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tanggal_pertemuan" id="tanggal_pertemuan" readonly value="{{$r->tanggal_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="waktu_pertemuan" class="col-sm-3 col-form-label">Waktu Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="waktu_pertemuan" id="waktu_pertemuan" readonly value="{{$r->waktu_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="lokasi" class="col-sm-3 col-form-label">Detail Lokasi</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" readonly value="{{$r->lokasi}}">
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-offline/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload Bukti Bertemu</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->menu=='Dubbing')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$r->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$r->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$r->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="jumlah_dubber" class="col-sm-3 col-form-label">Jumlah Dubber</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="jumlah_dubber" id="jumlah_dubber" readonly value="{{$r->jumlah_dubber}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$r->durasi_pengerjaan_revisi}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pesan_revisi" class="col-sm-3 col-form-label">Catatan Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="pesan_revisi" id="pesan_revisi" readonly value="{{$r->pesan_revisi}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="path_file" class="col-sm-3 col-form-label">Hasil Terjemahan (1)</label>
                                            <div class="col-sm-9">
                                            <a href="/to-do-list-downloadRevisi/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                            </div>
                                        </div>
                                        <form action="/tdl-upload-videoRevisi/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_revisi" class="col-sm-3 col-form-label">Upload Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_revisi" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->tipe_offline=='Interpreter' && $r->menu == "Interpreter")
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$r->jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$r->p_durasi_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="tanggal_pertemuan" class="col-sm-3 col-form-label">Tanggal Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tanggal_pertemuan" id="tanggal_pertemuan" readonly value="{{$r->tanggal_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="waktu_pertemuan" class="col-sm-3 col-form-label">Waktu Pertemuan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="waktu_pertemuan" id="waktu_pertemuan" readonly value="{{$r->waktu_pertemuan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="lokasi" class="col-sm-3 col-form-label">Detail Lokasi</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" readonly value="{{$r->lokasi}}">
                                          </div>
                                        </div>
                                        <form action="/tdl-upload-offline/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group row">
                                            <label for="path_file_trans" class="col-sm-3 col-form-label">Upload Bukti Bertemu</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_trans" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->menu=='Dokumen')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$r->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="p_jenis_teks" class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_teks" id="p_jenis_teks" readonly value="{{$r->p_jenis_teks}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$r->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$r->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="pages" class="col-sm-3 col-form-label">Jumlah Halaman</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pages" id="pages" readonly value="{{$r->pages}} halaman">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$r->durasi_pengerjaan_revisi}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pesan_revisi" class="col-sm-3 col-form-label">Catatan Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="pesan_revisi" id="pesan_revisi" readonly value="{{$r->pesan_revisi}}">
                                            </div>
                                          </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="path_file" class="col-sm-3 col-form-label">Hasil Terjemahan (1)</label>
                                            <div class="col-sm-9">
                                            <a href="/to-do-list-downloadRevisi/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                            </div>
                                        </div>
                                        <form action="/tdl-upload-dokumenRevisi/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_revisi" class="col-sm-3 col-form-label">Upload Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_revisi" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @elseif($r->menu=='Subtitle')
                                        <div class="form-group row">
                                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$r->p_jenis_layanan}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" readonly value="{{$r->nama_dokumen}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ekstensi" class="col-sm-3 col-form-label">Ekstensi File</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ekstensi" id="ekstensi" readonly value="{{$r->ekstensi}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_video" class="col-sm-3 col-form-label">Durasi Video</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_video" id="durasi_video" readonly value="{{$r->durasi_video}}">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" name="durasi_pengerjaan" id="durasi_pengerjaan" readonly value="{{$r->durasi_pengerjaan_revisi}} hari">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pesan_revisi" class="col-sm-3 col-form-label">Catatan Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="pesan_revisi" id="pesan_revisi" readonly value="{{$r->pesan_revisi}}">
                                            </div>
                                          </div>
                                        <div class="form-group row">
                                          <label for="path_file" class="col-sm-3 col-form-label">Download File</label>
                                          <div class="col-sm-9">
                                          <a href="/to-do-list-download/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="path_file" class="col-sm-3 col-form-label">Hasil Terjemahan (1)</label>
                                            <div class="col-sm-9">
                                            <a href="/to-do-list-downloadRevisi/{{$r->id_order}}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download </a>
                                            </div>
                                        </div>
                                        <form action="/tdl-upload-videoRevisi/{{$r->id_order}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                            <label for="path_file_revisi" class="col-sm-3 col-form-label">Upload Revisi</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="path_file_revisi" class="form-input">
                                            </div>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                    @endforeach
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
</div>
@endsection
