@extends('user.template.header')
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
            <th>No Pengaduan</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Unit</th>
            <th>Foto 1</th>
            <th>Foto 2</th>
            <th>Foto 3</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1?>
            @foreach ($laporan as $data)
                <tr>
                <td>{{ $data->id_pengaduan }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->isi }}</td>
                <td>{{ $data->nama_div }}</td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#foto1Modal{{ $data->id_pengaduan }}">
                  Lihat
                </button></td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#foto2Modal{{ $data->id_pengaduan }}">
                  Lihat
                </button></td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#foto3Modal{{ $data->id_pengaduan }}">
                  Lihat
                </button></td>
                
                @if ($data->status == 66)
                <td>Ditolak</td>
                @elseif($data->status == 1)
                <td>Menunggu Verifikasi</td>
                @elseif($data->status == 2)
                <td>Diproses</td>
                @elseif($data->status == 3)
                <td>Selesai</td>
                @endif  
                  <td>

                    @if ($data->status == 1)
                    <a href="/tanggapan/{{ $data->id_pengaduan }}" class="btn btn-info">
                      <span class="text">Tanggapan Dari Poltek</span>
                  </a> 
                    @elseif($data->status == 2)
                      <a href="/tanggapan/{{ $data->id_pengaduan }}" class="btn btn-info">
                        <span class="text">Tanggapan Dari Poltek</span>
                    </a> 
                    @elseif($data->status == 3)
                      <a href="/tanggapan/{{ $data->id_pengaduan }}" class="btn btn-info">
                        <span class="text">Tanggapan Dari Poltek</span>
                    </a> 
                    @else 
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasanModal{{ $data->id_pengaduan }}">
                        Tanggapan Dari Poltek
                      </button>
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
  <!-- /.col -->
<!-- /.row -->
<!-- /.container-fluid -->

{{-- Detail Data --}}
</section>
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
              <textarea class="form-control" row="7">{{ $data->isi }}</textarea>
            </div>
            {{-- <div class="row">
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
                <img src="{{ url('file_laporan/'.$data->foto) }}" width="400">
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Bukti Foto:</label><br>
                <img src="{{ url('file_laporan/'.$data->foto) }}" width="400">
                </div>
              </div>
            </div> --}}
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Puas" formaction="/laporan/puas/{{ $data->id_pengaduan }}">
        <input type="submit" class="btn btn-primary" value="Tidak Puas" formaction="/laporan/kurang/{{ $data->id_pengaduan }}">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

{{-- Alasan Tolak --}}
@foreach ($laporan as $data)
<div class="modal fade" id="alasanModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form>
            <div class="modal-body">
              <label for="">Alasan Laporan Ditolak :</label>
              <p>{{ $data->alasan }}</p>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($laporan as $data)
<div class="modal fade" id="foto1Modal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
              <img src="{{ url('file_laporan/'.$data->foto) }}" >
    </div>
  </div>
</div>
@endforeach
@foreach ($laporan as $data)
<div class="modal fade" id="foto2Modal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
              <img src="{{ url('file_laporan/'.$data->foto2) }}">
    </div>
  </div>
</div>
@endforeach
@foreach ($laporan as $data)
<div class="modal fade" id="foto3Modal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
              <img src="{{ url('file_laporan/'.$data->foto3) }}">
    </div>
  </div>
</div>
@endforeach
@endsection