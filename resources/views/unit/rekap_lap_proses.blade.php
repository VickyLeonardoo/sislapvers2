@extends('unit.template.header')
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
            <th>Nomor</th>
            <th>Nama Pelapor</th>
            <th>Tgl Laporan</th>
            <th>Judul</th>
            <th>Isi</th>
            <td>Status</td>
          </tr>
          </thead>
          <tbody>
            <?php $i=1?>
            @foreach ($laporan as $data)
                <tr>
                  <td>{{ $data->id_pengaduan }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ date('d-M-y', strtotime($data->tgl_laporan)) }}</td>
                  <td>{{ $data->judul }}</td>
                  <td>{{ $data->isi }}</td>
                    @if ($data->investigasi == 1)
                        <td>Manajemen</td>
                    @else
                        <td>Unit {{ $data->nama_div }}
                    @endif
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