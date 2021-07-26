@extends('layouts.klien.sidebar_show')
@section('content')


<div class="container-fluid">
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
                    <i class="fab fa-shopify"></i>  Detail Order Menu Transkrip
                    </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                    <br><br>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
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
                                <th>Jenis Layanan</th>
                                <th>Durasi Pengerjaan</th>
                                <th>Nama Dokumen</th>
                                <th>Durasi Audio</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->parameter_order->p_jenis_layanan}}</td>
                                <td>{{$order->durasi_pengerjaan}} Hari</td>
                                <td>{{$order->nama_dokumen}}</td>
                                <td>{{(($order->durasi_audio/60)%60)}} Menit</td>
                                <td>
                                    <form action="" method="POST" class="d-inline">
                                        @method('Delete')
                                        @csrf
                                        <button class="btn btn-sm bg-red" data-toggle="modal" data-target="#delete2"  type="button"><i class="fas fa-trash-alt"></i></button>
                                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{$order->id_order}}" ><i class="fas fa-pencil-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-7">
                        <p class="lead">Payment Methods:</p>
                        <i class="fab fa-cc-visa" alt="Visa"></i>
                        <i class="fab fa-cc-mastercard" alt="Mastercard"></i>
                        <i class="fab fa-cc-amex" alt="American Express"></i>
                        <i class="fab fa-cc-paypal" alt="Paypal"></i>

                        <div style="text-align:justify;">
                        <p class="text-muted well well-sm shadow-none" class="text-align" style="margin-top: 10px;">
                        Setelah melakukan pemesanan, selanjutnya silahkan melakukan pembayaran dengan cara
                        transfer ke salah satu dari rekening bank yang tersedia. Kemudian upload bukti transfer anda. Kami menganjurkan agar anda 
                        juga tetap menyimpan bukti transfer anda, sebagai bukti jika terjadi perselisihan. Tim Sikombasa akan memastikan bahwa bukti 
                        transfer yang anda upload valid dan dana yang anda kirimkan berhasil terkirim.
                        </p></div>`
                    </div>
                    <!-- /.col -->
                    <div class="col-5 p-4"><br>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Total Biaya :</th>
                                    <td> Rp. {{$order->parameter_order->p_harga}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                    <a href="{{ url ('/menu-pembayaran') }}" class="btn bg-green mx-1 btn-icon" type="submit" class="text-right" style="float: right;"><i class="fas fa-money-check-alt"></i>&nbsp;Submit Payment</a>
                    </div>
                </div>
            </div>


            <!-- Modal Delete -->
            <div class="modal modal-danger" id="delete2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title">Apakah Anda Yakin Ingin Menghapus Order Ini ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline pull-left">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- menampilkan error validasi --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

           <!-- Modal Edit -->
           <div class="modal fade" id="exampleModal{{$order->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"  role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                <form action="{{route('update_order_transkrip', $order->id_order)}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="idorder" value="{{$order->id_order}}" hidden></td>
                
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_layanan">Update Jenis Layanan</label>
                                    <input type="text" class="form-control" value="{{$order->jenis_layanan}}" readonly>
                                </div>
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-cyan">
                                    <div id="jenis_layanan"></div>
                                        <div class="form-check">
                                        &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Basic">
                                        <label class="form-check-label" for="jenis_layanan"><b>Basic</b></label>
                                        <i class="nav-icon fas fa-medal"></i>
                                        <i class="nav-icon fas fa-medal"></i>
                                        <i class="nav-icon fas fa-medal"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-danger">
                                        <div id="jenis_layanan"></div>
                                        <div class="form-check">
                                        &nbsp;<input class="form-check-input" type="radio" name="jenis_layanan" id="jenis_layanan" value="Premium ">
                                        <label class="form-check-label" for="jenis_layanan"><b>Premium</b></label>
                                        <i class="nav-icon fas fa-crown"></i>
                                        <i class="nav-item fas fa-crown"></i>
                                        <i class="nav-item fas fa-crown"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control @error('durasi_pengerjaan') is-invalid @enderror" 
                                        id="durasi_pengerjaan" placeholder="Durasi Pengerjaan" name="durasi_pengerjaan">
                                        <option value="">--Pilih Durasi Pengerjaan--</option>
                                        <option value="1">1 Hari</option>
                                        <option value="2">2 Hari</option>
                                        <option value="3">3 Hari</option>
                                    </select>
                                    @error ('durasi_pengerjaan')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"><br>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$order->nama_dokumen}}" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tuliskan Nama Audio" id="nama_dokumen" name="nama_dokumen">
                                </div>
                                <div class="form-group">
                                    <label for="path_file" class="col-form-label">Upload Audio (Size Max 30 Mb)</label>
                                    <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                    <input type="file" id="path_file" name="path_file" required="required">
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="durasi_audio" id="durasi_audio" oninput="updateInfos()">
                                    <span type="text"  id="dr_audio" name="dr_audio">
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
</section>
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
<script>
    var myAudios = [];
    console.log(myAudios);
    window.URL = window.URL || window.webkitURL;
    document.getElementById('path_file').onchange = setFileInfo;
    function setFileInfo() {
        var files = this.files;
        console.log(files);
        myAudios.push(files[0]);
        var audio = document.createElement('audio');
        console.log(audio);
        audio.preload = 'metadata';
        audio.onloadedmetadata = function() {
            window.URL.revokeObjectURL(audio.src);
            var duration = audio.duration;
            console.log(duration);
            $('#durasi_audio').val(duration);
            myAudios[myAudios.length - 1].duration = duration;
        }
        audio.src = URL.createObjectURL(files[0]);;
    }
    function updateInfos() {
       var duration = audio.duration;
        console.log(duration);
        $('#durasi_audio').val(duration);
        $("#durasi_audio").val()
        var dr_audio = document.getElementById("dr_audio");
        console.log(dr_audio);
        $('#durasi_audio').val(dr_audio);
        var durasi_audio = document.getElementById("durasi_audio");
        console.log(durasi_audio);
        dr_audio.textContent = "";
        for (var i = 0; i < myAudios.length; i++) {
            console.log(i);
            dr_audio.textContent += myAudios[i].name + " duration: " + myAudios[i].duration + '\n';
       }
    }
</script>
@endpush
