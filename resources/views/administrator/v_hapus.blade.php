@extends('administrator.template.header')
@section('title','Laporan Ditolak')
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
            <th>No Pengaduan</th>
            <th>Nama Pelapor</th>
            <th>Tgl Laporan</th>
            <th>Judul</th>
            <th>Isi</th>
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
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#delete{{ $data->id_pengaduan}}">
                        <span class="icon text-white-100">
                            <i class="fas fa-trash"></i>
                        Hapus
                      </button>
                  </td>
                  
                </tr>
            @endforeach
            </tr>
          </tbody>

        </table>
    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#delete">Hapus Seluruh Laporan</button> --}}

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  @foreach ($laporan as $data)
  <div class="modal modal-danger fade" id="delete{{ $data->id_pengaduan }}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Yakin Ingin Menghapus Laporan dengan Nomor Aduan <b>{{ $data->id_pengaduan }}</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
            <a href="/laporan/hapus-laporan/{{ $data->id_pengaduan }}" class="btn btn-outline">Yes</a>
          </div>
        </div>
      </div>
  </div>
  @endforeach
{{-- 
  @foreach ($laporan as $data)
  <div class="modal modal-danger fade" id="delete">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <i class="fas fa-exclamation-triangle"></i>
            <i class="fas fa-exclamation-triangle"></i>
            <i class="fas fa-exclamation-triangle"></i>
            <i class="fas fa-exclamation-triangle"></i>
            <i class="fas fa-exclamation-triangle"></i>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h1>Ingin Menghapus Seluruh Laporan?</h1>
            <p>Ini akan menghapus seluruh laporan yang ada</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
            <a href="/administrator/hapus-laporan-total" class="btn btn-outline">Yes</a>
          </div>
        </div>
      </div>
  </div> 
  @endforeach --}}
@endsection