@extends('user.template.header')
@section('content')

<h6 style="color: red;">*Bila Kosong Maka Belum Ditanggapi!</h6>
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
    </div>

   
@endsection