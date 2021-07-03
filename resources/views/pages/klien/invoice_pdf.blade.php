<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

		<style>
			@media print {
			.invoice {
				font-size: 11px!important;
				overflow: hidden!important
			}

			.invoice footer {
				position: absolute;
				bottom: 10px;
				page-break-after: always
			}

			.invoice>div:last-child {
				page-break-before: always
			}
		}
			.invoice-title h2, .invoice-title h3 {
				display: inline-block;
			}

			.table > tbody > tr > .no-line {
				border-top: none;
			}

			.table > thead > tr > .no-line {
				border-bottom: none;
			}

			.table > tbody > tr > .thick-line {
				border-top: 2px solid;
			}
		</style>
	</head>

	<body>
  
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->

		<div class="toolbar hidden-print">
			<div class="text-right">
				<button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
			</div>
			<hr>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="invoice-title">
						<h2>Invoice</h2><h3 class="pull-right">Order #{{$invoice->id_order}}</h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-6">
							<address>
							<strong>From:</strong><br>
								SIKOMBASA<br>
								Jl Kolonel Sutarto 150 K,<br>
								Jebres Surakarta, Jawa Tengah<br>
								0271-664126
							</address>
						</div>
						<div class="col-xs-6 text-right">
							<address>
							<strong>To:</strong><br>
								{{$invoice->name}}<br>
								{{$invoice->alamat}}<br>
								{{$invoice->kecamatan}}, {{$invoice->kabupaten}}, {{$invoice->provinsi}}, {{$invoice->kode_pos}} <br>
								{{$invoice->no_telp}}
							</address>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<address>
								<strong>Payment Method:</strong><br>
								Transfer Bank {{$invoice->nama_bank}}<br>
								No Rek: {{$invoice->no_rekening}} ({{$invoice->nama_rekening}})
							</address>
						</div>
						<div class="col-xs-6 text-right">
							<address>
								<strong>Order Date:</strong><br>
								{{$invoice->tgl_order}}<br><br>
							</address>
							<address>
								<strong>Transaction Date:</strong><br>
								{{$invoice->tgl_transaksi}}<br><br>
								</address>	
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><strong>Order summary</strong></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
							<table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td style="width: 200px"><b>Jenis Layanan</b></td>
                                    @if(!empty($invoice->p_jenis_layanan))
                                    <td>{{$invoice->p_jenis_layanan}}</td>
                                    @elseif(!empty($invoice->jenis_layanan))
                                    <td>{{$invoice->parameter_order->p_jenis_layanan}}</td>
                                    @endif
                                </tr>

                                @if(!empty($invoice->tipe_offline))
                                <tr>
                                    <td style="width: 200px"><b>Jenis Menu Offline</b></td>
                                    <td>{{$invoice->tipe_offline}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->p_jenis_teks))
                                <tr>
                                    <td style="width: 200px"><b>Jenis Teks</b></td>
                                    <td>{{$invoice->p_jenis_teks}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->durasi_pengerjaan))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Pengerjaan</b></td>
                                    <td>{{$invoice->durasi_pengerjaan}} Hari</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->p_durasi_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Pertemuan</b></td>
                                    <td>{{$invoice->p_durasi_pertemuan}} Hari</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->text))
                                <tr>
                                    <td style="width: 200px"><b>Teks</b></td>
                                    <td>{{ substr($invoice->text, 0,  500) }}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->jumlah_karakter))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Karakter</b></td>
                                    <td>{{$invoice->jumlah_karakter}} Kata</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->nama_dokumen))
                                <tr>
                                    <td style="width: 200px"><b>Nama Dokumen</b></td>
                                    <td>{{$invoice->nama_dokumen}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->jumlah_halaman))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Halaman Dokumen</b></td>
                                    <td>{{$invoice->jumlah_halaman}} Halaman</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->durasi_video))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Video</b></td>
                                    <td>{{(($invoice->durasi_video)/60)%60}} menit</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->jumlah_dubber))
                                <tr>
                                    <td style="width: 200px"><b>Jumlah Dubber</b></td>
                                    <td>{{$invoice->jumlah_dubber}} Orang</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->tanggal_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Tanggal Pertemuan</b></td>
                                    <td>{{$invoice->tanggal_pertemuan}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->waktu_pertemuan))
                                <tr>
                                    <td style="width: 200px"><b>Waktu Pertemuan</b></td>
                                    <td>{{$invoice->waktu_pertemuan}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->lokasi))
                                <tr>
                                    <td style="width: 200px"><b>Catatan Lokasi</b></td>
                                    <td>{{$invoice->lokasi}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->latitude))
                                <tr>
                                    <td style="width: 200px"><b>Latitude</b></td>
                                    <td>{{$invoice->latitude}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->longitude))
                                <tr>
                                    <td style="width: 200px"><b>Longitude</b></td>
                                    <td>{{$invoice->longitude}}</td>
                                </tr>
                                @endif

                                @if(!empty($invoice->durasi_audio))
                                <tr>
                                    <td style="width: 200px"><b>Durasi Audio</b></td>
                                    <td>{{(($invoice->durasi_audio)/60)%60}} menit</td>
                                </tr>
                                @endif
							</table>

							<table class="table table-bordered table-striped">
								<tr>
                                    <td class="bg-cyan"><i class="fas fa-tags"></i><b>Harga Total</b></td>
                                    @if(!empty($invoice->p_harga))
                                    <td class="bg-cyan"><b> Rp. {{$invoice->p_harga}}</b></td>
                                    @elseif(!empty($invoice->order->harga))
                                    <td class="bg-cyan"><b> Rp. {{$invoice->order->harga}}</b></td>
                                    @endif
                                </tr>

    							<tr>
    								<td><strong>Status Transaksi</strong></td>
    								<td>{{$invoice->status_transaksi}}</td>
    							</tr>
                                </tbody>
                            </table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    
</body>
</html>

<script>
	 $('#printInvoice').click(function(){

                window.print();
                return true;
            }
        );
</script>
