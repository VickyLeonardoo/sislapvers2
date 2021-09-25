@extends('user.template.header')
@section('content')

    
<div class="col-md-12">
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
        <h3 class="card-title">Formulir Laporan</h3>
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
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" name="judul">
            <div class="text-danger">
                @error('judul')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lokasi</label>
            <input type="text" class="form-control" autocomplete="off" id="exampleInputEmail1" name="lokasi">
            <div class="text-danger">
                @error('lokasi')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Isi</label>
            <textarea class="form-control" rows="7" name="isi">{{ old('isi') }}</textarea>
            <div class="text-danger">
                @error('isi')
                {{ $message }}
                @enderror
        </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Kejadian</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_kejadian">
          </div>

          <label>Unit Tujuan:</label>
            <select class="form-control" name="unit">
                @foreach ($unit as $data)
                    <option value="{{ $data->id_divisi }}">{{ $data->nama_div }}
                    </option>
                @endforeach    
            </select>

          <div class="form-group cols-sm-6">
            <label for="">Upload Bukti Pendukung 1:</label>
            <input type="file" class="form-control form-control-user" name="foto">
            <div class="text-danger">
                    @error('foto')
                    {{ $message }}
                    @enderror
            </div>
          </div>
          <div class="form-group cols-sm-6">
            <label for="">Upload Bukti Pendukung 2:</label>
            <input type="file" class="form-control form-control-user" name="foto2">
            <div class="text-danger">
                    @error('foto2')
                    {{ $message }}
                    @enderror
            </div>
          </div>
          <div class="form-group cols-sm-6">
            <label for="">Upload Bukti Pendukung 3:</label>
            <input type="file" class="form-control form-control-user" name="foto3">
            <div class="text-danger">
                    @error('foto3')
                    {{ $message }}
                    @enderror
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <input type="submit" class="btn btn-primary" value="Kirim">
        </div>
      </form>
    </div>
</div>
   
@endsection