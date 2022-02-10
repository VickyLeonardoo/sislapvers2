@extends('user.template.header')
@section('content')
<div class="col-md-12">
  <div class="text-center">
    <img src="{{ asset('assets/login') }}/images/polibatam_logo.png" width="100" class="img-fluid"><br>

  </div>
  
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>Sukses</h4>
        {{ session('pesan') }}
      </div>
    @endif
    <!-- general form elements -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Formulir Laporan:</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/simpan/laporan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" value="{{Auth::guard('pelapor')->user()->id }}" name="id_pelapor">
            <div class="text-danger">
        </div>
          </div>
          <div class="card-body">
          <div class="form-group">
            {{-- <label for="exampleInputEmail1">Judul:</label> --}}
            <input type="text" class="form-control" placeholder="Masukkan Judul Laporan" autocomplete="off" id="exampleInputEmail1" name="judul" value="{{ old('judul') }}">
            <div class="text-danger">
                @error('judul')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            {{-- <label for="exampleInputEmail1">Lokasi:</label> --}}
            <input type="text" class="form-control" placeholder="Masukkan Lokasi Kejadian" autocomplete="off" id="exampleInputEmail1" name="lokasi" value="{{ old('lokasi') }}">
            <div class="text-danger">
                @error('lokasi')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            {{-- <label for="exampleInputEmail1">Isi:</label> --}}
            <textarea class="form-control" placeholder="Masukkan Isi Laporan" rows="7" name="isi">{{ old('isi') }}</textarea>
            <div class="text-danger">
                @error('isi')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            {{-- <label for="exampleInputEmail1">Tanggal Kejadian:</label> --}}
            <input placeholder="Masukkan Tanggal Kejadian" class="form-control" type="text" onfocus="(this.type='date')" name="tgl_kejadian" value="{{ old('tgl_kejadian') }}">
            {{-- <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Kejadian" name="tgl_kejadian" value="{{ old('date') }}"> --}}
          </div>

          {{-- <label>Unit Tujuan:</label>/ --}}
            <select class="form-control" name="unit">
                @foreach ($unit as $data)
                    <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}
                    </option>
                @endforeach    
            </select>
<br>
          <div class="form-group cols-sm-6">
            {{-- <label for="filenya">Upload Bukti Pendukung:</label> --}}
            <input type="file" class="form-control form-control-user" id="filenya" name="image[]" multiple>
            <div class="text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-center">
          <input type="submit" class="btn btn-primary form-control form-control-user" value="Kirim">

        </div>
      </form>
    </div>
</div>
   
@endsection