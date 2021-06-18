@extends('layouts.translator.master')

@section('title', 'To Do List')
@section('content')
<!-- TO DO List -->
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
      <!-- drag handle -->
      <span class="handle">
        <i class="fas fa-ellipsis-v"></i>
        <i class="fas fa-ellipsis-v"></i>
      </span>
      <!-- checkbox -->
      <div  class="icheck-primary d-inline ml-2">
        <input type="checkbox" value="" name="todo1" id="todoCheck1">
        <label for="todoCheck1"></label>
      </div>
      <!-- todo text -->
      <span class="text">{{$o->menu}}</span>
      <!-- Emphasis label -->
      @if($o->menu=='interpreter' || $o->menu=='transkrip' && $o->tipe_transkrip=='2')
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
                    @if($o->menu=='teks')
                    <div class="form-group row">
                      <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_teks" class="col-sm-3 col-form-label">Jenis Teks</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_teks" id="jenis_teks" readonly value="{{$o->jenis_teks}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="teks" class="col-sm-3 col-form-label">Teks</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="teks" name="teks" rows="5">{{$o->text}}</textarea>
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
                    <form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @elseif($o->menu=='transkrip' && $o->tipe_transkrip=='1')
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
                          <input type="text" class="form-control" name="ndurasi_pengerjaan" id="ndurasi_pengerjaan" readonly value="{{$o->durasi_pengerjaan}} hari">
                        </div>
                      </div>
                      <form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    @elseif($o->menu=='transkrip' && $o->tipe_transkrip=='2')
                    <div class="form-group row">
                      <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
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
                    @elseif($o->menu=='dubbing')
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
                    <form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @elseif($o->menu=='interpreter')
                    <div class="form-group row">
                    <div class="form-group row">
                      <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
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
                    @elseif($o->menu=='dokumen')
                    <div class="form-group row">
                      <label for="jenis_layanan" class="col-sm-3 col-form-label">Jenis Layanan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" readonly value="{{$o->jenis_layanan}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_teks" class="col-sm-3 col-form-label">Jenis Dokumen</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="jenis_teks" id="jenis_teks" readonly value="{{$o->jenis_teks}}">
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
                    <form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @elseif($o->menu=='subtitle')
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
                    <form>
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



@endsection