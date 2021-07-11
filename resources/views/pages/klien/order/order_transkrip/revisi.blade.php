@extends('layouts.klien.sidebar')
@section('title','Revisi')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="container ">
        {{-- status --}}
            <div class="card">
                <div class="card-header p-2 bg-blue">
                    <h4> <i class="fab fa-shopify"></i> Form Revisi Transkrip Audio</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <form action="/order-transkrip/revisi" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach($revisi as $s)
                            <div class="form-group row">
                                
                                <input type="text" name="id_order" value="{{$s->id_order}}" hidden>
                                <label for="nama" class="col-sm-2 col-form-label">Pesan Revisi</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control @error('pesan_revisi') is-invalid @enderror" name="pesan_revisi" id="pesan_revisi" placeholder="Tuliskan Pesan Bagian Yang Harus Direvisi">
                                @error('pesan_revisi')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                                <div class="col-sm-10">
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
                            <div class="col-sm-2 ml-auto">
                                <button class="btn bg-red float-right" type="submit">Ajukan Revisi&nbsp;<i class="fab fa-shopify"></i></button>
                            </div>
                            @endforeach
                            @foreach($revisi1 as $r1)
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Status Revisi</label>
                                <div class="col-sm-10">
                                <span class="badge badge-danger">Revisi Sedang Diajukan</span></span>
                                </div>
                            </div>
                            @endforeach
                            @foreach($revisi2 as $r2)
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Status Revisi</label>
                                <div class="col-sm-10">
                                <span class="badge badge-success"> Revisi Selesai</span><br>
                                <a href="/order-transkrip/revisi-download/{{revisi2->id_revisi}" class="btn btn-success btn-sm" ><i class="fas fa-download"></i> Download Hasil Revisi </a>
                                </div>
                            </div>
                            @endforeach
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
