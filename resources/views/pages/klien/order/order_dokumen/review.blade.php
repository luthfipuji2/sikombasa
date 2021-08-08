@extends('layouts.klien.sidebar_show')
@section('title','Review Order Dokumen')
@section('content')

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/rating-bintang.css') }}">

 <!-- Modal Tambah -->
@foreach($review as $rev)
<div class="modal fade" id="tambahModal{{$rev->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('tambah_review_dokumen', $rev->id_order)}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
        <div class="modal-body">
            <input type="text" name="id_order" value="{{$rev->id_order}}" hidden>

            <div class="form-group">
        <div class="form-group">
        <label for="review_text">Rating</label>
        <input type="number" class="form-control @error('rating') is-invalid @enderror" placeholder="Nilai Range (1-5)" id="rating" name="rating" required></input>
                @error('rating')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
        </div>
        </div>

            <div class="form-group">
        <div class="form-group">
        <label for="review_text">Komentar</label>
        <textarea type="text" class="form-control @error('review_text') is-invalid @enderror" id="review_text"  placeholder="Tulis Komentar Anda Disini" rows="5" name="review_text" required></textarea>
                @error('review_text')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
        </div>
        </div>

            <!-- <label for="rating">Rating</label> -->
            <!-- <br><br><br><br><br><br><br><br><br> -->
            <div class="form-group">
            <br><br><br>
              <!-- <div class="rating">
                <input type="radio" name="rating" value="5" id="star1"><label for="star1"></label>
                <input type="radio" name="rating" value="4" id="star2"><label for="star2"></label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3"></label>
                <input type="radio" name="rating" value="2" id="star4"><label for="star4"></label>
                <input type="radio" name="rating" value="1" id="star5"><label for="star5"></label>
            </div> -->
            </div> 
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endforeach
<!-- Selesai Modal Tambah -->

<div class="container">
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#review" data-toggle="tab">Review</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="review">
                  @if(empty($rev->review->id_review) && empty($rev->review->id_order) || !empty($rev->review->id_review))
                    @foreach($review as $rev)
                    <div class="card">
                      <div class="card-header">
                        <p class="font-weight-bold text-muted">No. Order {{$rev->created_at->format('Y-m-d')}} - {{$rev->id_order}}</p>
                      
                      
                      @if(!empty($rev->review->rating))
                      <div class="float-right">
                            @if($rev->review->rating == '1')
                            <i class="nav-icon fas fa-star text-yellow"></i>
                                @elseif($rev->review->rating == '2')
                                <i class="nav-icon fas fa-star text-yellow"></i>
                                <i class="nav-icon fas fa-star text-yellow"></i>
                                    @elseif($rev->review->rating == '3')
                                    <i class="nav-icon fas fa-star text-yellow"></i>
                                    <i class="nav-icon fas fa-star text-yellow"></i>
                                    <i class="nav-icon fas fa-star text-yellow"></i>
                                        @elseif($rev->review->rating == '4')
                                        <i class="nav-icon fas fa-star text-yellow"></i>
                                        <i class="nav-icon fas fa-star text-yellow"></i>
                                        <i class="nav-icon fas fa-star text-yellow"></i>
                                        <i class="nav-icon fas fa-star text-yellow"></i>
                                            @elseif($rev->review->rating == '5')
                                            <i class="nav-icon fas fa-star text-yellow"></i>
                                            <i class="nav-icon fas fa-star text-yellow"></i>
                                            <i class="nav-icon fas fa-star text-yellow"></i>
                                            <i class="nav-icon fas fa-star text-yellow"></i>
                                            <i class="nav-icon fas fa-star text-yellow"></i>
                            @endif
                        </div>
                        @else
                        @endif
                      </div>

                      <div class="card-body">
                        <table width="250px">
                        <tr>
                            <td><p class="font-weight-bold">Jenis Layanan</p><td>
                            <td><p class="font-weight"> {{$rev->parameterjenislayanan->p_jenis_layanan}} </p></td>
                        </tr>
                        <tr>
                            <td><p class="font-weight-bold">Nama Translator</p><td>
                            <td><p class="font-weight"> @if(!empty($rev->id_translator == NULL) || !empty($rev->id_translator))
                                                        {{$rev->translator->nama}}
                                                        @endif
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="font-weight-bold">Status Order</p><td>
                            <td><p class="font-weight">{{$rev->status_at}}</p></td>
                        </tr>
                        <tr>@if(!empty($rev->review->review_text))
                            <td><p class="font-weight-bold">Review Text</p><td>
                            <td><p class="font-weight"> {{$rev->review->review_text}} </p></td>
                            @else
                            @endif
                        </tr>

                        </table>
                        @if(empty($rev->review->id_review))
                        <div class="float-right">
                          <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#tambahModal{{$rev->id_order}}">Beri Review</button>
                        </div>
                        @else
                        @endif
                      </div>
                    </div>
                    @endforeach
                    @else
                    @endif
                  </div>

                  <td>
                    <a href="review-order" type="button" class="btn btn-outline-primary">Kembali</a>
                  </td> 
              @endsection
              