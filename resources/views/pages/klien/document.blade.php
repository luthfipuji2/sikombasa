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
                    <form class="form-horizontal" method="POST" action="/document" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Curriculum Vitae</label>
                            <div class="col-sm-5">
                                  <input type="file" name="cv" value="{{ old('cv') }}" class="form-input @error('cv') is-invalid @enderror">
                                  @error('cv')
                                  <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Ijazah Terakhir</label>
                            <div class="col-sm-5">
                              <input type="file" name="ijazah_terakhir" value="{{ old('ijazah_terakhir') }}" class="form-input @error('ijazah_terakhir') is-invalid @enderror">
                              @error('ijazah_terakhir')
                              <div id="validationServer03Feedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Portofolio</label>
                            <div class="col-sm-5">
                              <input type="file" name="portofolio" value="{{ old('portofolio') }}" class="form-input @error('portofolio') is-invalid @enderror">
                              @error('portofolio')
                              <div id="validationServer03Feedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Surat Keterangan Sehat</label>
                            <div class="col-sm-5">
                              <input type="file" name="sk_sehat" value="{{ old('sk_sehat') }}" class="form-input @error('sk_sehat') is-invalid @enderror">
                              @error('sk_sehat')
                              <div id="validationServer03Feedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Surat Keterangan Berkelakuan Baik</label>
                            <div class="col-sm-5">
                              <input type="file" name="skck" value="{{ old('skck') }}" class="form-input @error('skck') is-invalid @enderror">
                              @error('skck')
                              <div id="validationServer03Feedback" class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                      </div>
                      <div class="form-group row">
                          <div class=" col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
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

