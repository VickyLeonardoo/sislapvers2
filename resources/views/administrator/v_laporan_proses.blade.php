@extends('administrator.template.header')
@section('title','Laporan Diproses')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No Pengaduan</th>
            <th>Nama Pelapor</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1?>
            @foreach ($laporan as $data)
                <tr>
                  <td>{{ $data->id_pengaduan }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->judul }}</td>
                  <td>{{ $data->isi }}</td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id_pengaduan }}">
                      Detail
                    </button>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tolakModal{{ $data->id_pengaduan }}">
                      Tolak
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
@endsection