@extends('administrator.template.header')
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
                    <th>Kode Divisi</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($admin as $data)
                        <tr>
                          <td>{{ $data->kode }}</td>
                          <td>{{ $data->nama_div }}</td>
                          <td>
                            {{-- <!-- Button trigger modal --> --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id_divisi }}">
                              <i class="fas fa-info "></i>
                            </button>

                            <a href="/administrator/hapus-divisi/{{ $data->id_divisi }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            </a>

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
    

</div>
@endsection
