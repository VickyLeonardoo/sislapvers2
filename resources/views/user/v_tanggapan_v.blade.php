@extends('user.template.header')
@section('content')

<h6 style="color: red;">*Bila Kosong Maka Belum Ditanggapi</h6>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-info">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php $i=1  ?>
        <form method="POST">
          @csrf
      <div class="modal-footer">
          <a href="/daftar/laporan" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
        </div>
      </form>
    </div>
    
@endsection