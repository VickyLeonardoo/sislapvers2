@extends('administrator.template.header')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Cetak Laporan Selesai</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Awal</label>
            <input type="date" class="form-control" id="tglawal" name="tglawal">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Taggal Akhir</label>
            <input type="date" class="form-control" id="tglakhir" name="tglakhir" required>
          </div>
                
          <a href="#" onclick="this.href='/cetak/laporan/selesai/tgl/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-info">Cetak</a>
    </div>
</div>  
@endsection