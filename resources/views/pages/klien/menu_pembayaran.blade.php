@extends('layouts.klien.sidebar')

@section('content')

<!-- Modal Unggah -->
@foreach ($order_pembayaran as $p)
<div class="modal fade" id="unggahModal{{$p->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('menu-pembayaran.store')}}" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$p->id_order}}" hidden>

            <div class="form-group">
                <label>Pilih Bank</label>
                <select class="form-control @error('id_bank') is-invalid @enderror" 
                id="id_bank" name="id_bank">
                  <option value="">--Pilih Bank--</option>
                @foreach ($bank as $b)
                  <option value="{{$b->id_bank}}">{{$b->nama_bank}} - ({{$b->kode_bank}}) ({{$b->kode_bank_int}}) {{$b->no_rekening}} 
                  ({{$b->nama_rekening}}) 
                  <br>
                  || {{$b->lokasi_cabang}}</option>
                @endforeach
                </select>
                @error ('id_bank')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            @if(!empty($p->parameter_layanan->harga)) 
            <input type="text" name="harga_layanan" value="{{$p->parameter_layanan->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_jenis_teks->harga)) 
            <input type="text" name="harga_jenis_teks" value="{{$p->parameter_jenis_teks->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_teks->harga)) 
            <input type="text" name="harga_teks" value="{{$p->parameter_teks->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_dokumen->harga)) 
            <input type="text" name="harga_dokumen" value="{{$p->parameter_dokumen->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_subtitle->harga)) 
            <input type="text" name="harga_subtitle" value="{{$p->parameter_subtitle->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_dubbing->harga)) 
            <input type="text" name="harga_dubbing" value="{{$p->parameter_dubbing->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_dubber->harga)) 
            <input type="text" name="harga_dubber" value="{{$p->parameter_dubber->harga}}" hidden>
            @endif
            @if(!empty($p->parameter_order->p_harga)) 
            <input type="text" name="harga_menu_lisan" value="{{$p->parameter_order->p_harga}}" hidden>
            @endif
 
            <input type="text" name="nominal_transaksi" value="{{$p->p_harga}}" hidden>
            <input type="text" name="nominal_transaksi_total" value="{{$p->order->harga}}" hidden>

            <div class="form-group">
              <label for="profile_photo_path">Bukti Transaksi</label>
                <input type="file" name="bukti_transaksi" class="form-control">
                <p style="color:red;"><i>Format file yang diunggah harus dalam format JPG, JPEG, PNG dengan ukuran max 2 MB</i></p>
            </div> 
            

        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Unggah</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endforeach
    
<div class="container">

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
    
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#belum_bayar" data-toggle="tab">Belum Bayar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#riwayat" data-toggle="tab">Riwayat Pembayaran</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="belum_bayar">
                  @foreach ($order_pembayaran as $bayar)
                    <div class="card">
                      <div class="card-header">
                      <div class="float-right">
                      <p style="color:red;"><i>*Tagihan akan hilang jika dalam 24 jam tidak ada pembayaran</i></p>
                    </div>
                        <h5 class="card-title m-0">Order #{{$bayar->id_order}}</h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text text-muted">Tanggal Order : {{$bayar->tgl_order}}</p>
                        @if(!empty($bayar->jenis_layanan))
                        <p class="card-text text-muted">Jenis Layanan : {{$bayar->jenis_layanan}}</p>
                        @elseif(!empty($bayar->p_jenis_layanan))
                        <p class="card-text text-muted">Jenis Layanan : {{$bayar->p_jenis_layanan}}</p>
                        @endif
                        @if(!empty($bayar->p_harga))
                        <p class="card-text text-muted">Total Harga : {{$bayar->p_harga}}</p>
                        @elseif(!empty($bayar->order->harga))
                        <p class="card-text text-muted">Total Harga : {{$bayar->order->harga}}</p>
                        @endif

                        <div class="float-right">
                          <a href="{{route('detail-order', $bayar->id_order)}}" class="btn btn-sm btn-primary">Detail Order</i></a>
                          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#unggahModal{{$bayar->id_order}}">Unggah Bukti Transaksi</button>
                        </div>

                      </div>
                    </div>
                  @endforeach
                    
                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="riwayat">

                  @foreach ($riwayat as $trans)
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title m-0">Order #{{$trans->id_order}}</h5>
                      </div>
                      <div class="card-body">
                        <p class="card-text text-muted">Telah dibayar pada {{$trans->tgl_transaksi}}</p>
                        <p class="card-text text-muted">Total Order : Rp{{$trans->nominal_transaksi}}</p>
                        <p class="card-text text-muted">Status Transaksi : <b>{{$trans->status_transaksi}}</b></p>

                        <div class="float-right">
                          <!-- <a href="{{route('detail-order', $trans->id_transaksi)}}" class="btn btn-sm btn-primary">Detail Order</i></a> -->
                            <a href="{{route('pdf.download', $trans->id_transaksi)}}"  class="btn btn-sm btn-default">Cetak Transaksi <i class="fas fa-print"></i></a>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <!-- <table class="table projects">
                      <thead>
                          <tr>
                              
                              <th style="width: 20%">
                                  Tanggal Transaksi
                              </th>
                              <th style="width: 20%">
                                  Nominal Transaksi
                              </th>
                              <th>
                                  Bukti Transaksi
                              </th>
                              <th>
                                  Status Transaksi
                              </th>
                              <th>
                                  Cetak Transaksi
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($riwayat as $trans)
                        <tr>
                          
                          <td>{{$trans->tgl_transaksi}}</td>
                          <td>{{$trans->nominal_transaksi}}</td>
                          <td><a href="{{route('bukti.download', $trans->id_transaksi)}}">{{$trans->bukti_transaksi}}</a></td>
                          <td>{{$trans->status_transaksi}}</td>
                          <td class="text-center">
                          <a href="{{route('pdf.download', $trans->id_transaksi)}}"><i class="fas fa-print"></i></a>
                          </td>

                        </tr>
                      @endforeach
                      </tbody>
                  </table> -->
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
               
</div>

@endsection



