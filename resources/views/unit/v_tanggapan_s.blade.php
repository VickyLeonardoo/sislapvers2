@extends('unit.template.header')
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
            <th>Tanggapan Ke-</th>
            <th>Tanggapan</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=1?>
            @foreach ($laporan as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->tanggapan }}</td>
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
@endsection