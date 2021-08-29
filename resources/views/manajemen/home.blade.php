@extends('manajemen.template.header')
@section('content')
<div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $masuk }}</h3>

        <p>Laporan Masuk</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="/laporan/masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $investigasi }}</h3>

        <p>Laporan Sedang Investigasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="/laporan/selesai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  

  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $selesai }}</h3>

        <p>Laporan Selesai</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="/laporan/selesai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  

  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $tanggapan }}</h3>

        <p>Tanggapan Butuh Verifikasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="/laporan/selesai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  
  
  
</div>
@endsection