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
                  <th scope="col">Penguji</th>
                  <th scope="col">Nilai</th>
                  <th scope="col">Dinyatakan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->id_admin}}</td>
                    <td>{{$d->nilai}}</td>
                    <td>{{$d->hasil}}</td>
                    <td>
                      <a href="{{$d->id_translator}}" class="btn btn-warning" >
                      <i class="nav-icon fas fa-eye"></i>
                      </a>

                      <button class="btn btn-primary edit" type="button" data-toggle="modal" data-target="#updateSelection">
                      <i class="nav-icon fas fa-edit"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
        <!-- Modal -->
        <div class="modal fade" id="updateSelection" tabindex="-1" aria-labelledby="updateSelectionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateSelectionLabel">Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="/certificate-update" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                    <label for="nilai" class="col-sm-5 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai (Kisaran 1 s.d 10)">
                    </div>
                    <label for="hasil" class="col-sm-5 col-form-label">Pelamar Dinyatakan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="hasil" id="hasil" placeholder="Nomor Sertifikat">
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
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