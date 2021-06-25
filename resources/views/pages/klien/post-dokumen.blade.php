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
                  <li class="nav-item"><a class="nav-link active" href="#document" data-toggle="tab">Required Documents</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#progress" data-toggle="tab">Progress</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="disabled tab-pane" id="progress">
                    <!-- Tab Progress di sini -->
                  </div>

                  <div class="disabled tab-pane" id="profile">
                    <!-- Tab Profile di sini -->
                  </div>

                  <div class="active tab-pane" id="document">
                    <form class="form-horizontal" method="POST" action="/document-post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Curriculum Vitae</label>
                            <div class="col-sm-5">
                                  <input type="file" name="cv" value="{{$dokumen->cv}}" class="form-input @error('cv') is-invalid @enderror">
                                  <br>
                                  <br>
                                  <div>
                                    <img src="{{asset('/img/dokumen/'.$dokumen->cv)}}" height="90" width="150" alt="" srcset="">
                                  </div>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Ijazah Terakhir</label>
                            <div class="col-sm-5">
                              <input type="file" name="ijazah_terakhir" value="{{$dokumen->ijazah_terakhir}}" class="form-input @error('ijazah_terakhir') is-invalid @enderror">
                              <br>
                              <br>
                              <div>
                                <img src="{{asset('/img/dokumen/'.$dokumen->ijazah_terakhir)}}" height="90" width="150" alt="" srcset="">
                             </div>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Portofolio</label>
                            <div class="col-sm-5">
                              <input type="file" name="portofolio" value="{{$dokumen->portofolio}}" class="form-input @error('portofolio') is-invalid @enderror">
                              <br>
                              <br>
                              <div>
                                <img src="{{asset('/img/dokumen/'.$dokumen->portofolio)}}" height="90" width="150" alt="" srcset="">
                              </div>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Surat Keterangan Sehat</label>
                            <div class="col-sm-5">
                              <input type="file" name="sk_sehat" value="{{$dokumen->sk_sehat}}" class="form-input @error('sk_sehat') is-invalid @enderror">
                              <br>
                              <br>
                              <div>
                                <img src="{{asset('/img/dokumen/'.$dokumen->sk_sehat)}}" height="90" width="150" alt="" srcset="">
                              </div>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Surat Keterangan Berkelakuan Baik</label>
                            <div class="col-sm-5">
                              <input type="file" name="skck" value="{{$dokumen->skck}}" class="form-input @error('skck') is-invalid @enderror">
                              <br>
                              <br>
                              <div>
                                <img src="{{asset('/img/dokumen/'.$dokumen->skck)}}" height="90" width="150" alt="" srcset="">
                             </div>
                            </div>
                      </div>
                      <div class="form-group row">
                          <div class=" col-sm-10">
                            <button type="submit" class="btn btn-success">Update</button>
                          </div>
                      </div>
                    </form>
                  </div>

                  <div class="disabled tab-pane" id="certificate">
                  <!-- Tab Certificate di sini -->
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
@endpush

