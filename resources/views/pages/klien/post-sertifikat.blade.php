@extends('layouts.klien.sidebar')

@section('title', 'Career')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link disabled" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#document" data-toggle="tab">Required Documents</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#progress" data-toggle="tab">Progress</a></li>
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
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createCertificate">
                        <i class="nav-icon fas fa-folder-plus"></i> Add More Certificates
                    </button>
                    </br>
                    </br>

                    <!-- Modal -->
                    <div class="modal fade" id="createCertificate" tabindex="-1" aria-labelledby="createCertificateLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="createCertificateLabel">Tambah Sertifikat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="/certificate-post-create" method="POST" enctype="multipart/form-data">
                            @csrf
                              <label for="nama_sertifikat" class="col-sm-5 col-form-label">Nama Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat1" placeholder="Nama Sertifikat">
                                </div>
                                <label for="no_sertifikat1" class="col-sm-5 col-form-label">Nomor Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat1" placeholder="Nomor Sertifikat">
                                </div>
                                <label for="bukti_dokumen1" class="col-sm-5 col-form-label">Bukti Dokumen</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="bukti_dokumen" class="form-input">
                                  </div>
                                <label for="diterbitkan_oleh1" class="col-sm-5 col-form-label">Diterbitkan Oleh</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh1" placeholder="Diterbitkan Oleh">
                                  </div>
                                <label for="masa_berlaku1" class="col-sm-5 col-form-label">Masa Berlaku</label>
                                  <div class="col-sm-10">
                                    <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku1" placeholder="Masa Berlaku">
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table id="datatable" class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Sertifikat</th>
                          <th scope="col">Nomor Sertifikat</th>
                          <th scope="col">Bukti Dokumen</th>
                          <th scope="col">Diterbitkan Oleh</th>
                          <th scope="col">Masa Berlaku</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($certificate as $sertif)
                          <tr>
                            <td>{{$sertif->id_keahlian}}</td>
                            <td>{{$sertif->nama_sertifikat}}</td>
                            <td>{{$sertif->no_sertifikat}}</td>
                            <td>
                                <div class="col-sm-10">
                                  <img src="{{asset('/img/sertifikat/'.$sertif->bukti_dokumen)}}" height="90" width="150" alt="" srcset="">
                                </div>
                            </td>
                            <td>{{$sertif->diterbitkan_oleh}}</td>
                            <td>{{$sertif->masa_berlaku}}</td>
                            <td>
                              <a href="/certificate-post/{{$sertif->id_keahlian}}" class="btn btn-danger" >
                              <i class="nav-icon fas fa-trash-alt"></i>
                              </a>

                              <button class="btn btn-primary edit" type="button" data-toggle="modal" data-target="#updateCertificate-{{$sertif->id_keahlian}}">
                              <i class="nav-icon fas fa-edit"></i>
                              </button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <!-- Modal -->
                    @foreach($certificate as $sertif)
                    <div class="modal fade" id="updateCertificate-{{$sertif->id_keahlian}}" tabindex="-1" aria-labelledby="updateCertificateLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateCertificateLabel">Edit Data Sertifikat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ url('/certificate-post-update/'.$sertif->id_keahlian) }}" method="POST" enctype="multipart/form-data" id="editForm">
                            @csrf
                              <label for="nama_sertifikat" class="col-sm-5 col-form-label">Nama Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat" placeholder="Nama Sertifikat" value="{{$sertif->nama_sertifikat}}">
                                </div>
                                <label for="no_sertifikat" class="col-sm-5 col-form-label">Nomor Sertifikat</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" placeholder="Nomor Sertifikat" value="{{$sertif->no_sertifikat}}">
                                </div>
                                <label for="bukti_dokumen" class="col-sm-5 col-form-label">Bukti Dokumen</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="bukti_dokumen" id="bukti_dokumen" class="form-input" value="{{$sertif->bukti_dokumen}}">
                                  </div>
                                <label for="diterbitkan_oleh" class="col-sm-5 col-form-label">Diterbitkan Oleh</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="diterbitkan_oleh" id="diterbitkan_oleh" placeholder="Diterbitkan Oleh" value="{{$sertif->diterbitkan_oleh}}">
                                  </div>
                                <label for="masa_berlaku" class="col-sm-5 col-form-label">Masa Berlaku</label>
                                  <div class="col-sm-10">
                                    <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Masa Berlaku" value="{{$sertif->masa_berlaku}}">
                                  </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> 
                    @endforeach
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              <div class="form-group row">
                <div class=" col-sm-10">
                    <a href="/progress" class="btn btn-primary">
                     Continue
                    </a>
                </div>
              </div>
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

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
// $('.addMore').on('click', function(){
//   addMore();
// });
// function addMore(){
//   var html = $('.copy').html();
//   $('.body').append(html);
//   // alert('test');
// };
// $('body').on('click', '.remove', function(){
// $(this).parents('.form-horizontal').remove();
// });
</script>
@endpush
@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
  var table = $('#datatable').DataTable();
})
</script>
@endpush

