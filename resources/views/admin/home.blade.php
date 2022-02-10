@extends('admin.template.header')
@section('dash','Dashboard')
@section('content')
{{-- <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
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
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $proses }}</h3>

        <p>Laporan Diteruskan</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="/laporan/proses" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
   --}}
  

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Laporan yang Membutuhkan Tindak Lanjut</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
     
      <!-- ./card-body -->
      <div class="card-footer">
        <div class="row">
          <!-- /.col -->
        <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">{{ $masuk }}</span>
              <h5 class="description-header">Laporan Masuk</h5>
              <a href="/laporan/masuk" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
    <hr>      
    </div>
            <!-- /.description-block -->
          </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>

  
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Rekapitulasi Laporan</h5>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
   
    <!-- ./card-body -->
    <div class="card-footer">
      <div class="row">
        <!-- /.col -->
        <div class="col-sm-4 col-6">
          <div class="description-block border-right">
            <span class="description-percentage text-warning">{{ $total }}</span>
            <h5 class="description-header">Laporan Masuk</h5>
            <a href="/laporan/total" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
  <hr>       
  </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-6">
          <div class="description-block border-right">
            <span class="description-percentage text-success">{{ $masuk }}</span>
            <h5 class="description-header">Laporan Belum Diproses</h5>
            <a href="/laporan/masuk" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
  <hr>      
  </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-6">
          <div class="description-block">
            <span class="description-percentage text-danger">{{ $proses }}</span>
            <h5 class="description-header">Laporan Sedang Diproses</h5>
            <a href="/laporan/proses" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
<hr>
          </div>
          <!-- /.description-block -->
        </div>
        <div class="col-sm-4 col-6">
          <div class="description-block border-right">
            <span class="description-percentage text-warning">{{ $tolak }}</span>
            <h5 class="description-header">Laporan Ditolak</h5>
    <a href="/laporan/ditolak" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
  <hr>       
  </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 col-6">
          <div class="description-block border-right">
            <span class="description-percentage text-success">{{ $selesai }}</span>
            <h5 class="description-header">Laporan Selesai</h5>
            <a href="/laporan/selesai" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
  <hr>        
  </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
       
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->
</div>
  
@endsection