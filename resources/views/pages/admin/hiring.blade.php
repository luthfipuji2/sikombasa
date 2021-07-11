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
                  <th scope="col">Penguji Berkas</th>
                  <th scope="col">Nilai</th>
                  <th scope="col">Dinyatakan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{$d->updated_at}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->penyeleksi}}</td>
                    <td>{{$d->nilai_berkas}}</td>
                    <td>{{$d->hasil}}</td>
                    <td>
                      <a href="{{$d->id_translator}}" class="btn btn-warning" >
                      <i class="nav-icon fas fa-eye"></i>
                      </a>

                      <button class="btn btn-primary edit" type="button" data-toggle="modal" data-target="#updateSelection-{{$d->id_seleksi_berkas}}">
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
        @foreach($data as $d)
        <div class="modal fade" id="updateSelection-{{$d->id_seleksi_berkas}}" tabindex="-1" aria-labelledby="updateSelectionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateSelectionLabel">Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{ url('/berkas/'.$d->id_seleksi_berkas) }}" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                    <div class="form-group row">
                      <label for="nilai_berkas" class="col-sm-5 col-form-label">Nilai</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="nilai_berkas" id="nilai_berkas" placeholder="Nilai (Kisaran 1 s.d 10)" value="{{$d->nilai_berkas}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="hasil" class="col-sm-5 col-form-label">Pelamar dinyatakan</label>
                        @if(empty($d->hasil))
                        <select class="form-control" id="hasil" placeholder="Pelamar Dinyatakan" name="hasil">
                            <option value="lolos">Lolos</option>
                            <option value="tidak lolos">Tidak lolos</option>
                        </select>
                        @elseif($d->hasil=='lolos')
                        <select class="form-control" id="hasil" placeholder="Pelamar Dinyatakan" name="hasil" value="{{ $d->hasil }}">
                            <option value="lolos" selected>Lolos</option>
                            <option value="tidak lolos">Tidak lolos</option>
                        </select>
                        @elseif($d->hasil=='tidak lolos')
                        <select class="form-control" id="hasil" placeholder="Pelamar Dinyatakan" name="hasil" value="{{ $d->hasil }}">
                            <option value="lolos">Lolos</option>
                            <option value="tidak lolos" selected>Tidak lolos</option>
                        </select>
                        @endif
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
        @endforeach
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