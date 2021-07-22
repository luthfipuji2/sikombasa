@extends('layouts.translator.master')

@section('title', 'Review')
@section('content')
@foreach ($order as $o)
<div class="card">
  <div class="card-header">
    <b>No. Order #{{$o->id_order}}</b>
    <br>
    {{Carbon\Carbon::parse($o->created_at)->diffForHumans()}}
  </div>
  <div class="card-body">
  <tr>
    <td>
        <b><a href="#">{{$o->name}}</a> {{$o->email}}</b>
        <br>
        @if($o->rating=='1')
        <i class="nav-icon fas fa-star"></i>
        @elseif($o->rating=='2')
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        @elseif($o->rating=='3')
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        @elseif($o->rating=='4')
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        @elseif($o->rating=='5')
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        <i class="nav-icon fas fa-star"></i>
        @endif
        <br>
        <br>
        <p class="card-text">{{$o->review_text}}</p>
    </td>
 </tr>
  </div>
</div>
@endforeach
@endsection