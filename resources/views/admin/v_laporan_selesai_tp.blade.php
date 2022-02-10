@extends('administrator.template.header')
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
            <th>Status</th>
            <th></th>
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
                  <td>
                    <!-- Button trigger modal -->
                    <a href="/tanggapan/petugas/{{ $data->id_pengaduan }}" class="btn btn-info">
                      <span class="text">Tanggapan Dari Politeknik</span>
                  </a> 
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