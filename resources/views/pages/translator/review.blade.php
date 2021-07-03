@extends('layouts.translator.master')

@section('title', 'Review')
@section('content')
@foreach ($order as $o)
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
  <tr>
    <td>
        <h5 class="card-title">{{$o->name}}</h5>
        <p class="card-text">{{$o->review_text}}</p>
        <p class="card-text"></p>
    </td>
 </tr>
  </div>
</div>
@endforeach
@endsection