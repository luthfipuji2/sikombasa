@extends('layouts/admin/template')

@section('title', 'Hiring')
@section('container')
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <table id="datatable" class="table">
              <thead>
                <tr>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Pelamar</th>
                  <th scope="col">Nilai Seleksi Berkas</th>
                  <th scope="col">Nilai Wawancara</th>
                  <th scope="col">Dinyatakan</th>
                  <th scope="col">Persetujuan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{$d->updated_at}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->nilai_berkas}}</td>
                    <td>{{$d->nilai_wawancara}}</td>
                    <td>{{$d->hasil_wawancara}}</td>
                    <td>{{$d->persetujuan}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
<script type="text/javascript">
$(document).ready(function(){
  var table = $('#datatable').DataTable();
})
</script>
@endpush