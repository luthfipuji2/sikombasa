@extends('layouts/admin/template')

@section('title', 'Detail Transaksi')

@section('container')

    <section class="content">  
      <div class="container-fluid">
        <div class="row">

          <!-- /.col -->
          <div class="col-12 mt-3">
                
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> SIKOMBASA
                                <small class="float-right">Date: 2/10/2014</small>
                            </h4>

                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>SIKOMBASA</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{$detail->name}}</strong><br>
                                    {{$detail->alamat}}<br>
                                    {{$detail->no_telp}}<br>
                                    {{$detail->email}}
                                </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                <b>Invoice #{{$detail->id_transaksi}}</b><br>
                                <br>
                                <b>Order ID:</b> {{$detail->id_order}}<br>
                                <b>Waktu Order:</b> {{$detail->tgl_order}}<br>
                                <b>Waktu Transaksi:</b> {{$detail->tgl_transaksi}}<br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

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
                                    <td>{{ substr($detail->text, 0,  500) }}</td>
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
                                    <td class="bg-cyan"><i class="fas fa-tags"></i>&nbsp;&nbsp;<b>Harga Total</b></td>
                                    @if(!empty($detail->p_harga))
                                    <td class="bg-cyan"><b> Rp. {{$detail->p_harga}}</b></td>
                                    @elseif(!empty($detail->order->harga))
                                    <td class="bg-cyan"><b> Rp. {{$detail->order->harga}}</b></td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                    <tr>
                                        <th style="width:50%">Metode Pembayaran:</th>
                                        <td>Transfer Bank {{$detail->nama_bank}}-{{$detail->no_rekening}} ({{$detail->nama_rekening}})</td>
                                    </tr>
                                    <tr>
                                        <th>Status Transaksi</th>
                                        <td>{{$detail->status_transaksi}}</td>
                                    </tr>
                                    </table>
                                </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection