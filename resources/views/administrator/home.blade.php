@extends('administrator.template.header')
@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Petugas</h5>

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
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">{{ $admin }}</span>
              <h5 class="description-header">Jumlah Admin</h5>
              <a href="#exampleModalAdmin" class="small-box-footer" data-toggle="modal" data-target="#exampleModalAdmin">Tambah Admin <i class="fas fa-plus"></i></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-warning">{{ $unit }}</span>
              <h5 class="description-header">Jumlah Unit</h5>
      <a href="#exampleModalUnit" class="small-box-footer" data-toggle="modal" data-target="#exampleModalUnit">Tambah Unit <i class="fas fa-plus"></i></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">{{ $manajemen }}</span>
              <h5 class="description-header">Jumlah Manajemen</h5>
      <a href="#exampleModalMan" class="small-box-footer" data-toggle="modal" data-target="#exampleModalMan">Tambah Manajemen <i class="fas fa-plus"></i></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block">
              <span class="description-percentage text-danger">{{ $divisi }}</span>
              <h5 class="description-header">Jumlah Divisi</h5>
      <a href="#exampleModalDiv" class="small-box-footer" data-toggle="modal" data-target="#exampleModalDiv">Tambah Divisi <i class="fas fa-plus"></i></a>

            </div>
            <!-- /.description-block -->
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
        <h5 class="card-title">Rekap</h5>

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
              <span class="description-percentage text-warning">{{ $tolak }}</span>
              <h5 class="description-header">Laporan Ditolak</h5>
              <a href="/administrator/laporan/ditolak" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
    <hr>       
    </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">{{ $masuk }}</span>
              <h5 class="description-header">Laporan Masuk</h5>
              <a href="/administrator/laporan/masuk" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
    <hr>      
    </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block">
              <span class="description-percentage text-danger">{{ $proses }}</span>
              <h5 class="description-header">Laporan Diproses</h5>
              <a href="/administrator/laporan/proses" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
<hr>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-warning">{{ $selesai }}</span>
              <h5 class="description-header">Laporan Puas</h5>
      <a href="/administrator/laporan/selesai" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
    <hr>       
    </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">{{ $respon_tk }}</span>
              <h5 class="description-header">Laporan Tidak Puas</h5>
              <a href="/administrator/data/divisi" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
    <hr>        
    </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block">
              <span class="description-percentage text-danger">{{ $total }}</span>
              <h5 class="description-header">Laporan Total</h5>
              <a href="/administrator/laporan-total" class="small-box-footer">More Info<i class="fas fa-arrow-circle-right"></i></a>
<hr>
            </div>
            <!-- /.description-block -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  {{-- <!-- /.col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{ $admin }}</h3>

        <p>Admin</p>
      </div>
      <div class="icon">
        <i class="far fa-user"></i>
      </div>
      <a href="#exampleModalAdmin" class="small-box-footer" data-toggle="modal" data-target="#exampleModalAdmin">Tambah Admin <i class="fas fa-plus"></i></a>
      <a href="/administrator/data/admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{ $unit }}</h3>

        <p>Unit</p>
      </div>
      <div class="icon">
        <i class="far fa-user"></i>
      </div>
      <a href="#exampleModalUnit" class="small-box-footer" data-toggle="modal" data-target="#exampleModalUnit">Tambah Unit <i class="fas fa-plus"></i></a>
      <a href="/administrator/data/unit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{ $manajemen }}</h3>

        <p>Manajemen</p>
      </div>
      <div class="icon">
        <i class="far fa-user"></i>
      </div>
      <a href="#exampleModalMan" class="small-box-footer" data-toggle="modal" data-target="#exampleModalMan">Tambah Manajemen <i class="fas fa-plus"></i></a>
      <a href="/administrator/data/manajemen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{ $divisi }}</h3>

        <p>Divisi</p>
      </div>
      <div class="icon">
        <i class="far fa-user"></i>
      </div>
      <a href="#exampleModalDiv" class="small-box-footer" data-toggle="modal" data-target="#exampleModalDiv">Tambah Divisi <i class="fas fa-plus"></i></a>
      <a href="/administrator/data/divisi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  --}}

  {{-- <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $tolak }}</h3>

        <p>Laporan Ditolak</p>
      </div>
      <div class="icon">
        <i class="fas fa-times"></i>
      </div>
      <a href="/administrator/laporan/ditolak" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $masuk }}</h3>

        <p>Laporan Masuk</p>
      </div>
      <div class="icon">
        <i class="fas fa-sign-in-alt"></i>
      </div>
      <a href="/administrator/laporan/masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ $proses }}</h3>

        <p>Laporan Di Proses</p>
      </div>
      <div class="icon">
        <i class="fas fa-sign-in-alt"></i>
      </div>
      <a href="/administrator/laporan/proses" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>   --}}
  {{-- <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $selesai }}</h3>

        <p>Laporan Puas</p>
      </div>
      <div class="icon">
        <i class="fas fa-check"></i>
      </div>
      <a href="/administrator/laporan/selesai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> 
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $respon_tk }}</h3>

        <p>Laporan Tidak Puas</p>
      </div>
      <div class="icon">
        <i class="fas fa-times"></i>
      </div>
      <a href="/administrator/data/divisi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> 
  <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $total }}</h3>

        <p>Laporan Total</p>
      </div>
      <div class="icon">
        <i class="fas fa-clipboard"></i>
      </div>
      <a href="/administrator/laporan-total" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>  --}}
  
{{-- Modal Admin --}}
<div class="modal fade" id="exampleModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/administrator/tambah/admin">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" value="" name="nik">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" value="" name="nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" value="" name="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" value="" name="username" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" value="" name="password" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">  
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" value="" name="password_confirmation">
                </div>
              </div>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Unit --}}
<div class="modal fade" id="exampleModalUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Units</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/administrator/tambah/unit">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
              </div>
            </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            <div class="form-group">
              <label>Unit</label>
              <select name="unit" class="form-control" id="">
              @foreach ($div as $data)
                  <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}
                  </option>
              @endforeach 
              </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Manajemen --}}
<div class="modal fade" id="exampleModalMan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Manajemen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/administrator/tambah/manajemen">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" value="" name="nik">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" value="" name="nama">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" value="" name="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" value="" name="username">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" value="" name="password">
                </div>
              </div>
            </div>
            <div class="row">  
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" value="" name="password_confirmation">
                </div>
              </div>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Divisi --}}
<div class="modal fade" id="exampleModalDiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/administrator/tambah/divisi">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Kode Divisi</label>
                  <input type="text" class="form-control" name="kode">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Nama Divisi</label>
                  <input type="text" class="form-control" name="nama">
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>


@endsection