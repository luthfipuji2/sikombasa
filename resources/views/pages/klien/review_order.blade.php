@extends('layouts.klien.sidebar')
@section('title','Review Order')
@section('content')

<div class="container" >
    <div class="d-flex justify-content-center">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-microphone-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Transkrip (Audio)</span>
            <span class="info-box-number">
            <a href="{{ url ('order-transkrip-review') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-green elevation-1"><i class="fas fa-walking"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Bertemu Langsung</span>
            <span class="info-box-number">
            <a href="{{ url ('order-interpreter-review') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-file-video"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Dubbing</span>
            <span class="info-box-number">
            <a href="{{ url ('/review-dubbing') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <div class="d-flex justify-content-center">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-font"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Teks</span>
            <span class="info-box-number">
            <a href="{{ url ('/review-teks') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Dokumen</span>
            <span class="info-box-number">
            <a href="{{ url ('/review-dokumen') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-red elevation-1"><i class="fas fa-film"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Subtitle</span>
            <span class="info-box-number">
            <a href="{{ url ('/review-subtitle') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    
</div>
@endsection