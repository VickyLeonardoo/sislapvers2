@extends('unit.template.header')
@section('content')
<div class="col-12">
  @if (session('pesan'))
  <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Sukses</h4>
      {{ session('pesan') }}
    </div>
  @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tanggapan Ke-</th>
            <th>Tanggapan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1?>
            @foreach ($laporan as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->tanggapan }}</td>
                    <td>
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#alasanModal{{ $data->id_tanggapan }}">
                        Tanggapan Dari Manajemen
                      </button>
                    </td>
                </tr>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  @foreach ($laporan as $data)
<div class="modal fade" id="alasanModal{{ $data->id_tanggapan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form>
            @csrf
                <!-- text input -->
                  <label>Alasan Penolakan:</label>
                  <textarea class="form-control" rows="5">{{ $data->alasan_tolak }}</textarea>
          </form>
        </div>
      </div>
    </div>
@endforeach
@endsection