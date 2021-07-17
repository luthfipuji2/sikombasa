@extends('layouts.klien.sidebar')
@section('content')

<!-- Modal Revisi -->
<div class="modal fade" id="revisi{{$order->id_order}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajukan Revisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/order-transkrip/revisi" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$order->id_order}}" hidden>
            
            <div class="form-group">
                <label for="nama">Pesan Revisi</label>
                <input type="text" class="form-control @error('pesan_revisi') is-invalid @enderror" name="pesan_revisi" id="pesan_revisi" placeholder="Tuliskan Pesan Bagian Yang Harus Direvisi">
                @error('pesan_revisi')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                    @enderror    
            </div>
            <div class="form-group">
                <label for="nama">Durasi Pengerjaan</label>
                    <select class="form-control @error('durasi_pengerjaan_revisi') is-invalid @enderror" 
                    id="durasi_pengerjaan_revisi" placeholder="Durasi Pengerjaan Revisi" name="durasi_pengerjaan_revisi">
                    <option value="">--Pilih Durasi Pengerjaan Revisi--</option>
                    <option value="1">1 Hari</option>
                    <option value="2">2 Hari</option>
                    <option value="3">3 Hari</option>
                    </select>
                    @error ('durasi_pengerjaan_revisi')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
            </div>
        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="container ">
            {{-- status --}}
            <div class="row">
                <div class="card-body">
                    <form action="  " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                            <h4 class="text-olive">
                            <i class="fab fa-shopify"></i>  Detail Order Menu Transkrip #{{$order->id_order}}
                            </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col invoice-col">
                            <br><br>
                            </div>
                            <!-- /.col -->
                            <div class="col invoice-col">
                            <br><br>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Order</th>
                                            <th>Nama Dokumen</th>
                                            <th>Jenis Layanan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$order->tgl_order}}</td>
                                            <td>{{$order->nama_dokumen}}</td>
                                            <td>{{$order->jenis_layanan}}</td>
                                            <td>
                                            <div class="col">
                                            @if($order->jenis_layanan=='Premium'&& $revisi->id_revisi=='')
                                            <a href="/order-transkrip-download/{{$order->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Hasil Terjemahan </a>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#revisi{{$order->id_order}}">Ajukan Revisi</button>
                                            @elseif($order->jenis_layanan=='Basic')
                                            <a href="/order-transkrip-download/{{$order->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Hasil Terjemahan </a>
                                            @elseif(!empty($revisi->id_revisi && $revisi->path_file_revisi==''))
                                            <a href="/order-transkrip-download/{{$order->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Hasil Terjemahan </a>
                                            <span class="badge badge-danger">Revisi Sedang Diajukan</span></span>
                                            @elseif(!empty($revisi->path_file_revisi && $revisi->id_revisi))
                                            <a href="/order-transkrip-download/{{$order->id_order}}" class="btn btn-primary btn-sm" ><i class="fas fa-download"></i> Download Hasil Terjemahan </a>
                                            <span class="badge badge-success">Revisi Selesai</span></span>
                                            <a href="/order-transkrip/revisi-download/{{$order->id_order}}" class="btn btn-secondary btn-sm" ><i class="fas fa-download"></i> Download Hasil Revisi </a>
                                            @endif
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
@endsection 