@extends('layouts.translator.master')

@section('title', 'To Do List')
@section('content')
<!-- TO DO List -->
<div class="container-fluid">
  <div class="row">
    <section class="col-lg-7 connectedSortable ui-sortable">
    <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        To Do List
      </h3>

      <div class="card-tools">
        <ul class="pagination pagination-sm">
          <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
          <li class="page-item"><a href="#" class="page-link">1</a></li>
          <li class="page-item"><a href="#" class="page-link">2</a></li>
          <li class="page-item"><a href="#" class="page-link">3</a></li>
          <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
        </ul>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <ul class="todo-list" data-widget="todo-list">
      @foreach($order as $o)
        <li>
          <!-- checkbox -->
          <div  class="icheck-primary d-inline ml-2">
            <input type="checkbox" value="" name="todo1" id="todoCheck1">
            <label for="todoCheck1"></label>
          </div>
          <!-- todo text -->
          <span class="text">{{$o->name}}</span>
          <span class="text">:</span>
          <span class="text">{{$o->menu}}</span>
          <!-- Emphasis label -->
          @if($o->menu=='Interpreter' || $o->menu=='Transkrip' && $o->tipe_offline=='Transkrip')
          <small class="badge badge-primary"><i class="far fa-clock"></i> {{Carbon\Carbon::parse($o->tanggal_pertemuan)->diffInDays($today)}} hari </small>
          @else
          <small class="badge badge-danger"><i class="far fa-clock"></i> {{Carbon\Carbon::parse($today)->addDays($o->durasi_pengerjaan)->diffInDays($today)}} hari </small>
          @endif
          <!-- General tools such as edit or delete-->
          <div class="tools">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateOrder-{{$o->id_order}}">
              <i class="nav-icon fas fa-eye"></i>
            </button>
            <i class="fas fa-trash"></i>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

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
                            <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
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
                        @elseif($o->menu=='Transkrip')
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
                            <label for="durasi_audio" class="col-sm-3 col-form-label">Durasi Audio</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="durasi_audio" id="durasi_audio" readonly value="{{$o->durasi_audio}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="durasi_pengerjaan" class="col-sm-3 col-form-label">Durasi Pengerjaan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
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
                        @elseif($o->menu=='Transkrip' && $o->tipe_offline=="Transkrip")
                        <div class="form-group row">
                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$o->durasi_pertemuan}}">
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
                        <form>
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
                            <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
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
                        @elseif($o->tipe_offline=='Interpreter')
                        <div class="form-group row">
                        <div class="form-group row">
                          <label for="p_jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="p_jenis_layanan" id="p_jenis_layanan" readonly value="{{$o->p_jenis_layanan}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="durasi_pertemuan" class="col-sm-3 col-form-label">Durasi Pertemuan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="durasi_pertemuan" id="durasi_pertemuan" readonly value="{{$o->durasi_pertemuan}}">
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
                        <form>
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
                            <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
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
                            <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
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
    <!-- /.card-body -->
    <!-- /.card -->
    </div>
    </section>
    <section class="col-lg-5 connectedSortable ui-sortable">
      <div class="card bg-gradient-info" style="position: relative; left: 0px; top: 0px;">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">June 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="05/30/2021" class="day old weekend">30</td><td data-action="selectDay" data-day="05/31/2021" class="day old">31</td><td data-action="selectDay" data-day="06/01/2021" class="day">1</td><td data-action="selectDay" data-day="06/02/2021" class="day">2</td><td data-action="selectDay" data-day="06/03/2021" class="day">3</td><td data-action="selectDay" data-day="06/04/2021" class="day">4</td><td data-action="selectDay" data-day="06/05/2021" class="day weekend">5</td></tr><tr><td data-action="selectDay" data-day="06/06/2021" class="day weekend">6</td><td data-action="selectDay" data-day="06/07/2021" class="day">7</td><td data-action="selectDay" data-day="06/08/2021" class="day">8</td><td data-action="selectDay" data-day="06/09/2021" class="day">9</td><td data-action="selectDay" data-day="06/10/2021" class="day">10</td><td data-action="selectDay" data-day="06/11/2021" class="day">11</td><td data-action="selectDay" data-day="06/12/2021" class="day weekend">12</td></tr><tr><td data-action="selectDay" data-day="06/13/2021" class="day weekend">13</td><td data-action="selectDay" data-day="06/14/2021" class="day">14</td><td data-action="selectDay" data-day="06/15/2021" class="day">15</td><td data-action="selectDay" data-day="06/16/2021" class="day">16</td><td data-action="selectDay" data-day="06/17/2021" class="day">17</td><td data-action="selectDay" data-day="06/18/2021" class="day">18</td><td data-action="selectDay" data-day="06/19/2021" class="day weekend">19</td></tr><tr><td data-action="selectDay" data-day="06/20/2021" class="day weekend">20</td><td data-action="selectDay" data-day="06/21/2021" class="day active today">21</td><td data-action="selectDay" data-day="06/22/2021" class="day">22</td><td data-action="selectDay" data-day="06/23/2021" class="day">23</td><td data-action="selectDay" data-day="06/24/2021" class="day">24</td><td data-action="selectDay" data-day="06/25/2021" class="day">25</td><td data-action="selectDay" data-day="06/26/2021" class="day weekend">26</td></tr><tr><td data-action="selectDay" data-day="06/27/2021" class="day weekend">27</td><td data-action="selectDay" data-day="06/28/2021" class="day">28</td><td data-action="selectDay" data-day="06/29/2021" class="day">29</td><td data-action="selectDay" data-day="06/30/2021" class="day">30</td><td data-action="selectDay" data-day="07/01/2021" class="day new">1</td><td data-action="selectDay" data-day="07/02/2021" class="day new">2</td><td data-action="selectDay" data-day="07/03/2021" class="day new weekend">3</td></tr><tr><td data-action="selectDay" data-day="07/04/2021" class="day new weekend">4</td><td data-action="selectDay" data-day="07/05/2021" class="day new">5</td><td data-action="selectDay" data-day="07/06/2021" class="day new">6</td><td data-action="selectDay" data-day="07/07/2021" class="day new">7</td><td data-action="selectDay" data-day="07/08/2021" class="day new">8</td><td data-action="selectDay" data-day="07/09/2021" class="day new">9</td><td data-action="selectDay" data-day="07/10/2021" class="day new weekend">10</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month active">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
  </div>
</div>
@endsection
