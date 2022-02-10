@extends('manajemen.template.header')
@section('dash','Laporan Investigasi')
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
                    <th>Nomor</th>
                    <th>Nama Pelapor</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                    <th>Status</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1?>
                    
                    @foreach ($laporan as $data)
                    <?php
                    $startdate=strtotime($data->tgl_ditanggapi);
                    $enddate=strtotime("+11 days", $startdate);
                    ?>
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

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tanggapanModal{{ $data->id_pengaduan }}">
                              Tanggapi
                            </button>
                          </td>
                          @if ($data->status_tanggapan == 1)
                          <td>Belum Ditangapi</td>
                          @else
                          <td>Ditanggapi pada {{ date("d-M-y",$startdate) }} Batas Konfirmasi {{ date("d-M-y",$enddate) }}</td>

                          {{-- <td>Akan berakhir pada {{ $enddate }}</td> --}}
                          {{-- <td>Ditanggapi pada tanggal {{ date('d-M-y', strtotime($data->tgl_laporan)) }}</td> --}}
                          @endif
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
        @if ($data->respon == 1)
        <i class="far fa-smile"></i>
        @elseif ($data->respon == 2)          
        <i class="far fa-angry"></i>
        @else 
        
        @endif
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form method="POST" action="/manajemen/laporan/selesaikan/{{ $data->id_pengaduan }}">
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
              <!-- textarea -->
              <div class="form-group">
                <label>Tindak Lanjut:</label>
                <select class="form-control" name="investigasi">
                          <option value="1">Butuh Investigasi</option>
                          <option value="2">Butuh Balasan Unit</option>
              </select>
              </div>
              <div class="form-group">
                <label>Unit:</label>
                <select name="unit" class="form-control" id="">
                  <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}</option>
                </select>
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Selesaikan">
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- Tanggapi --}}
@foreach ($laporan as $data)
<div class="modal fade" id="tanggapanModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form method="POST" action="/manajemen/laporan/tanggapi-{{ $data->id_pengaduan }}">
            @csrf
            <!-- input states -->
            <input type="hidden" name="id" value="{{ $data->id_pengaduan }}">
            <div class="form-group">
              <label class="col-form-label" for="inputSuccess">Tanggapan:</label>
              <textarea name="tanggapan" id="" class="form-control" row="7"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Kirim Ke Pelapor">
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection
