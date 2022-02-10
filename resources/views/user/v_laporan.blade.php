@extends('user.template.header')
@section('content')

<div class="col-12">
  @if (session('berhasil'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Sukses</h4>
        {{ session('berhasil') }}
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
            <th>Judul</th>
            <th>Isi</th>
            <th>Unit</th>
            <th>Foto </th>
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
                
                @if ($data->status == 66)
                <td>Ditolak</td>
                @elseif($data->status == 1)
                <td>Menunggu Verifikasi Admin</td>
                @elseif($data->status == 2)
                <td>Sedang Diproses</td>
                @elseif($data->status == 3)
                <td>Selesai</td>
                @endif  
                  <td>

                    @if ($data->status_tanggapan == 1)
                    <a href="/tanggapan-v/{{ $data->id_pengaduan }}" class="btn btn-info">
                      <span class="text">Tanggapan Dari Polibatam</span>
                  </a> 
                    @elseif($data->status_tanggapan == 2)
                      <a href="/tanggapan/{{ $data->id_pengaduan }}" class="btn btn-info">
                        <span class="text">Tanggapan Dari Polibatam</span>
                    </a> 
                    @elseif($data->status_tanggapan == 4)
                    <a href="/tanggapan-v/{{ $data->id_pengaduan }}" class="btn btn-info">
                      <span class="text">Tanggapan Dari Polibatam</span>
                  </a>
                    @else 
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasanModal{{ $data->id_pengaduan }}">
                        Tanggapan Dari Polibatam
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
{{-- Alasan Tolak --}}
@foreach ($laporan as $data)
<div class="modal fade" id="alasanModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form>
            <div class="modal-body">
              <label for="">Alasan Laporan Ditolak:</label>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      @php
      $image = DB::table('pengaduan')->where('id_pengaduan',$data->id_pengaduan)->first();
      $images = explode('|',$image->foto);
  @endphp
  @foreach ($images as $item)
  <iframe src="{{ URL::to($item)}}" width="100%" style="height: 500px"></iframe>
  {{-- <img src="{{ URL::to($item)}}" width="100%" height="500px" > --}}
  @endforeach
             
    </div>
  </div>
</div>
@endforeach

{{-- @php
      $image = DB::table('pengaduan')->where('id_pengaduan','185')->first();
      $images = explode('|',$image->foto)
  @endphp
@foreach ($images as $data)
           
  <img src="{{ URL::to($data)}}" width="100px" height="100px"> 

@endforeach --}}
@endsection