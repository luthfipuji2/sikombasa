@extends('layouts.klien.sidebar')

@section('title', 'Career')
@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link disabled" href="#profile" data-toggle="tab">Data Diri</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#document" data-toggle="tab">Dokumen Persyaratan</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#certificate" data-toggle="tab">Sertifikat Keahlian</a></li>
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
                  <form action="/certificate" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="control-group after-add-more">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama Sertifikat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_sertifikat[]" id="inputName" placeholder="Nama Sertifikat">
                      </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_sertifikat[]" id="inputName" placeholder="Nomor Sertifikat">
                      </div>
                      <label for="inputName2" class="col-sm-2 col-form-label">Bukti Dokumen</label>
                        <div class="col-sm-10">
                          <input type="file" name="bukti_dokumen[]" class="form-input">
                        </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Diterbitkan Oleh</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="diterbitkan_oleh[]" id="inputName" placeholder="Diterbitkan Oleh">
                        </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Masa Berlaku</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="masa_berlaku[]" id="inputName" placeholder="Masa Berlaku">
                        </div>
                      <br>
                      <div class="col-sm-2">
                      <button class="btn btn-success add-more" type="button">
                        <i class="nav-icon fas fa-plus"></i> Add More
                      </button>
                      </div>
                      <hr>
                    </div>
                    <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </form>

                  <div class="copy invisible">
                    <div class="control-group">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama Sertifikat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_sertifikat[]" id="inputName" placeholder="Nama Sertifikat">
                      </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_sertifikat[]" id="inputName" placeholder="Nomor Sertifikat">
                      </div>
                      <label for="inputName2" class="col-sm-2 col-form-label">Bukti Dokumen</label>
                        <div class="col-sm-10">
                          <input type="file" name="bukti_dokumen[]" class="form-input">
                        </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Diterbitkan Oleh</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="diterbitkan_oleh[]" id="inputName" placeholder="Diterbitkan Oleh">
                        </div>
                      <label for="inputName" class="col-sm-2 col-form-label">Masa Berlaku</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="masa_berlaku[]" id="inputName" placeholder="Masa Berlaku">
                        </div>
                      <br>
                      <div class="col-sm-2">
                      <button class="btn btn-danger remove" type="button">
                      <i class="nav-icon fas fa-times"></i> Remove
                      </button>
                      </div>
                      <hr>
                    </div>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
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

