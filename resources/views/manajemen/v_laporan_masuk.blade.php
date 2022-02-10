@extends('manajemen.template.header')
@section('dash','Laporan Masuk')
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

                            {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tolakModal{{ $data->id_pengaduan }}">
                              Tolak
                            </button> --}}
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

    
<!-- Modal -->
@foreach ($laporan as $data)
<div class="modal fade" id="exampleModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nomor Pengaduan: {{ $data->id_pengaduan }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/laporan/update/{{ $data->id_pengaduan }}">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama Pelapor:</label>
                  <input type="text" class="form-control" value="{{ $data->nama }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Judul:</label>
                  <input type="text" class="form-control" value="{{ $data->judul }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                  <label>Lokasi Kejadian:</label>
                  <input type="text" class="form-control" value="{{ $data->lokasi }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tanggal Kejadian:</label>
                  <input type="text" class="form-control" value="{{ $data->tgl_kejadian }}">
                </div>
              </div>
            </div>

            <!-- input states -->
            <div class="form-group">
              <label class="col-form-label" for="inputSuccess"> Isi</label>
              <textarea name="" id="" class="form-control" row="7">{{ $data->isi }}</textarea>
            </div>
            @php
               $image = DB::table('pengaduan')->where('id_pengaduan',$data->id_pengaduan)->first();
              $images = explode('|',$image->foto)
            @endphp
            <div class="row">
            @foreach ($images as $item)
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Bukti Foto:</label><br>
                    <iframe src="{{ URL::to($item)}}" width="100%" height="500"></iframe>

                </div>
              </div>
              @endforeach
            </div>

              <!-- textarea -->
              <div class="form-group">
                <label>Tindak Lanjut:</label>
                <select class="form-control" name="investigasi">
                          <option value="3">Butuh Investigasi</option>
                          <option value="2">Butuh Balasan Unit</option>
              </select>
              </div>
              <div class="form-group">
                <label>Unit:</label>
                <select name="unit" class="form-control" id="">
                  <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}</option>
                  <option disabled>--Pilih--</option>
                @foreach ($unit as $data)
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
@endforeach

<!-- Modal -->
@foreach ($laporan as $data)
<div class="modal fade" id="tolakModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nomor Pengaduan: {{ $data->id_pengaduan }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/laporan/tolak/{{ $data->id_pengaduan }}">
            @csrf
                <!-- text input -->
                <div class="form-group">
                  <label>Alasan Penolakan: </label>
                  <textarea class="form-control" rows="5" name="alasan"></textarea>
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
@endforeach
</div>
@endsection
