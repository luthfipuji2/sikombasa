@extends('layouts/admin/template')

@section('container')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        Detail Pelamar
    </div>
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
                <label for="keahlian" class="col-sm-3 col-form-label">Keahlian</label>
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
                </div>
            </div>
            <div class="form-group row">
                <label for="cv" class="col-sm-3 col-form-label">CV</label>
                <div class="col-sm-9">
                    <img src="{{asset('/img/dokumen/'.$dokumen->cv)}}" height="90" width="150" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label for="ijazah_terakhir" class="col-sm-3 col-form-label">Ijazah Terakhir</label>
                <div class="col-sm-9">
                    <img src="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" height="90" width="150" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label for="portofolio" class="col-sm-3 col-form-label">Portofolio</label>
                <div class="col-sm-9">
                    <img src="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" height="90" width="150" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label for="sk_sehat" class="col-sm-3 col-form-label">Surat Keterangan Sehat</label>
                <div class="col-sm-9">
                    <img src="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" height="90" width="150" alt="" srcset="">
                </div>
            </div>
            <div class="form-group row">
                <label for="skck" class="col-sm-3 col-form-label">Surat Keterangan Berkelakuan Baik</label>
                <div class="col-sm-9">
                    <img src="{{asset('/img/dokumen/'.$dokumen->skck)}}" height="90" width="150" alt="" srcset="">
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
                </div>
            </div>
            @endforeach
            <div class="form-group row">
                <div class="col-sm-10">
                    <a href="/hire" class="btn btn-primary">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection