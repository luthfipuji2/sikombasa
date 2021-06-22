@extends('layouts.klien.sidebar')

@section('title', 'Career')
@section('content')
<!DOCTYPE html>
<html lang="en">
  <body>
  <head>
  </head>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link disabled" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#document" data-toggle="tab">Required Documents</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#certificate" data-toggle="tab">Skills Certificate</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#progress" data-toggle="tab">Progress</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="progress">
                    <section class="features">
                    <div class="container">
                      @if(empty($seleksi->hasil))
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                      </div>
                      <br>
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-3">
                          <img src="./img/features-1.svg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4">
                          <h3>Terimakasih telah mengisi formulir, {{$translator->nama}}!</h3>
                          <p class="font-italic">
                          Data Anda akan segera kami proses. Pengisian formulir dilakukan pada {{$translator->updated_at}}
                          </p>
                        </div>
                      </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='')
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                      </div>
                      <br>
                      <div class="row" data-aos="fade-up">
                        <div class="col-md-3">
                          <img src="./img/Office workers organizing data storage.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4">
                          <h3>Selamat, {{$translator->nama}}!</h3>
                          <p class="font-italic">
                            Anda dinyatakan lulus tahap pertama (Seleksi Administrasi) menjadi translator SIKOMBASA. Untuk selanjutnya Anda dapat melakukan sesi wawancara bersama kami. Terimakasih! 
                          </p>
                        </div>
                      </div>
                      @elseif($seleksi->hasil=='tidak lolos' && $seleksi->hasil_wawancara=='')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/no-document.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Sayang sekali, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                              Anda dinyatakan tidak lulus tahap pertama (Seleksi Administrasi) menjadi translator SIKOMBASA. Semoga pada kesempatan berikutnya Anda dapat bergabung bersama kami. Terimakasih!
                            </p>
                          </div>
                        </div>
                        <br>
                        <div class="form-group row">
                          <a href="/post-apply" class="btn btn-primary">
                            Coba lagi
                          </a>
                        </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='tidak lolos')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/3024051.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Sayang sekali, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                              Anda dinyatakan tidak lulus tahap terakhir (Seleksi Wawancara) menjadi translator SIKOMBASA. Semoga pada kesempatan berikutnya Anda dapat bergabung bersama kami. Terimakasih!
                            </p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <a href="/post-apply" class="btn btn-primary">
                            Coba lagi
                          </a>
                        </div>
                      @elseif($seleksi->hasil=='lolos' && $seleksi->hasil_wawancara=='lolos')
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                        </div>
                        <br>
                        <div class="row" data-aos="fade-up">
                          <div class="col-md-3">
                            <img src="./img/7482.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-md-7 pt-4">
                            <h3>Selamat, {{$translator->nama}}!</h3>
                            <p class="font-italic">
                            Anda dinyatakan lulus tahap terakhir (Seleksi Wawancara) menjadi translator SIKOMBASA. Semoga sukses untuk posisi barunya. Sekali lagi selamat dan terimakasih!
                            </p>
                          </div>
                        </div>
                        <br>
                      @endif
                      <br>
                      <!-- <div class="col-md-4">
                        <img src="./img/features-1.svg" class="img-fluid" alt="" style="display:block; margin:auto;">
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>

                  <div class="disabled tab-pane" id="profile">
                    <!-- Tab Profile di sini -->
                  </div>

                  <div class="disabled tab-pane" id="document">
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
  </body>
</html>
@endsection

@push('scripts')
@endpush

