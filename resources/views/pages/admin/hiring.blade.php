@extends('layouts.translator.master')

@section('title', 'Hiring')
@section('content')
@foreach($translator as $t)
<div class="card">
  <div class="card-header">
    {{$t->id_translator}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$t->nama}}</h5>
    <p class="card-text">Skills: {{$t->keahlian}}</p>
    <a href="{{$t->id_translator}}" class="btn btn-primary">
      <i class="nav-icon fas fa-eye"></i> Detail
    </a>
  </div>
  <div class="card-footer text-muted">
  {{$t->created_at}}
  </div>
</div>
@endforeach

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
@endsection