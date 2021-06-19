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
                  <th scope="col">Pewawancara</th>
                  <th scope="col">Catatan</th>
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
                    <td>{{$d->pewawancara}}</td>
                    <td>{{$d->catatan}}</td>
                    <td>{{$d->nilai_wawancara}}</td>
                    <td>{{$d->hasil_wawancara}}</td>
                    <td>
                      <a href="wawancara-{{$d->id_translator}}" class="btn btn-warning" >
                      <i class="nav-icon fas fa-eye"></i>
                      </a>

                      <button class="btn btn-primary edit" type="button" data-toggle="modal" data-target="#updateSelection-{{$d->id_translator}}">
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
        <div class="modal fade" id="updateSelection-{{$d->id_translator}}" tabindex="-1" aria-labelledby="updateSelectionLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateSelectionLabel">Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{ url('/wawancara/'.$d->id_translator) }}" method="POST" enctype="multipart/form-data" id="editForm">
                @csrf
                    <div class="form-group row">
                      <label for="nilai" class="col-sm-5 col-form-label">Nilai</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="nilai_wawancara" id="nilai_wawancara" placeholder="Nilai (Kisaran 1 s.d 10)" value="{{$d->nilai_wawancara}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="hasil_wawancara" class="col-sm-5 col-form-label">Pelamar dinyatakan</label>
                      @if(empty($d->hasil_wawancara))
                        <div class="col-sm-12">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="hasil_wawancara" value="tidak lolos" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Tidak Lolos</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="hasil_wawancara" value="lolos" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Lolos</label>
                          </div>
                        </div>
                        @elseif($d->hasil_wawancara=='tidak lolos')
                        <div class="col-sm-12">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="hasil_wawancara" value="tidak lolos" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio1">Tidak Lolos</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="hasil_wawancara" value="lolos" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Lolos</label>
                          </div>
                        </div>
                        @elseif($d->hasil_wawancara=='lolos')
                        <div class="col-sm-12">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="hasil_wawancara" value="tidak lolos" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Tidak Lolos</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="hasil_wawancara" value="lolos" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio2">Lolos</label>
                          </div>
                        </div>
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