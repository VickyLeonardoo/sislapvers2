@extends('administrator.template.header')
@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-info">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php $i=1  ?>
        @foreach ($tanggapan as $data)
        <div class="form-group">
            <label>Uraian Tanggapan {{ $i++ }}</label>
            <textarea rows="4" class="form-control" disabled>{{ $data->tanggapan }}</textarea>
        </div>
        
        @endforeach
        <form method="POST">
          @csrf
      <div class="modal-footer">
          <input type="submit" class="btn btn-info" value="Puas" formaction="/laporan/puas/{{ $data->id_pengaduan }}">
          <input type="submit" class="btn btn-primary" value="Tidak Puas" formaction="/laporan/kurang/{{ $data->id_pengaduan }}">
          <a href="/daftar/laporan" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
        </div>
      </form>
    </div>
    
@endsection