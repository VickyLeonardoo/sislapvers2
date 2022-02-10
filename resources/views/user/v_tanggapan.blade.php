@extends('user.template.header')
@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-info">
      
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php $i=1  ?>
        @foreach ($tanggapan as $data)
        <div class="form-group">
            <label>Uraian Tanggapan {{ $i++ }}</label>
            <textarea rows="4" class="form-control" disabled>{{ $data->tanggapan }}</textarea>
        </div>
        
        @endforeach
        <form method="POST">
          @csrf
      <div class="modal-footer">
        <p style="font-size: 17px">Jika anda merasa puas dengan tanggapan dari Politeknik Negeri Batam, 
          maka klik "Selesai". Jika Anda merasa tidak puas, maka anda dapat memberikan tanggapan kembali dengan klik "Tanggapi". Jika dalam waktu 10 hari Anda tidak memberikan tanggapan apapun maka laporan dianggap selesai.</p>
          <input type="submit" class="btn btn-info " value="Selesai" formaction="/laporan/puas/{{ $data->id_pengaduan }}">
          {{-- <input type="submit" class="btn btn-primary" value="Tidak Puas" formaction="/laporan/kurang/{{ $data->id_pengaduan }}"> --}}
          <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#tanggapanModal{{ $data->id_pengaduan }}">
            Tanggapi
          </button>
          <a href="/daftar/laporan" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
          
        </div>
      </form>
      
    </td>

    </div>

    <div class="modal fade" id="tanggapanModal{{ $data->id_pengaduan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nomor Pengaduan : {{ $data->id_pengaduan }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>    
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" action="/pelapor-tanggapi-tanggapan/{{ $data->id_pengaduan }}">
                @csrf
                <!-- input states -->
                <input type="hidden" name="id_pengaduan" value="{{ $data->id_pengaduan }}">
                <input type="hidden" name="id_tanggapan" value="{{ $data->id_tanggapan }}">

                <div class="form-group">
                  <label class="col-form-label" for="inputSuccess">Tanggapan:</label>
                  <textarea name="tanggapan" id="" class="form-control" row="7"></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Tanggapi">
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection