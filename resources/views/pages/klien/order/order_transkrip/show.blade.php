@extends('layouts.klien.sidebar')

@section('title', 'Show Order Transkrip')
@section('content')


<div class="container-fluid">
        <div class="row">
        <div class="container ">
        {{-- status --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Order Menu</a></li>
                <li class="nav-item"><a class="nav-link active" href="#certificate" data-toggle="tab">View Order</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#progress" data-toggle="tab">Transaksi</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                <div class="disabled tab-pane" id="progress">
                    <!-- Tab Activity di sini -->
                </div>

                <div class="disabled tab-pane" id="profile">
                    <!-- Tab Profile di sini -->
                </div>

                <div class="disabled tab-pane" id="document">
                <!-- Tab Document di sini -->
                </div>

                <div class="active tab-pane" id="certificate">
                    <form action="  " method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <tbody  id="tipesatu" style="visibility: visible;">
                            <div>
                            <form action="/order-transkrip" method="POST" class="d-inline">
                                @method('Delete')
                                @csrf
                                <button class="btn btn-danger mx-1 btn-icon" type="submit" onclick="return confirm('Are you sure ?')" class="text-right" style="float: right;"><i class="fas fa-trash-alt"></i>  Batalkan Order</button>
                                <button type="button" class="btn btn-primary mx-1 btn-icon" data-toggle="modal" data-target="#exampleModal{{$order->id_order}}" class="text-right" style="float: right;"><i class="fas fa-pencil-alt"></i>    Update Order</button>
                                <br>
                                <br>
                                </form>
                                </td>
                            </tr>
                            </div>
                            <br>
                                <tr>
                                    <td>Jenis Layanan</td>
                                    <td>{{$order->jenis_layanan}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Transkrip</td>
                                    <td>{{$order->tipe_transkrip}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Audio</td>
                                    <td>{{$order->durasi_audio}}</td>
                                </tr>
                                <tr>
                                    <td>Durasi Pengerjaan</td>
                                    <td>{{$order->durasi_pengerjaan}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Audio</td>
                                    <td>{{$order->nama_dokumen}}</td>
                                </tr>
                                <!-- <tr>
                                    <td>Dokumen</td>
                                    <td>{{$order->path_file}}</td>
                                </tr> -->
                                <tr>
                                    <td>Durasi Pertemuan</td>
                                    <td>{{$order->durasi_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pertemuan</td>
                                    <td>{{$order->tanggal_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Pertemuan</td>
                                    <td>{{$order->waktu_pertemuan}}</td>
                                </tr>
                                <tr>
                                    <td>Catatan Lokasi</td>
                                    <td>{{$order->lokasi}}</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>{{$order->longitude}}</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>{{$order->latitude}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-success mx-1 btn-icon" type="submit" onclick="return confirm('Are you sure ?')" class="text-right" style="float: right;"><i class="fas fa-sign-in-alt"></i>   Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
            <br>
                </div>
                
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModal{{$order->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <div class="modal-body">
        <form action="{{route('update_order_transkrip', $order->id_order)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="idLampiran" value="{{$order->id_order}}" hidden></td>
            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" class="form-control" placeholder="Masukkan nama lampiran" name="jenis_layanan" id="jenis_layanan" value="{{$order->jenis_layanan}}" readonly>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="radio" id="jenis_layanan" name="jenis_layanan" value="basic">
            <label class="form-check-label" for="jenis_layanan">
                Basic
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" id="jenis_layanan"  name="jenis_layanan" value="premium">
            <label class="form-check-label" for="jenis_layanan">
                Premium
            </label>
            </div>
            <br>

            <div class="form-group">
                <label for="tipe_transkrip">Tipe Transkrip</label>
                <input type="text" class="form-control" name="tipe_transkrip" id="tipe_transkrip" value="{{$order->tipe_transkrip}}" readonly>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" id="tipe_transkrip" name="tipe_transkrip" value="1">
            <label class="form-check-label" for="tipe_transkrip">
                Upload Audio
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" id="tipe_transkrip"  name="tipe_transkrip" value="2">
            <label class="form-check-label" for="tipe_transkrip">
                Bertemu Langsung
            </label>
            </div>
            <br>
            <div class="form-group">
                <label for="durasi_pertemuan">Durasi Pertemuan</label>
                <select class="form-control @error('durasi_pertemuan') is-invalid @enderror" name="durasi_pertemuan" id="durasi_pertemuan" value="{{$order->durasi_pertemuan}}">
                    <option value="">Select Durasi Pengerjaan</option>
                    <option value="<=1 Day"><=1 Day</option>
                    <option value="1-3 Day">1-3 Day</option>
                    <option value="3-5 Day">3-5 Day</option>
                </select>
            </div>
                <div class="form-group">
                        <label for="lokasi" class="col-form-label">Catatan Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$order->lokasi}}">
                </div>
                <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude" value="{{$order->longitude}}" >
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude" value="{{$order->latitude}}" >
            </div>
                <div class="form-group">
                            <label for="lokasi" class="col-form-label">Durasi Pengerjaan</label>
                            <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" name="durasi_pengerjaan" id="durasi_pengerjaan" value="{{$order->durasi_pengerjaan}}">
                                <option value="">Select Durasi Pengerjaan</option>
								<option value="1">1 Day</option>
                                <option value="2">2 Day</option>
                                <option value="3">3 Day</option>
                                <option value="4">4 Day</option>
                            </select>
                            @error ('durasi_pengerjaan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                      </div>
        {{ csrf_field() }}
                    <div class="form-group" >
                        <label for="lokasi" class="col-form-label">Nama Audio</label>
                        <input type="text" placeholder="Tuliskan Nama Audio"class="form-control" value="{{$order->nama_dokumen}}" id="nama_dokumen" name="nama_dokumen">
                    </div>
                    <div class="form-group">
                            <label for="lokasi" class="col-form-label">Nama Audio</label>
                            <select class="form-control @error('durasi_audio') is-invalid @enderror" 
                            id="durasi_audio" name="durasi_audio" value="{{$order->durasi_audio}}" >
                                <option value="">Select Durasi Audio</option>
								<option value="<=1 Jam"><=1 Jam</option>
                                <option value="1-3 Jam">1-3 Jam</option>
                                <option value="3-5 Jam">3-5 Jam</option>
                            </select>
                            @error ('durasi_pengerjaan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                      </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>

    </form>
    
    </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kriteria-table').DataTable();
        } );
    </script>
@endpush

@push('scripts')
<script >		
    // membuat function kontrol tipe transkrip
    function showtipetranskrip(){
        var selectBox=document.getElementById('tipe_transkrip');
        var userInput=selectBox.options[selectBox.selectedIndex].value;
        if(userInput=='1'){

            document.getElementById("tipesatu").style.visibility='visible';
        }else{
         
            document.getElementById("tipedua").style.visibility='hidden';
        }
        return false;
    }
    
</script>
@endpush