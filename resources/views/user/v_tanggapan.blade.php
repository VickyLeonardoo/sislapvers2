@extends('user.template.header')
@section('content')

<h6 style="color: red;">*Bila Kosong maka Kek Hati KAU!</h6>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-info">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php $i=1  ?>
        @foreach ($tanggapan as $data)
        <div class="form-group">
            <label>Tanggapan {{ $i++ }}</label>
            <textarea rows="4" class="form-control">asd</textarea>
        </div>
        @endforeach
    </div>

   
@endsection