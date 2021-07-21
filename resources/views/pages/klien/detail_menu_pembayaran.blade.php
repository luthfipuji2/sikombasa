@extends('layouts.klien.sidebar')

@section('title', 'Detail Order')

@section('content')
    
<div class="container">
    <section class="content">  
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{ url ('/menu-pembayaran') }}" class="btn btn-primary mx-1 btn-icon" type="submit" class="text-right" style="float: left;"><i class="fas fa-arrow-left"></i> Kembali ke Menu Pembayaran</a>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    @if(!empty($detail->p_jenis_layanan))
                                    <td>{{$detail->p_jenis_layanan}}</td>
                                    @elseif(!empty($detail->jenis_layanan))
                                    <td>{{$detail->parameter_order->p_jenis_layanan}}</td>
                                    @endif
                                </tr>

                                @if(!empty($detail->tipe_offline))
                                <tr>
                                    <td style="width: 200px"><b>Jenis Menu Offline</b></td>
                                    <td>{{$detail->tipe_offline}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->p_jenis_teks))
                                <tr>
                                    <td style="width: 200px"><b>Jenis Teks</b></td>
                                    <td>{{$detail->p_jenis_teks}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->durasi_pengerjaan))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$detail->durasi_pengerjaan}} Hari</td>
                                </tr>
                                @endif

                                @if(!empty($detail->p_durasi_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Pertemuan</b></td>
                                    <td>{{$detail->p_durasi_pertemuan}} Hari</td>
                                </tr>
                                @endif

                                @if(!empty($detail->text))
                                <tr>
                                    <td style="width: 200px"><b>Teks</b></td>
                                    <td>{{$detail->text}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->jumlah_karakter))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Karakter</b></td>
                                    <td>{{$detail->jumlah_karakter}} Kata</td>
                                </tr>
                                @endif

                                @if(!empty($detail->nama_dokumen))
                                <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$detail->nama_dokumen}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->jumlah_halaman))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Halaman Dokumen</b></td>
                                    <td>{{$detail->jumlah_halaman}} Halaman</td>
                                </tr>
                                @endif

                                @if(!empty($detail->durasi_video))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Video</b></td>
                                    <td>{{(($detail->durasi_video)/60)%60}} menit</td>
                                </tr>
                                @endif

                                @if(!empty($detail->jumlah_dubber))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Dubber</b></td>
                                    <td>{{$detail->jumlah_dubber}} Orang</td>
                                </tr>
                                @endif

                                @if(!empty($detail->tanggal_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Tanggal Pertemuan</b></td>
                                    <td>{{$detail->tanggal_pertemuan}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->waktu_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Waktu Pertemuan</b></td>
                                    <td>{{$detail->waktu_pertemuan}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->lokasi))
                                <tr>
                                    <td style="width: 200px"><b>Catatan Lokasi</b></td>
                                    <td>{{$detail->lokasi}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->latitude))
                                <tr>
                                    <td style="width: 200px"><b>Latitude</b></td>
                                    <td>{{$detail->latitude}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->longitude))
                                <tr>
                                    <td style="width: 200px"><b>Longitude</b></td>
                                    <td>{{$detail->longitude}}</td>
                                </tr>
                                @endif

                                @if(!empty($detail->durasi_audio))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Audio</b></td>
                                    <td>{{(($detail->durasi_audio)/60)%60}} menit</td>
                                </tr>
                                @endif


                                <tr>
                                    <td class="bg-cyan"><i class="fas fa-tags"></i>&nbsp;&nbsp;<b>Harga</b></td>
                                    @if(!empty($detail->p_harga))
                                    <td class="bg-cyan"><b> Rp. {{$detail->p_harga}}</b></td>
                                    @elseif(!empty($detail->order->harga))
                                    <td class="bg-cyan"><b> Rp. {{$detail->order->harga}}</b></td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection