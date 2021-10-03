@extends('manajemen.template.header')
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
          <!-- /.col -->
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
    
<!-- Modal -->
@foreach ($laporan as $data)
<div class="modal fade" id="exampleModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NO Pengaduan : {{ $data->id_pengaduan }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama Pelapor</label>
                  <input type="text" class="form-control" value="{{ $data->nama }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" value="{{ $data->judul }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Lokasi Kejadian</label>
                  <input type="text" class="form-control" value="{{ $data->lokasi }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tgl Kejadian</label>
                  <input type="text" class="form-control" value="{{ $data->tgl_kejadian }}">
                </div>
              </div>
            </div>

            <!-- input states -->
            <div class="form-group">
              <label class="col-form-label" for="inputSuccess"> Isi</label>
              <textarea name="" id="" class="form-control" row="7">{{ $data->isi }}</textarea>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Bukti Foto:</label><br>
                <img src="{{ url('file_laporan/'.$data->foto) }}" width="400">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Bukti Foto:</label><br>
                <img src="{{ url('file_laporan/'.$data->foto2) }}" width="400">
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Bukti Foto:</label><br>
                <img src="{{ url('file_laporan/'.$data->foto3) }}" width="400">
                </div>
              </div>
            </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Unit</label>
                <select name="unit" class="form-control" id="">
                  <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}</option>
                  <option disabled>--Pilih--</option>
                @foreach ($unit as $item)
                    <option value="{{ $item->id_divisi }}">{{ $item->nama_div }}
                    </option>
                @endforeach 
                </select>
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" formaction="/manajemen/update/laporan/{{ $data->id_pengaduan }}" value="Teruskan Ke Unit">
        <input type="submit" class="btn btn-primary" formaction="/manajemen/update/{{ $data->id_pengaduan }}" value="Proses Investigasi">
      </form>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
@endsection
