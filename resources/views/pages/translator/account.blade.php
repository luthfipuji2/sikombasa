@extends('layouts.translator.master')

@section('title', 'Pengaturan Akun')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
          </div>
          <!-- /.col -->
          <div class="col-md-12 mt-3">

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Pengaturan Akun</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Aktivitas</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="account">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white"
                            style="background-image:url('./img/bg-bg.jpg')">
                            <h3 class="widget-user-username text-right">{{$user->name}}</h3>
                            <h5 class="widget-user-desc text-right">{{$user->role}}</h5>
                        </div>
                        @if (empty($user->profile_photo_path))
                        <div class="widget-user-image">
                            <img src="./img/profile.png" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                        </div>
                        @else
                        <div class="widget-user-image">
                            <img src="{{asset('images/'.$user->profile_photo_path)}}" class="img-circle profile-user-img img-fluid img-responsive" alt="User Avatar">
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="/account-translator/{{$user->id}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <form role="form">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                                @error ('name')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"class="form-control @error('email') is-invalid @enderror" 
                                id="email" placeholder="Enter Email" name="email" value="{{ $user->email }}">
                                @error ('email')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" placeholder="Password (kosongkan jika tidak ingin mengganti password Anda)" name="password" >
                                @error ('password')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>  

                            <div class="form-group">
                                <label for="profile_photo_path">Photo Profile</label>
                                <input type="file" id="profile_photo_path"  name="profile_photo_path" class="form-control">
                            </div> 

                            <div class="float-right">
                                <div class="form-group row" >
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                  </div>

                  <div class="tab-pane" id="activity">
                    <div class="container-fluid">
                      @foreach($order as $o)
                          <!-- Timelime example  -->
                          <div class="row">
                            <div class="col-md-12">
                              <!-- The time line -->
                              <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                  <span class="bg-red">{{$o->created_at}}</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-envelope bg-blue"></i>
                                  <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="#">{{$o->name}}</a> {{$o->email}}</h3>
                                    <div class="timeline-body">
                                      <table width="100px">
                                      <tr>
                                        <td><p class="font-weight-bold text-left">Menu</p><td> 
                                        <td><p class="text-left">{{$o->menu}}</p></td>
                                      </tr>
                                      <tr>
                                        <td><p class="font-weight-bold text-left">Harga</p><td> 
                                        <td><p class="text-left">10000</p></td>
                                      </tr>
                                      </table>
                                      @if(!empty($o->id_translator) && empty($o->path_file_trans) && empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->text_trans) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->text_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->path_file_trans) && !empty($o->pesan_revisi) && empty($o->text_revisi) && empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->text_revisi) && !empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && !empty($o->pesan_revisi) && !empty($o->path_file_revisi) && !empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @elseif(!empty($o->id_translator) && empty($o->pesan_revisi) && empty($o->text_revisi) && empty($path_file_revisi) && !empty($o->bukti_fee_trans))
                                      <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      @endif
                                    </div>
                                    <div class="timeline-footer">
                                      <a class="btn btn-primary btn-sm">Read more</a>
                                      <a class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <!-- END timeline item -->
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                      @endforeach
                      </div>
                      <!-- /.timeline -->
                    </div>
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
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
  var table = $('#datatable').DataTable();
  //Edit Record
  table.on('click', '.edit', function(){
    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')){
      $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    console.log(data);

    $('#nama_sertifikat').val(data[1]);
    $('#no_sertifikat').val(data[2]);
    $('#bukti_dokumen').html(data[3]);
    $('#diterbitkan_oleh').val(data[4]);
    $('#masa_berlaku').val(data[5]);

    $('#editForm').attr('action', '/certificate-update/'+data[0]);
    $('#updateCertificate').modal('show');
  })
})
</script>
<script>
    $(function(){
        var url = document.location.toString();
        if (url.match('#')) {
            console.log(url.split('#')[1]);
            $('a[href="#'+url.split('#')[1]+'"]').parent().addClass('active');
            $('#'+url.split('#')[1]).addClass('active in')
        }
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        });
    });
</script>
@endpush