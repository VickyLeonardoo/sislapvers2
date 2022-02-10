@extends('unit.template.header')
@section('dash','Tanggapan Pelapor')
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
                    {{-- <th>Nama Pelapor</th> --}}
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
                          {{-- <td>{{ $data->nama }}</td> --}}
                          <td>{{ $data->judul }}</td>
                          <td>{{ $data->isi }}</td>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{ $data->id_pengaduan }}">
                              Detail
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggapiModal{{ $data->id_tanggapan }}">
                              Tanggapi
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
              <label class="col-form-label" for="inputSuccess">Isi:</label>
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

@foreach ($laporan as $data)
<div class="modal fade" id="tanggapiModal{{ $data->id_tanggapan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form method="POST" action="/unit/laporan/revisi/tanggapan-pelapor/{{ $data->id_tanggapan }}">
            @csrf
            <!-- input states -->
            <input type="hidden" name="id_pengaduan" value="{{ $data->id_pengaduan }}">
            <input type="hidden" name="id_tanggapan" value="{{ $data->id_tanggapan }}">
            <div class="form-group">
              <label class="col-form-label">Tanggapan Dari Pelapor:</label>
              <textarea name="tanggapan_lama" disabled id="" class="form-control" row="7">{{ $data->tanggapan_user }}</textarea>
            </div>
           <div class="form-group">
              <label class="col-form-label">Tanggapan:</label>
              <textarea name="tanggapan" id="" class="form-control" rows="5"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-warning" value="Kirim">
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection
